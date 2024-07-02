<!-- checkout.php -->
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
    
    if ($payment_method == 'card') {
        $card_number = $_POST['card_number'];
        $expiry_date = $_POST['expiry_date'];
        $cvv = $_POST['cvv'];
        
        // Validate card details (you should implement card validation here)
        if (empty($card_number) || empty($expiry_date) || empty($cvv)) {
            $errors[] = "Please enter valid card details!";
        }
    }
    
    if (empty($errors)) {
        if ($payment_method == 'paypal') {
            // Open PayPal payment popup
            echo "<script>window.open('https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=your_paypal_email&item_name=Booking+Payment&amount=$room_price&currency_code=USD', '_blank', 'width=600,height=400');</script>";
        } elseif ($payment_method == 'card') {
            // Handle card payment directly in popup or modal (simulate saving here)
            $query = $con->prepare("INSERT INTO bookings (room_name, room_price, booking_details, payment_method, payment_status, amount) VALUES (?, ?, ?, ?, ?, ?)");
            $status = 'Paid with Card';
            $query->bind_param("sssssd", $room_name, $room_price, $booking_details, $payment_method, $status, $room_price);
            $query->execute();
            
            echo "<script>alert('Payment Successful with Card!'); window.close();</script>";
        } elseif ($payment_method == 'cash') {
            // Save booking with cash payment status
            $query = $con->prepare("INSERT INTO bookings (room_name, room_price, booking_details, payment_method, payment_status, amount) VALUES (?, ?, ?, ?, ?, ?)");
            $status = 'Pending Cash Payment';
            $query->bind_param("sssssd", $room_name, $room_price, $booking_details, $payment_method, $status, $room_price);
            $query->execute();
            
            echo "<script>alert('Booking Successful! Please pay cash upon arrival.'); window.close();</script>";
        }
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
    <style>
        .booking-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .booking-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group select, .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h2>Booking Payment</h2>
        
        <?php if (!empty($errors)) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="booking_details">Booking Details</label>
                <textarea id="booking_details" name="booking_details" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="">Select Payment Method</option>
                    <option value="paypal">PayPal</option>
                    <option value="card">Card</option>
                    <option value="cash">Cash</option>
                </select>
            </div>

            <div id="card_details" class="form-group" style="display: none;">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" placeholder="Enter Card Number">
                
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY">
                
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="CVV">
            </div>

            <input type="hidden" name="room_price" value="<?php echo htmlspecialchars($room_price); ?>">
            <input type="hidden" name="room_name" value="<?php echo htmlspecialchars($room_name); ?>">

            <div class="form-group">
                <button type="submit">Make Payment</button>
            </div>
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

