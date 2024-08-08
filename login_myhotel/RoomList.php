<?php
include 'db.php';

$sql = "SELECT Room.RoomID, Room.Description, RoomType.TypeName, RoomView.ViewName, Room.PhotoPath
        FROM Room
        JOIN RoomType ON Room.RoomTypeID = RoomType.RoomTypeID
        JOIN RoomView ON Room.RoomViewID = RoomView.RoomViewID
        LEFT JOIN RoomPhoto ON Room.RoomID = RoomPhoto.RoomID";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room List - MyHotel</title>
    <link rel="stylesheet" href="contents.css">
    <link rel="stylesheet" href="format.css">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="slidshow.css">
    <link rel="stylesheet" href="gallery.css">
    <script src="format.js" defer></script>
    <script src="gallery.js" defer></script>
    <script src="slidshow.js" defer></script>
    <script src="facilities.js" defer></script>
    <style>
        .room {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .room img {
            width: 300px;
            height: auto;
        }
        .room-details {
            padding: 20px;
            flex-grow: 1;
        }
        .room-details h2 {
            margin-top: 0;
        }
        .room-details p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <a href="index.php" class="logo">
            <img src="images/Logo.png" alt="Company Logo">
        </a>
        <div class="menu-icon" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="nav-container">
            <nav class="nav-links">
                <a href="about us.html">ABOUT US</a>
                <a href="room_features.php">ROOMS</a>
                <a href="SearchingPage.html">SEARCH</a>
                <a href="contact us.html">CONTACT US</a>
            </nav>
        </div>
        <a href="login.php" class="login-btn">Login</a>
    </header>
    <div class="container">
        <h1>Hotel Room List</h1>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="room">';
                echo '<img src="' . $row["PhotoPath"] . '" alt="' . $row["TypeName"] . '">';
                echo '<div class="room-details">';
                echo '<h2>' . $row["TypeName"] . ' (' . $row["ViewName"] . ')</h2>';
                echo '<p>' . $row["Description"] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    <footer>
        <p>&copy; 2024 MyHotel. All rights reserved.</p>
    </footer>
</body>
</html>
