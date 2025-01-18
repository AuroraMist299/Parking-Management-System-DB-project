<?php
// Database connection
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$databasename = "parking system";  // Change to your database name

$conn = new mysqli($servername, $dbusername, $dbpassword, $databasename);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $location = mysqli_real_escape_string($conn, trim($_POST['location']));
    
    // Validate the form inputs
    if (empty($location)) {
        echo "Location is required.";
    } else {
        // Query to search available parking spots based on location (and/or zip code)
        $sql = "SELECT * FROM available_parking_spot WHERE (location LIKE '%$location%' OR zip_code LIKE '%$location%') AND is_available = 3";
        
        $result = $conn->query($sql);
        
        // Check if there are any available spots
        if ($result->num_rows > 0) {
            // Display available parking spots
            echo "<h2>Available Parking Spots:</h2>";
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>Location: " . $row['location'] . " - Zip Code: " . $row['zip_code'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No available parking spots found for the selected location.";
        }
    }
}

// Close the database connection
$conn->close();
?>
