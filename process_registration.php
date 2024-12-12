<?php
session_start();
require 'db_connection.php'; // Include your database connection

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the username already exists
    $checkQuery = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($checkQuery);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check for existing username
    if ($result && $result->num_rows > 0) {
        echo "Username already exists. Please choose a different one.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Proceed to insert new user
        $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error);
        }

        $stmt->bind_param("sss", $username, $email, $hashedPassword); // Use hashed password
        $executeResult = $stmt->execute();

        if ($executeResult) {
            // Redirect to login page
            header("Location: login.html");
            exit(); // Stop script execution
        } else {
            echo "Error: " . $stmt->error; // Display any error that occurs during insertion
        }
    }
}
?>
