<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    // Validate input
    if (empty($name) || empty($email) || empty($message)) {
        // If any field is empty, return an error message
        echo "Error: Please fill in all the required fields.";
        exit;
    }
    // Email details
    $to = "info@districtmanagement.net";
    $subject = "New Message From d24 Menu";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // If the email was sent successfully, return a success message
        // echo "Message sent successfully.";
        header("Location: ../index.php?messageSent");
    } else {
        // If there was an error sending the email, return an error message
        echo "Error: Failed to send message.";
    }
} else {
    // If the request method is not POST, return an error message
    echo "Error: Invalid request method.";
}
