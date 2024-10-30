<?php
// Database Configuration
$host = 'localhost';          // Database host (usually 'localhost')
$dbname = 'bank_system';      // Name of the database
$username = 'root';           // Database username
$password = '';               // Database password (set it if your MySQL server requires one)

// Create Connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
