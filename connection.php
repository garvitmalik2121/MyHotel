<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_information";

// Establishing connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}

echo "Successfully connected!";
?>
