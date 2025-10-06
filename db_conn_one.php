<?php
// =====================
// Database Connection
// =====================

// Database credentials
$servername = 'localhost';   // Usually 'localhost'
$db_user = 'root';           // Your MySQL username
$password = '';              // Your MySQL password (empty if none)
$db_name = 'sylvester';      // Name of your database

// Create connection
$conn = mysqli_connect($servername, $db_user, $password, $db_name);

// Check if connection was successful
if (!$conn) {
    // If connection failed, display error message
    die("Connection failed: " . mysqli_connect_error());
} else {
    // If connection succeeded, display success message
    echo "Connected Successfully...";
}
?>
