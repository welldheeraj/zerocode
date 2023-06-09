<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "student";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
//echo "Connected successfully";

// Close the connection
//$conn->close();
?>
