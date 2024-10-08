<?php
session_start();

include("connection.php");
include("functions.php");

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // SOMETHING WAS POSTED
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Read from database
        $query = "SELECT * FROM users WHERE username = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.html");
                    exit();
                } else {
                    $error = "Wrong password";
                }
            } else {
                $error = "No user found";
            }
        } else {
            $error = "Query failed: " . mysqli_error($con);
        }
    } else {
        $error = "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="login.php" id="loginForm">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
            <a href="signup.php">Signup</a>
        </form>
        <?php
        if (!empty($error)) {
            echo "<div class='error-message'>$error</div>";
        }
        ?>
    </div>
    <!-- <script src="script.js"></script> -->
</body>
</html>
