<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbhost = "localhost";
$dbuser = "ur9xggl1kopip";
$dbpass = "%1412hD_2{4>";
$dbname = "dbpvg4bwmj7qxl";
$port = 3306; 


// Establishing connection
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $port);

// Check connection
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
}

// Optionally, you can log the successful connection for debugging
// error_log("Connected successfully", 0);
?>
