<?php
// parking_form_handler.php

// Define database connection variables
$servername = "localhost"; // Your database server (e.g., 'localhost')
$username = "root"; // Your database username
$password = ""; // Your database password
$databasename = "parking system"; // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $databasename);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Check if fields are not empty
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Validate email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Insert the data into the database
            $sql = "INSERT INTO contact_us(name, email, message) VALUES ('$name', '$email', '$message')";
            
            if ($conn->query($sql) === TRUE) {
                // Prepare email content
                $to = "your-email@example.com"; // Replace with your email address
                $subject = "New Parking System Contact Form Submission";
                $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
                $headers = "From: $email";

                // Send the email
                if (mail($to, $subject, $body, $headers)) {
                    // Success message after submitting the form and email
                    $status = "Thank you, $name! Your message has been sent and stored in our system.";
                } else {
                    $status = "Sorry, something went wrong while sending the email. Please try again later.";
                }
            } else {
                $status = "Sorry, something went wrong while storing your information. Please try again later.";
            }
        } else {
            // Invalid email address
            $status = "Invalid email address. Please enter a valid email.";
        }
    } else {
        // Fields are missing
        $status = "All fields are required. Please fill out the form completely.";
    }
} else {
    // Invalid request method
    $status = "Invalid request method.";
}

// Close the database connection
$conn->close();

// Redirect back to the form with the status message
header("Location: contact_us.html?status=" . urlencode($status));
exit();
?>
