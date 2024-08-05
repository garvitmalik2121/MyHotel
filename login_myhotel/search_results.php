<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myhotel";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$guests = $_GET['guests'];
$roomtype = $_GET['roomtype'];
$price_min = $_GET['price_min'];
$price_max = $_GET['price_max'];
$facilities = isset($_GET['facility']) ? $_GET['facility'] : [];
$views = isset($_GET['view']) ? $_GET['view'] : [];

$sql = "SELECT rooms.* FROM rooms
        LEFT JOIN room_facility ON rooms.room_id = room_facility.room_id
        LEFT JOIN facilities ON room_facility.facility_id = facilities.facility_id
        LEFT JOIN room_view ON rooms.room_view_id = room_view.room_view_id
        WHERE availability = TRUE AND capacity >= ?";

$bindParams = [$guests];
$types = 'i';

if ($roomtype != 'any') {
    $sql .= " AND room_type = ?";
    $bindParams[] = $roomtype;
    $types .= 's';
}
if (!empty($price_min)) {
    $sql .= " AND price >= ?";
    $bindParams[] = $price_min;
    $types .= 'd';
}
if (!empty($price
?>