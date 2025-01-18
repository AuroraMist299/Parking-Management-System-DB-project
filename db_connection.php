<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "parking system";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    
    $conn = mysqli_connect($servername, $username, $password, $databasename);
    echo "Connected successfully";
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}

mysqli_close($conn);
?>