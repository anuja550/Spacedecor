<?php
// Database credentials
$servername = "localhost"; // Keep "localhost" for XAMPP
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (leave empty)
$database = "space_decor"; // Your existing database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Insert into database
$sql = "INSERT INTO newsletter (name, email) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $email);

if ($stmt->execute()) {
    // Redirect back to the homepage with a success message
    header("Location: index.html?success=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
