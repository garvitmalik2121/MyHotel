<?php
$dbhost = "localhost";
$dbuser = "un6ghotwvk5ug";
$dbpass = "Ir34czxlb6wk";
$dbname = "dbpvg4bwmj7qxl ()";
$port = 3306;

// Establishing connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname,$port);

// Check connection
if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}


?>
