<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // You can add code here to send an email, save to a database, etc.

    // Redirect back to the contact page with a success message
    header("Location: contact.php?status=success");
    exit();
}
?>
