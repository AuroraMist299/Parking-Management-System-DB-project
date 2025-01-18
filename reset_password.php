<?php
// Database connection variables
$servername = "localhost";  // Your database server (e.g., 'localhost')
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "parking system"; // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $email = $_POST['email']; // User's email
    $password = $_POST['password']; // User's password
    $confirm_password = $_POST['confirm_password']; // User's confirmed password

    // Check if passwords match
    if ($password === $confirm_password) {
        // Hash the password (do not hash confirm_password)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert data into the database
        $sql = "INSERT INTO reset_password (email, password) VALUES ('$email', '$hashed_password')";

        // Check if the insertion is successful
        if ($conn->query($sql) === TRUE) {
            // Success message
            echo "Password updated successfully!";
        } else {
            // Error message
            echo "Error: " . $conn->error;
        }
    } else {
        // Error if passwords do not match
        echo "Passwords do not match.";
    }
}

// Close the database connection
$conn->close();
?>
