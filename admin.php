<?php
session_start();
?>

<nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
    <a href="index.html" class="navbar-brand">
        <h1 class="m-0 display-5 text-white"><span class="text-primary">Space</span>Decor</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
        <div class="navbar-nav ml-auto py-0">
            <a href="index.html" class="nav-item nav-link active">Home</a>

            <?php if (isset($_SESSION["user_name"])): ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span class="profile-icon">
                            <?php echo strtoupper($_SESSION["user_name"][0]); ?>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="profile.php" class="dropdown-item">Profile</a>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login.html" class="nav-item nav-link">Login</a>
            <?php endif; ?>

            <a href="about.html" class="nav-item nav-link">About</a>
            <a href="service.html" class="nav-item nav-link">Service</a>
            <a href="project.html" class="nav-item nav-link">Project</a>
            <a href="estimator.html" class="nav-item nav-link">Cost Estimator</a>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>
    </div>
</nav>
