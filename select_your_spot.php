<?php
// Database connection
$servername = "localhost"; // Replace with your database host
$dbusername = "root"; // Replace with your database username
$dbpassword = ""; // Replace with your database password
$dbname = "parking system"; // Replace with your database name

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $spot_type = mysqli_real_escape_string($conn, $_POST['spot_type']); // Replace hyphen with underscore
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Validate inputs
    if (empty($zip_code) || empty($city) || empty($spot_type) || empty($date)) {
        echo "All fields are required.";
    } else {
        // Insert reservation data into the database
        $sql = "INSERT INTO select_your_spot (zip_code, city, spot_type, date) 
                VALUES ('$zip_code', '$city', '$spot_type', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "Your spot has been successfully reserved!";
            // Optionally, redirect to a confirmation page
            // header("Location: confirmation.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
