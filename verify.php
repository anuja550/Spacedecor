<?php
require 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Update user as verified
        $update = $conn->prepare("UPDATE users SET is_verified = 1, token = NULL WHERE token = ?");
        $update->execute([$token]);
        echo "Your email has been verified! You can now log in.";
    } else {
        echo "Invalid or expired token!";
    }
}
?>
