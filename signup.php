<?php

// Database connection
$servername = "localhost"; // Replace with your database host
$dbusername = "root"; // Replace with your database username
$dbpassword = ""; // Replace with your database password
$databasename = "parking system"; // Replace with your database name

$conn = new mysqli($servername, $dbusername, $dbpassword, $databasename);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'] ?? '';
    $email_address = $_POST['email_address'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    var_dump($full_name, $email_address, $password, $confirm_password);

    // Check if any field is empty
    if (empty($full_name) || empty($email_address) || empty($password) || empty($confirm_password)) {
        echo "All fields are required.";
    } else {
        // Check if passwords match
        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Check if the email already exists
            $stmt = $conn->prepare("SELECT * FROM signup WHERE email_address = ?");
            $stmt->bind_param("s", $email_address);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "Email is already registered.";
            } else {
                // Insert user data into the database
                $stmt = $conn->prepare("INSERT INTO signup (full_name, email_address, password, confirm_password) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $full_name, $email_address, $password, $confirm_password);

                if ($stmt->execute()) {
                    echo "Registration successful!";
                    // Optionally, redirect the user to the login page after successful sign-up
                    header("Location: login.php"); // Redirect to login page after successful registration
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
        }
    }
}

// Close the database connection
$conn->close();
?>