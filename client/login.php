<?php
session_start();
$conn = new mysqli("localhost", "root", "", "cultiveer");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/client.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
        <br>
        <button onclick="window.location.href='register.php'" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; transition: background-color 0.5s ease;" onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#01714d'">Register</button><a href="register.php">Register</a>
        <a href="#">Forgot Password?</a>
    </div>
</div>

</body>
</html>
