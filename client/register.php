<?php
session_start();
$conn = new mysqli("localhost", "root", "", "cultiveer");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $device_id = $conn->real_escape_string($_POST['device_id']);
    $device_secret = bin2hex(random_bytes(16)); // Generate a random device secret

    $query = "INSERT INTO users (username, password, device_id, device_secret) VALUES ('$username', '$password', '$device_id', '$device_secret')";

    if ($conn->query($query)) {
        echo "Registration successful! Your device secret is: $device_secret <br>";
        echo "<a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Register</h2>
<form method="post" action="register.php">
    <label>Username:</label>
    <input type="text" name="username" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <label>Device ID:</label>
    <input type="text" name="device_id" required><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
