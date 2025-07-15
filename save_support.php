<?php
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$database = "space_decor";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$category = $_POST['category'];
$priority = $_POST['priority'];
$message = $_POST['message'];

$uploadDir = "uploads/";
$filePath = NULL; // Default null if no file is uploaded

// Check if a file is uploaded
if (!empty($_FILES['files']['name'])) {
    $fileName = basename($_FILES['files']['name']);
    $fileTmpName = $_FILES['files']['tmp_name'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'txt'];

    if (in_array($fileType, $allowedTypes)) {
        // Rename file to avoid overwriting
        $newFileName = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
        $filePath = $uploadDir . $newFileName;

        // Move uploaded file to uploads folder
        if (!move_uploaded_file($fileTmpName, $filePath)) {
            echo "error_uploading";
            exit;
        }
    } else {
        echo "invalid_file";
        exit;
    }
}

// Prepare SQL statement
$sql = "INSERT INTO support_requests (name, email, subject, category, priority, message, file_path)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $name, $email, $subject, $category, $priority, $message, $filePath);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

// Close connection
$stmt->close();
$conn->close();
?>
