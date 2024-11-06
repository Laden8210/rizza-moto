<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="images/logo1.png">
    <style>
        .navbar{
          background-color: #e0e0e0;
        }
        .fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        /* Adjust alignment of user info */
        .user-info {
            margin-left: auto; /* Pushes it to the right */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light  justify-content-center fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="Pet_management.php" class="logo"><img src="images/logo2.png" alt="Logo">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="user_management.php">Users Details</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- User Info -->
    <div class="user-info">
      <?php if (isset($_SESSION['first_name'])) : ?>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, <?php echo $_SESSION['first_name']; ?> 
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      <?php else : ?>
        <span class="nav-link">Welcome, Guest</span>
      <?php endif; ?>
    </div>
  </div>
</nav>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>

