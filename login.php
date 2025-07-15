<?php
session_start();
include 'db.php'; // Include database connection



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
    
        $query = "SELECT id, name, email, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"]; // Store user ID in session
            $_SESSION["user_name"] = $user["name"]; // Store name (optional)
            $_SESSION["user_email"] = $user["email"]; // Store email (optional)
   
           header("Location: index.html");
           exit();
       } else {
           echo "<script>alert('Invalid password!'); window.location.href='login.html';</script>";
       }
   } else {
       echo "<script>alert('User not found!'); window.location.href='login.html';</script>";
   }


?>
