<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "coffee_shop"); // Adjust the parameters here
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Fetch user data
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email; // Or any user identifier
            header('Location: shopping.php'); // Adjust if your shopping page name is different
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}
?>
