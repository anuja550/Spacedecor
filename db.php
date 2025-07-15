<?php
session_start(); // Start session at the beginning
$servername = "localhost"; // Must be 'localhost' for XAMPP
$username = "root";        // Default XAMPP MySQL username
$password = "";            // Default password is empty in XAMPP
$database = "space_decor"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
