<?php
require "db.php";

if (isset($_POST["register"])) {
   $fullname = trim($_POST["fullname"]);
   $username = trim($_POST["username"]);
   $password = $_POST["password"];
   $confirm_password = $_POST["confirm_password"];
   $age = $_POST["age"];
   $gender = $_POST["gender"];
   $address = trim($_POST["address"]);

   if (empty($fullname) || empty($username) || empty($password) || empty($confirm_password) || empty($age) || empty($gender) || empty($address)) {
       die("All fields are required.");
   }

   if ($password !== $confirm_password) {
       die("Passwords do not match.");
   }

   $check = $conn->prepare("SELECT username FROM log WHERE username = ?");
   $check->bind_param("s", $username);
   $check->execute();
   $result = $check->get_result();

   if ($result->num_rows > 0) {
       die("Username already exists.");
   }

   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   $stmt = $conn->prepare("INSERT INTO nonvulnerable (fullname, username, password, age, gender, address) VALUES (?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("sssiss", $fullname, $username, $hashed_password, $age, $gender, $address);

   if ($stmt->execute()) {
       header("Location: landing.php ");
   } else {
       echo "Error: " . $stmt->error;
   }

   $stmt->close();
   $check->close();
   $conn->close();
}
?>