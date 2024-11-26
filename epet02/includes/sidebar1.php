<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Sidebar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background: linear-gradient(135deg, #0F5298, #66D3FA);
      color: #fff;
      transition: all 0.3s ease-in-out;
      z-index: 999;
    }

    .sidebar.closed {
      width: 0;
      overflow: hidden;
    }

    .sidebar .brand {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem 0;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .sidebar ul {
      padding: 0;
      list-style: none;
    }

    .sidebar ul li {
      padding: 15px 20px;
      transition: background 0.3s;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar ul li:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar ul li a i {
      font-size: 1.2rem;
    }

    .sidebar .social_media {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }

    .sidebar .social_media a {
      color: #fff;
      font-size: 1.2rem;
      transition: color 0.3s;
    }

    .sidebar .social_media a:hover {
      color: #0F5298;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
      transition: margin-left 0.3s ease-in-out;
    }

    .main-content.expanded {
      margin-left: 0;
    }

    .toggle-btn {
      position: fixed;
      left: 10px;
      top: 10px;
      background: transparent;
      border: none;
      color: #0F5298;
      font-size: 1.5rem;
      cursor: pointer;
      z-index: 1000;
    }

    .toggle-btn:hover {
      color: #66D3FA;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 0;
      }

      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar" id="sidebar">
    <div class="brand">
      <img src="images/logo1.png" alt="Logo" width="120">
    </div>
    <ul>
      <li><a href="Pet_management.php"><i class="fas fa-home"></i> Dashboard</a></li>
      <li><a href="Dog&Cat_Registration.php"><i class="fas fa-paw"></i> Register Pet</a></li>
      <li><a href="loss_pets.php"><i class="fas fa-search"></i> Lost/Found</a></li>
      <li><a href="about_us.php"><i class="fas fa-info-circle"></i> About Us</a></li>
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
    <div class="social_media">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
  </div>


  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const mainContent = document.getElementById("mainContent");

      if (sidebar.classList.contains("closed")) {
        sidebar.classList.remove("closed");
        mainContent.classList.remove("expanded");
      } else {
        sidebar.classList.add("closed");
        mainContent.classList.add("expanded");
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
