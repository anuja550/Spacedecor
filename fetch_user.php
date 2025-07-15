<?php

session_start();
header('Content-Type: application/json'); // Ensure JSON response

if (isset($_SESSION["user_id"])) {
    echo json_encode([
        "success" => true,
        "name" => $_SESSION["user_name"],
        "email" => $_SESSION["user_email"]
    ]);
} else {
    echo json_encode(["success" => false, "error" => "User not logged in"]);
}


?>
