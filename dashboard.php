<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html"); // Redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 50px; }
        .container { width: 60%; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 2px 5px rgba(0,0,0,0.1); }
        .btn { display: block; padding: 15px; margin: 10px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; width: 80%; margin-left: auto; margin-right: auto; }
        .btn:hover { background: #0056b3; }
        .btn-logout { background: red; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h2>
        <p>Manage your account and saved designs below:</p>
        
        <a href="my_account.php" class="btn">⚙️ My Account Settings</a>
        <a href="saved_designs.php" class="btn">💾 Saved Designs</a>
        <a href="support.html" class="btn">🆘 Contact Support</a>
        <a href="logout.php" class="btn btn-logout">🚪 Logout</a>
    </div>

</body>
</html>
