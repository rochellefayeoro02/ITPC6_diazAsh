<?php
$fullname = "Ashley Margareth Diaz";
$age = "21 Years old";
$contact = "09245875527";
$address = "Leganes, Iloilo";
$email = "ashleymargarethdiaz@gmail.com";
$course = "Bachelor of Science in Information Technology";
$year = "3rd Year";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Personal Information</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #5cdff6;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #1a92c9;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background: #45b0ee;
            color: #000000;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #45b0ee;
        }

        .intro {
            text-align: center;
            margin-bottom: 30px;
            color: #555555;
        }

        .info {
            margin-bottom: 15px;
            padding: 12px;
            background: #f3e8ff;
            border-radius: 8px;
        }

        .label {
            font-weight: bold;
            color: rgb(4, 163, 255);
        }

        .value {
            color: #000000;
        }

        .logout-button {
            display: block;
            width: 100%;
            margin-top: 25px;
            padding: 12px;
            background: rgb(4, 9, 255);
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .logout-button:hover {
            background: rgb(24, 61, 230);
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Welcome!</h1>

        <p class="intro">
            Here is some information about me.
        </p>

        <div class="info">
            <span class="label">Full Name:</span>
            <span class="value"><?php echo htmlspecialchars($fullname); ?></span>
        </div>

        <div class="info">
            <span class="label">Age:</span>
            <span class="value"><?php echo htmlspecialchars($age); ?></span>
        </div>

        <div class="info">
            <span class="label">Contact Number:</span>
            <span class="value"><?php echo htmlspecialchars($contact); ?></span>
        </div>

        <div class="info">
            <span class="label">Address:</span>
            <span class="value"><?php echo htmlspecialchars($address); ?></span>
        </div>

        <div class="info">
            <span class="label">Email:</span>
            <span class="value"><?php echo htmlspecialchars($email); ?></span>
        </div>

        <div class="info">
            <span class="label">Course:</span>
            <span class="value"><?php echo htmlspecialchars($course); ?></span>
        </div>

        <div class="info">
            <span class="label">Year:</span>
            <span class="value"><?php echo htmlspecialchars($year); ?></span>
        </div>

        <a class="logout-button" href="logout.php">Logout</a>

    </div>

</body>
</html>