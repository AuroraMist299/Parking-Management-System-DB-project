<?php
// Database connection
$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$databasename = "parking system"; 

// Establish the database connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $databasename);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = trim($_POST['city']); // Get the city from the form

    // Check if the city is provided
    if (empty($city)) {
        echo "Please enter a city.";
    } else {
        // Prepare the SQL query to insert the city into the database
        $stmt = $conn->prepare("INSERT INTO available_parking_spot (city) VALUES (?)");
        $stmt->bind_param("s", $city);  // 's' denotes that the input is a string

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            echo "City '$city' has been added successfully to available parking spots.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
