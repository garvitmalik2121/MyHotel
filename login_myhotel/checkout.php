<?php
session_start();
include("connection.php");
include("functions.php");

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $room_name = $_POST['room_name'];
    $room_price = $_POST['room_price'];
    $booking_details = $_POST['booking_details'];
    $payment_method = $_POST['payment_method'];

    if (empty($booking_details)) {
        $errors[] = "Please enter valid booking details!";
    }

    if (empty($payment_method)) {
        $errors[] = "Please select a payment method!";
    }

    if (empty($errors)) {
        $status = 'Pending';

        $query = "INSERT INTO bookings (room_name, room_price, booking_details, payment_method, payment_status, amount) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 'ssssss', $room_name, $room_price, $booking_details, $payment_method, $status, $room_price);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "
            <h2>Booking Details</h2>
            <p><strong>Room Name:</strong> " . htmlspecialchars($room_name) . "</p>
            <p><strong>Room Price:</strong> $" . htmlspecialchars($room_price) . "</p>
            <p><strong>Booking Details:</strong><br>" . nl2br(htmlspecialchars($booking_details)) . "</p>
            <p><strong>Payment Method:</strong> " . htmlspecialchars($payment_method) . "</p>
            ";
        } else {
            echo "Error saving booking: " . mysqli_error($con);
        }
    } else {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout</h2>
        
        <?php if (!empty($errors)) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="">
    <input type="hidden" name="room_name" value="<?php echo isset($_POST['room_name']) ? htmlspecialchars($_POST['room_name']) : ''; ?>">
    <input type="hidden" name="room_price" value="<?php echo isset($_POST['room_price']) ? htmlspecialchars($_POST['room_price']) : ''; ?>">
    
    <div class="form-group">
        <label for="booking_details">Booking Details</label>
        <textarea id="booking_details" name="booking_details" rows="4" required><?php echo isset($_POST['booking_details']) ? htmlspecialchars($_POST['booking_details']) : ''; ?></textarea>
    </div>

    <div class="form-group">
        <label for="payment_method">Payment Method</label>
        <select id="payment_method" name="payment_method" required>
            <option value="">Select Payment Method</option>
            <option value="paypal" <?php echo (isset($_POST['payment_method']) && $_POST['payment_method'] == 'paypal') ? 'selected' : ''; ?>>PayPal</option>
            <option value="card" <?php echo (isset($_POST['payment_method']) && $_POST['payment_method'] == 'card') ? 'selected' : ''; ?>>Card</option>
            <option value="cash" <?php echo (isset($_POST['payment_method']) && $_POST['payment_method'] == 'cash') ? 'selected' : ''; ?>>Cash</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit">Proceed to Payment</button>
    </div>
</form>
    </div>
</body>
</html>
