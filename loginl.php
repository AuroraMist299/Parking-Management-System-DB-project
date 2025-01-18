<?php
// Main PHP file to handle different page requests

// Simulating basic session or user authentication (optional)
// session_start();

// Handle the page request based on query parameter
$page = isset($_GET['page']) ? $_GET['page'] : '';

// Include the appropriate page based on the 'page' parameter
switch ($page) {
    case 'login':
        include('login.html'); // The login page
        break;
    case 'signup':
        include('signup.html'); // The signup page
        break;
    case 'aboutus':
        include('AboutUs.html'); // The About Us page
        break;
    case 'parking':
        include('available_parking_spot.html'); // The parking service page
        break;
    case 'spotallocation':
        include('select_your_spot.html'); // The spot allocation page
        break;
    default:
        // Default page or home
        include('loginl.php'); // Main home page content
        break;
}
?>
