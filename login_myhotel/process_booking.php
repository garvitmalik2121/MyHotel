<?php
session_start();
include("connection.php");
include("functions.php");

// Check if user is logged in
$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $roomType = $_POST['roomType'];
    $roomDetails = $_POST['roomDetails'];
    $bookingDetails = $_POST['booking_details'];
    $paymentMethod = $_POST['payment_method'];

    // Validate and process payment details
    if ($paymentMethod == 'card') {
        $cardNumber = $_POST['card_number'];
        $expiryDate = $_POST['expiry_date'];
        $cvv = $_POST['cvv'];

        // Add validation for card details (e.g., format checks)
        if (empty($cardNumber) || empty($expiryDate) || empty($cvv)) {
            echo "Please fill in all card details.";
            exit;
        }

        // Here you might want to add more validation for card details and expiry date
    }

    // Save booking information to database
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];

    // Prepare SQL query to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO bookings (user_id, room_type, room_details, full_name, email, booking_details, payment_method) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", 
        $user_data['user_id'], 
        $roomType, 
        $roomDetails, 
        $fullName, 
        $email, 
        $bookingDetails, 
        $paymentMethod
    );

    if ($stmt->execute()) {
        echo "Booking confirmed!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
