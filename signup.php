<?php
session_start();
$_SESSION;

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // SOMETHING WAS POSTED
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

        // save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
        mysqli_query($con, $query);
        header("location: login.php");
        die;

    }else{
        echo "Please enter some valid information!";
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Signup</h2>
        <form method="post" id="loginForm">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Signup</button>
            <a href="login.php">login</a>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
