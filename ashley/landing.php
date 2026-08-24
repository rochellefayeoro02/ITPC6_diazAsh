<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  * {
    box-sizing: border-box;
  }

  body{
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

  .welcome-container {
    width: min(100%, 410px);
    padding: 32px;
    border: 1px solid #bfdbfe;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.94);
    box-shadow: 0 18px 45px rgba(30, 64, 175, 0.18);
    text-align: center;
  }

  h1 {
    margin: 0 0 12px;
    color: #1e3a8a;
    font-size: 1.7rem;
    letter-spacing: 0;
  }

  p {
    margin: 0 0 24px;
    color: #475569;
    line-height: 1.5;
  }

  .logout-button {
    display: inline-block;
    padding: 11px 24px;
    border-radius: 8px;
    background: rgb(94, 236, 247);
    color: #ffffff;
    font-weight: 700;
    text-decoration: none;
    transition: background-color 0.2s, transform 0.2s;
  }

  .logout-button:hover {
    background: rgb(41, 60, 124);
    transform: translateY(-1px);
  }

  @media (max-width: 420px) {
    body {
      padding: 12px;
    }

    .welcome-container {
      padding: 26px 20px;
    }
  }
</style>
<body>
    <div class="welcome-container">
        <h1>Welcome User!</h1>
        <p>You have successfully logged in.</p>
        <a class="logout-button" href="logout.php">Logout</a>
</div>
</body>
</html>