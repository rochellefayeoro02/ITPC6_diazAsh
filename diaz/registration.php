<?php

require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = trim($_POST["fullname"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";
    $username = trim($_POST["username"] ?? "");
    $age = filter_var($_POST["age"] ?? "", FILTER_VALIDATE_INT);
    $gender = trim($_POST["gender"] ?? "");
    $address = trim($_POST["address"] ?? "");

    // Check required fields
    if (
        $fullname === "" ||
        $password === "" ||
        $confirm_password === "" ||
        $username === "" ||
        strlen($username) > 25 ||
        $age === false ||
        $age < 1 ||
        $gender === "" ||
        $address === ""
    ) {
        die("All fields are required.");
    }

    // Validate gender
    if (!in_array($gender, ["Male", "Female", "Others"], true)) {
        die("Please select a valid gender.");
    }

    // Check password confirmation
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Check if username already exists
    $check = $conn->prepare(
        "SELECT username FROM reg WHERE username = ?");

    if (!$check) {
        die("Unable to check username: " . $conn->error);
    }

    $check->bind_param("s", $username);
    $check->execute();

    $result = $check->get_result();

    if ($result->num_rows > 0) {
        die("Username already exists.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into log table
    $stmt = $conn->prepare(
        "INSERT INTO reg
        (fullname, username, password, age, gender, address)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Unable to prepare registration: " . $conn->error);
    }

    $stmt->bind_param(
        "sssiss",
        $fullname,
        $username,
        $hashed_password,
        $age,
        $gender,
        $address
    );

    if ($stmt->execute()) {
        header("Location: landing.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $check->close();
    $conn->close();
}

?>