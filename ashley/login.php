<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "secure");

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = "Please enter username and password.";
    } else {
        $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user ['password'])) {
                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['Username'];

                header("Location: landing.php");
                exit();
            } else {
                $error = "Invalid Username or Password.";
            }
        } else {
            $error = "Invalid Username or Password.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: rgba(142, 165, 192, 0.94); 
    color: #172554;
    font-family: "Inter", "Roboto", "Open Sans", sans-serif;
    min-height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 24px;
  }

  .form-container {
    width: min(100%, 410px);
    background:  rgba(255, 255, 255, 0.94);
    padding: 28px 32px;
    border: 1px solid #bfdbfe;
    border-radius: 16px;
    box-shadow: 0 18px 45px rgba(30, 64, 175, 0.18);
  }

  h1 {
    margin: 0 0 22px;
    color: #1e3a8a;
    font-size: 1.7rem;
    letter-spacing: 0;
  }

  form {
    text-align: left;
  }

  .form-container input,
  .form-container select {
    width: 100%;
    height: 38px;
    padding: 0 12px;
    margin: 4px 0 12px;
    border: 1px solid #93c5fd;
    border-radius: 8px;
    background-color: #f8fbff;
    color: #172554;
    font: inherit;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .form-container select {
    padding: 0 12px;
  }

  .form-container input:focus,
  .form-container select:focus {
    border-color: #05c2fc;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.16);
  }

  .form-container label {
    display: block;
    color: hsl(207, 79%, 72%);
    font-size: 0.92rem;
    font-weight: 700;
  }

  .button {
    width: 100%;
    padding: 12px 25px;
    border: 0;
    background: hsl(241, 98%, 50%);
    color: #fefefe;
    border-radius: 8px;
    font: inherit;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.2s, transform 0.2s;
  }

  button:hover {
    background: #1e40af;
    transform: translateY(-1px);
  }

  .form-container p {
    margin: 18px 0 0;
    color: #475569;
    text-align: center;
    font-size: 0.9rem;
  }

  .form-container a {
    color: rgb(66, 102, 201);
    font-weight: 700;
  }

  @media (max-width: 420px) {
    body {
      padding: 12px;
    }

    .form-container {
      padding: 24px 20px;
    }

    h1 {
      font-size: 1.55rem;
    }
  }
</style>
<body>
<div class="form-container">
<h1>Login</h1>
<form action="login.php" method="post">
<label>Username: </label>
<input type="text" name="username" id="username" required><br>
<label>Password: </label>
<input type="password" name="password" id="password" required><br>
<button class="button" type="submit">Login</button>
<p>Don't have an account? <a href="index.php">Register here</a></p>
</form>
</div>
</body>
</html>