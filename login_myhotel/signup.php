<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // SOMETHING WAS POSTED
    $name = $_POST['name'];
    $user_name = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if fields are not empty and valid
    if (!empty($name) && !empty($user_name) && !empty($phone) && !empty($password) && !empty($confirm_password) && !is_numeric($user_name)) {
        if ($password === $confirm_password) {
            // Save to database
            $user_id = random_num(20);
            //$query = "insert into users (user_id, name, user_name, phone, password) values ('$user_id','$name','$user_name','$phone','$password')";
            $query = "insert into users (user_id, name, username, phone, password) values ('$user_id','$name','$user_name','$phone','$password')";
            mysqli_query($con, $query);
            header("location: login.php");
            die;    

            if ($query->execute()) {
                header("Location: login.php");
                die;
            } else {
                echo "Error: " . $query->error;
            }
        } else {
            echo "Passwords do not match!";
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Signup</h2>
        <form method="post" id="SignupForm">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            
            <button type="submit">Signup</button>
            <a href="login.php">Login</a>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
