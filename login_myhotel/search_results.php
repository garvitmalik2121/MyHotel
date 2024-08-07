<?php
// 数据库连接信息
$servername = "localhost";
$username = "root";
$password = "Pyc13038";
$dbname = "MyHotelDatabase";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// 获取表单数据
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$guests = $_GET['guests'];
$min_price = $_GET['price_min'];
$max_price = $_GET['price_max'];
$roomtypes = isset($_GET['roomtype']) ? $_GET['roomtype'] : [];
$facilities = isset($_GET['facility']) ? $_GET['facility'] : [];
$views = isset($_GET['view']) ? $_GET['view'] : [];

// 构建SQL查询
$sql = "SELECT rooms.*, roomtypes.TypeName AS room_type
        FROM rooms
        JOIN roomtypes ON rooms.RoomTypeID = roomtypes.RoomTypeID
        WHERE rooms.PricePerNight BETWEEN $min_price AND $max_price
        AND rooms.MaxOccupancy >= $guests";

if (!in_array('any', $roomtypes)) {
    $roomtypes_str = implode("','", $roomtypes);
    $sql .= " AND roomtypes.TypeName IN ('$roomtypes_str')";
}

if (!empty($facilities)) {
    $facilities_str = implode(",", $facilities);
    $sql .= " AND rooms.RoomID IN (SELECT RoomID FROM roomfacilities WHERE FacilityID IN ($facilities_str))";
}

if (!empty($views)) {
    $views_str = implode(",", $views);
    $sql .= " AND rooms.RoomViewID IN ($views_str)";
}

// 执行查询
$result = $conn->query($sql);

if ($result === false) {
    error_log("SQL error: " . $conn->error);
    die(json_encode(["error" => "SQL error: " . $conn->error]));
}

$rooms = [];
if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}

// 关闭连接
$conn->close();

// 返回JSON格式的数据
header('Content-Type: application/json');
echo json_encode($rooms);
?>