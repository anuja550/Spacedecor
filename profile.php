<?php
session_start();
if (isset($_SESSION["user_name"])) {
    echo '
    <div class="user-profile">
        <button onclick="toggleDropdown()" class="profile-btn">
            ' . strtoupper($_SESSION["user_name"][0]) . '
        </button>
        <div id="profileDropdown" class="dropdown-content">
            <p>Welcome, ' . $_SESSION["user_name"] . '!</p>
            <a href="profile.php">Profile</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    ';
} else {
    echo '<a href="login.html" class="login-btn">Login</a>';
}
?>
