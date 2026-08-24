<?php

session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connect to the unsecured database
    $conn = new mysqli("localhost", "root", "", "unsec");

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === "" || $password === "") {

        $error = "Please enter username and password.";

    } else {

        // Check username in the log table
        $stmt = $conn->prepare("SELECT id, username, password FROM reg WHERE username = ?");

        if (!$stmt) {
            die("Unable to prepare login: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {

                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header("Location: landing.php");
                exit();

            } else {

                $error = "Invalid username or password.";
            }

        } else {

            $error = "Invalid username or password.";
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

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;

            font-family: "Inter", "Roboto", "Open Sans", sans-serif;

            color: #000000;

            background-color: #eee7ff;

            position: relative;
            overflow: hidden;
        }

        /* Minimalist background icons */
        body::before {
            content: "⌨   { }   ⚙   ◇   #   @   01   []   +   < >   / /   •   ◆";

            position: fixed;

            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 30px;
            line-height: 3;
            letter-spacing: 25px;
            word-spacing: 35px;

            color: rgba(91, 33, 182, 0.08);

            transform: rotate(-12deg) scale(1.3);

            pointer-events: none;

            z-index: 0;
        }

        .form-container {
            position: relative;
            z-index: 1;

            width: min(100%, 410px);

            background: rgba(255, 255, 255, 0.96);

            padding: 32px;

            border: 1px solid rgba(91, 33, 182, 0.25);

            border-radius: 28px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.12),
                0 0 0 1px rgba(255, 255, 255, 0.5);
        }

        h1 {
            margin: 0 0 25px;

            color: #000000;

            text-align: center;

            font-size: 1.7rem;
        }

        .error {
            margin-bottom: 18px;

            padding: 10px;

            border-radius: 10px;

            background-color: #fee2e2;

            color: #b91c1c;

            text-align: center;

            font-size: 14px;
        }

        form {
            text-align: left;
        }

        .form-container label {
            display: block;

            color: #000000;

            font-size: 0.92rem;

            font-weight: 700;

            margin-bottom: 5px;
        }

        .form-container input {
            width: 100%;

            height: 40px;

            padding: 0 14px;

            margin: 0 0 16px;

            border: 1px solid #c4b5fd;

            border-radius: 20px;

            background-color: #ffffff;

            color: #000000;

            font: inherit;

            outline: none;

            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-container input:focus {
            border-color: #7c3aed;

            box-shadow:
                0 0 0 3px rgba(124, 58, 237, 0.12);
        }

        .button {
            width: 100%;

            padding: 12px 25px;

            margin-top: 5px;

            border: none;

            background: #45b0ee;

            color: #ffffff;

            border-radius: 20px;

            font: inherit;

            font-weight: 700;

            cursor: pointer;

            transition: background-color 0.2s, transform 0.2s;
        }

        .button:hover {
            background: #6d28d9;

            transform: translateY(-1px);
        }

        .form-container p {
            margin: 18px 0 0;

            color: #000000;

            text-align: center;

            font-size: 0.9rem;
        }

        .form-container a {
            color: #6d28d9;

            font-weight: 700;

            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        /* Decorative icon */
        .form-container::before {
            content: "</>";

            position: absolute;

            top: -18px;
            left: 50%;

            transform: translateX(-50%);

            width: 45px;
            height: 45px;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #7c3aed;

            color: #ffffff;

            border-radius: 50%;

            font-size: 13px;

            font-weight: bold;

            box-shadow:
                0 5px 15px rgba(124, 58, 237, 0.3);
        }

        @media (max-width: 420px) {

            body {
                padding: 12px;
            }

            .form-container {
                padding: 28px 20px;
            }

            h1 {
                font-size: 1.55rem;
            }
        }
    </style>
</head>

<body>

    <div class="form-container">

        <h1>Login</h1>

        <?php if ($error !== ""): ?>
            <div class="error">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="post">

            <label for="username">
                Username:
            </label>

            <input
                type="text"
                name="username"
                id="username"
                required
            >

            <label for="password">
                Password:
            </label>

            <input
                type="password"
                name="password"
                id="password"
                required
            >

            <button
                class="button"
                type="submit"
            >
                Login
            </button>

            <p>
                Don't have an account?
                <a href="index.html">Register here</a>
            </p>

        </form>

    </div>

</body>

</html>