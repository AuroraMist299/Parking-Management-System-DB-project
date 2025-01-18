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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $full_name = trim($_POST['full_name']);
    $password = trim($_POST['password']);
    
    // Check if full_name and password are empty
    if (empty($full_name) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Prepare SQL to fetch user data by full_name
        $stmt = $conn->prepare("SELECT password FROM signup WHERE full_name = ?");
        $stmt->bind_param("s", $full_name);  // Bind the full_name parameter
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if user exists
        if ($result->num_rows > 0) {
            // Fetch user data (password hash)
            $row = $result->fetch_assoc();
            $stored_hash = $row['password'];
            
            // Verify the entered password against the stored hash
            if (password_verify($password, $stored_hash)) {
                // Password is correct, proceed with login
                echo "Login successful!";
                // You can redirect to a logged-in page or dashboard here
            } else {
                // Incorrect password
                echo "Invalid password.";
            }
        } else {
            // User does not exist
            echo "No user found with that full name.";
        }
    }
}

$conn->close();
?>
