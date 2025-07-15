<?php
include 'db.php'; // Include database connection

header('Content-Type: application/json'); // Set JSON response

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate inputs
    if (empty($name) || empty($email) || empty($password)) {
        die("All fields are required."); // Show error message if fields are empty
    }

    // Check if email already exists
    $checkQuery = "SELECT id FROM users WHERE email = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        die("Email already registered. Please use a different email.");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION["user_id"] = $stmt->insert_id;
        $_SESSION["user_name"] = $name;
        $_SESSION["user_email"] = $email;

        // ✅ Redirect to login.html
        header("Location: login.html");
        exit(); // Ensure no further code execution after redirect
    } else {
        die("Database error: " . $conn->error);
    }
} else {
    die("Invalid request method.");
}
?>
