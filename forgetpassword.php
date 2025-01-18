<?php
// Assuming you have a form where the user enters their email to reset password

// Database connection
$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$databasename = "parking system"; 

$conn = new mysqli($servername, $dbusername, $dbpassword, $databasename);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the user is submitting their email for password reset
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM forgetpassword WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // If email is found, update the request_time
    if ($result->num_rows > 0) {
        // Assuming you're updating the time when the reset request is made
        $stmt = $conn->prepare("UPDATE forgetpassword SET request_time = CURRENT_TIMESTAMP WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        echo "Password reset request has been updated with the current time.";
    } else {
        echo "Email not found.";
    }
}

$conn->close();
?>
