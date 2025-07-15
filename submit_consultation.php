<?php
$servername = "localhost"; // Change if needed
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "space_decor"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$consultation_type = $_POST['consultation-type'];
$designer = $_POST['designer'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO consultations (name, email, phone, consultation_type, designer, consultation_date, consultation_time, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $email, $phone, $consultation_type, $designer, $date, $time, $message);

if ($stmt->execute()) {
    echo "Consultation booked successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
