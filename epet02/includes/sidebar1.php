
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar Example</title>
  <style>

@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #f3f5f9;
}

.wrapper {
  display: flex;
  position: relative;
}

.wrapper .sidebar {
  height: 100%;
  width: 250px;
  position: fixed;
  top: 0;
  left: 0;
  background: linear-gradient(-45deg, #66D3FA,#0F5298);
  overflow-x: show;
  transition: 0.5s;
  padding-top: 30px 0; /* corrected line */
}


.wrapper .sidebar img{
    padding-top: 10px;
    margin-left: 50px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
} 

.wrapper .sidebar ul li a {
  text-decoration: none;
  font-size: 15px;
  color: #111;
  overflow-x: hidden;
  display: block;
  transition: 0.3s;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #002966;
}
    
.wrapper .sidebar ul li:hover a{
  color: #fff;
}

.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 40px;
  background: #e0e0e0;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  overflow-x: show;
  color: #111;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  transition: 0.3s;
}

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header{
  padding: 20px;
  background: #e0e0e0;
  color: #717171;
  border-bottom: 1px solid #e0e4e8;
}

.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}

.wrapper .sidebar .sidebar.active {
  transform: translateX(0);
}

.box {
  position: fixed;
  width: 90%; /* Width of the box */
  height: 50px; /* Height of the box */
  margin-left:250px;
  background: linear-gradient(-50deg, #66D3FA,#0F5298); /* Background color */
  border: 1px solid #111; /* Border */
             
  padding: 20px; /* Padding inside the box */
  box-sizing: border-box; /* Include border and padding in the box's total width and height */
}

/* Adjust alignment of user info */
.box .user-info {
  position: fixed;
  right: 10px; /* Adjust left position */
  top: 10px; /* Adjust top position */
}

.box .user-info a {
  display: block; /* Make the link a block element */
  color: #111; /* Adjust text color */
  text-decoration: none; /* Remove underline */
  font-size: 16px; /* Adjust font size */
  padding: 5px; /* Add padding */
}

.toggle-btn {
  position: fixed;
  left: 10px;
  top: 10px;
  font-size: 20px;
  padding: 5px;
  cursor: pointer;
  background-color: transparent;
  border: none;
  color: #111;
}
.toggle-btn:hover {
  color: #fff; /* Change color on hover */
}

  </style>
</head>
<body>

<div class="wrapper">
  <div class="sidebar" id="sidebar">
  <b class="sidebar-brand" class="logo"><img src="images/logo1.png" alt="Logo"><br></b>

    <ul>
    <li><a href="Pet_management.php"><i class="fas fa-home"></i>Pet Manage</a></li>
            <li><a href="Dog&Cat_Registration.php"><i class="fas fa-paw"></i>Register Pet</a></li>
            <li><a href="loss_pets.php"><i class="fas fa-list-ul"></i>Lost/Found</a></li>
            <li><a href="about_us.php"><i class="fas fa-address-card"></i>About</a></li>
            <li><a href="logout.php"><i class="fas fa-arrow-left"></i>Log Out</a></li>
    </ul>
    <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-google"></i></a>
          <a href="#"><i class="fab fa-telegram"></i></a>
      </div>
  </div>

  <div class="box">
  <div class="user-info">
      <?php if (isset($_SESSION['first_name'])) : ?>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, <?php echo $_SESSION['first_name']; ?> 
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
            <li><a class="dropdown-item" href="user_management.php">User Management</a></li>
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      <?php else : ?>
        <span class="nav-link">Welcome, Guest</span>
      <?php endif; ?>
    </div>
</div>
<div class="Content">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
</div>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  var content = document.querySelector(".Content");
  if (sidebar.style.width === "250px") {
    sidebar.style.width = "0";
    content.style.marginLeft = "0";
  } else {
    sidebar.style.width = "250px";
    content.style.marginLeft = "250px";
  }
}

</script>
</body>
</html>