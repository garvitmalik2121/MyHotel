<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php'; // Include the connection script

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare and bind
$stmt = $con->prepare("INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "<div class='confirmation-message'>Thank you for contacting us. We will get back to you soon.</div>";
} else {
    echo "<div class='confirmation-message'>Error: " . $stmt->error . "</div>";
}

// Close statement and connection
$stmt->close();
$con->close();
?>
