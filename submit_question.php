<?php
include 'db_config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $question = $conn->real_escape_string($_POST['question']);

    $sql = "INSERT INTO user_questions (name, email, question) VALUES ('$name', '$email', '$question')";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Sends only 'success' to prevent alerts
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
