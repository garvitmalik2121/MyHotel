<?php
session_start();
$_SESSION;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" id="loginForm">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" required> 
            <button type="submit">Login</button>
            <a href="signup.php">Signup</a>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
