<!-- checkout.php -->
<?php
session_start();
include("connection.php");
include("functions.php");

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $room_name = $_POST['room_name'];
    $room_price = $_POST['room_price'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['payment_method'])) {
    $booking_details = $_POST['booking_details'];
    $payment_method = $_POST['payment_method'];
    
    if (!empty($booking_details) && !empty($payment_method)) {
        if ($payment_method == 'card') {
            $card_number = $_POST['card_number'];
            $expiry_date = $_POST['expiry_date'];
            $cvv = $_POST['cvv'];
            
            // Stripe Payment
            \Stripe\Stripe::setApiKey('your_stripe_secret_key');
            
            try {
                $charge = \Stripe\Charge::create([
                    'amount' => $room_price * 100, // Amount in cents
                    'currency' => 'usd',
                    'source' => 'tok_visa', // Use a token from Stripe.js
                    'description' => 'Booking Payment',
                ]);
                
                // Save booking to database
                $query = $con->prepare("INSERT INTO bookings (room_name, room_price, booking_details, payment_method, payment_status, amount) VALUES (?, ?, ?, ?, ?, ?)");
                $status = 'Paid';
                $query->bind_param("sssssd", $room_name, $room_price, $booking_details, $payment_method, $status, $room_price);
                $query->execute();
                
                echo "Payment Successful!";
            } catch (\Stripe\Exception\CardException $e) {
                echo "Payment failed: " . $e->getMessage();
            }
        } elseif ($payment_method == 'paypal') {
            // Redirect to PayPal payment page
            header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=your_paypal_email&item_name=Booking+Payment&amount=$room_price&currency_code=USD");
            exit();
        } elseif ($payment_method == 'cash') {
            // Save booking with cash payment status
            $query = $con->prepare("INSERT INTO bookings (room_name, room_price, booking_details, payment_method, payment_status, amount) VALUES (?, ?, ?, ?, ?, ?)");
            $status = 'Pending Cash Payment';
            $query->bind_param("sssssd", $room_name, $room_price, $booking_details, $payment_method, $status, $room_price);
            $query->execute();
            
            echo "Booking Successful! Please pay cash upon arrival.";
        }
    } else {
        echo "Please enter valid booking details and select a payment method!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Payment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="booking-container">
        <h2>Booking Payment</h2>
        <form method="post" action="">
            <label for="booking_details">Booking Details</label>
            <textarea id="booking_details" name="booking_details" required></textarea>

            <label for="payment_method">Payment Method</label>
            <select id="payment_method" name="payment_method" required>
                <option value="card">Card</option>
                <option value="paypal">PayPal</option>
                <option value="cash">Cash</option>
            </select>

            <div id="card_details" class="payment-details" style="display: none;">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv">
            </div>

            <input type="hidden" name="room_price" value="<?php echo htmlspecialchars($room_price); ?>">
            <input type="hidden" name="room_name" value="<?php echo htmlspecialchars($room_name); ?>">

            <button type="submit">Make Payment</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const paymentMethodSelect = document.getElementById('payment_method');
            const cardDetailsDiv = document.getElementById('card_details');

            paymentMethodSelect.addEventListener('change', (event) => {
                if (event.target.value === 'card') {
                    cardDetailsDiv.style.display = 'block';
                } else {
                    cardDetailsDiv.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
