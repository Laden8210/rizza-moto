<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Sidebar Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
<style>
    /* CSS styles for sidebar */
.sidebar {
  height: 90%;
  width: 200px;
  position: fixed;
  top: 85px;
  left: 0;
  background-color: #bdbdbd;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar h5 {
  color: #bdbdbd;
  text-align: center;
}

.sidebar a {
  padding: 10px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block;
}

.sidebar a:hover {
  background-color: #3C99DC;
}

.dropdown-btn {
  width: 100%;
  padding: 10px;
  font-size: 18px;
  background-color: #bdbdbd;
  color: black;
  border: none;
  cursor: pointer;
  outline: none;
}

.dropdown-container {
  display: none;
  background-color: #bdbdbd;
}

.dropdown-container a {
  padding: 10px 20px;
  font-size: 16px;
}

.show {
  display: block;
}

.content {
  transition: margin-left 0.5s;
  padding: 16px;
}

.togglebtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #0074D9;
  color: black;
  border: none;
  position: fixed;
  top: 85px;
  left: 5px;
  z-index: 999;
}
/* Media query to adjust sidebar width for smaller screens */
/* Media query for smaller screens */
@media (max-width: 768px) {
            .sidebar {
                width: 100%; /* Make sidebar full width */
                height: auto;
                position: relative;
                margin-bottom: 20px;
            }

            .content {
                margin-left: 0; /* Reset content margin */
            }
        }
</style>
</head>
<body>

<div class="sidebar" id="sidebar">
  <button class="togglebtn" onclick="toggleSidebar()">&#9776;</button>
  <h5>Menu</h5>
  <a href="Pet_management.php"><i class="fas fa-paw"></i> Pet Information</a>

  <button class="dropdown-btn" onclick="toggleDropdown(this)"><i class="fas fa-cogs"></i> Services</button>
  <div class="dropdown-container">
    <a href="vac_list.php">Pet Vaccine</a>
    <a href="loss_pets.php">Lost & Found</a>
    <a href="cremation.php">Cremation Form</a>
  </div>

  <a href="about_us.php"><i class="fas fa-info-circle"></i> About</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<script>
// Function to toggle the sidebar visibility
function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  var content = document.getElementById("content");
  if (sidebar.style.width === "200px") {
    sidebar.style.width = "0";
    content.style.marginLeft = "0";
  } else {
    sidebar.style.width = "200px";
    content.style.marginLeft = "200px";
  }
}

// Function to toggle the dropdown menu visibility
function toggleDropdown(btn) {
  var dropdownContainer = btn.nextElementSibling;
  dropdownContainer.classList.toggle('show');
}

// Function to handle window resize event
window.addEventListener('resize', function() {
  var sidebar = document.getElementById("sidebar");
  var content = document.getElementById("content");
  // If window width is greater than 600px, show the sidebar, otherwise hide it
  if (window.innerWidth > 600) {
    sidebar.style.width = "200px";
    content.style.marginLeft = "200px";
  } else {
    sidebar.style.width = "0";
    content.style.marginLeft = "0";
  }
});

// Initialize sidebar visibility on page load
window.onload = function() {
  if (window.innerWidth <= 600) {
    var sidebar = document.getElementById("sidebar");
    var content = document.getElementById("content");
    sidebar.style.width = "0";
    content.style.marginLeft = "0";
  }
};
</script>

</body>
</html>
