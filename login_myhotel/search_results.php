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

$sql = "SELECT * FROM rooms WHERE availability = TRUE AND capacity >= ?";

if ($roomtype != 'any') {
    $sql .= " AND room_type = ?";
}

$stmt = $conn->prepare($sql);
if ($roomtype == 'any') {
    $stmt->bind_param("i", $guests);
} else {
    $stmt->bind_param("is", $guests, $roomtype);
}

$stmt->execute();
$result = $stmt->get_result();
$rooms = [];

while ($row = $result->fetch_assoc()) {
    $rooms[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($rooms);
?>
