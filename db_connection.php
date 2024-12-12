<?php
// db_connection.php
$servername = "localhost";
$username = "ken"; // Change to your database username
$password = "20060"; // Change to your database password
$dbname = "coffee_shop"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
