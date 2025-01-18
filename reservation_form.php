<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);  // Debugging the form data

    // Sanitize user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $vehicle_number = mysqli_real_escape_string($conn, $_POST['vehicle_number']);

    // Validate inputs
    if (empty($name) || empty($phone_number) || empty($vehicle_number)) {
        echo "All fields are required.";
    } else {
        $stmt = $conn->prepare("INSERT INTO reservation_form (name, phone_number, vehicle_number) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $phone_number, $vehicle_number);

if ($stmt->execute()) {
    echo "Reservation successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();

    }
}

$conn->close();
?>
