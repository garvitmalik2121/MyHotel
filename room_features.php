<!-- product_listing.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room Listing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header, main {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        header {
            background-color: #f4f4f4;
            text-align: center;
        }
        .room {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
        }
        .room h2 {
            margin-top: 0;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Select a Hotel Room</h1>
    </header>
    <main>
        <section class="room" id="room1">
            <h2>Deluxe Room</h2>
            <ul>
                <li>Price: $200/night</li>
                <li>Size: 30 sqm</li>
                <li>Bed: King</li>
                <li>View: Sea</li>
                <li>WiFi: Yes</li>
            </ul>
            <form method="post" action="checkout.php">
                <input type="hidden" name="room_name" value="Deluxe Room">
                <input type="hidden" name="room_price" value="200">
                <button type="submit">Book Now</button>
            </form>
        </section>
        <section class="room" id="room2">
            <h2>Standard Room</h2>
            <ul>
                <li>Price: $100/night</li>
                <li>Size: 20 sqm</li>
                <li>Bed: Queen</li>
                <li>View: City</li>
                <li>WiFi: Yes</li>
            </ul>
            <form method="post" action="checkout.php">
                <input type="hidden" name="room_name" value="Standard Room">
                <input type="hidden" name="room_price" value="100">
                <button type="submit">Book Now</button>
            </form>
        </section>
        <section class="room" id="room3">
            <h2>Suite</h2>
            <ul>
                <li>Price: $300/night</li>
                <li>Size: 50 sqm</li>
                <li>Bed: King</li>
                <li>View: Sea</li>
                <li>WiFi: Yes</li>
            </ul>
            <form method="post" action="checkout.php">
                <input type="hidden" name="room_name" value="Suite">
                <input type="hidden" name="room_price" value="300">
                <button type="submit">Book Now</button>
            </form>
        </section>
    </main>
</body>
</html>
