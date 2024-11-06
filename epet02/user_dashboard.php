<?php
session_start();

// Check if user is logged in as user
if (!isset($_SESSION['username']) || !isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'user') {
    header("Location: index.php");
    exit();


}

// You can put your user dashboard content here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Include your CSS and JavaScript files here -->
</head>
<body>
<?php include 'includes/sidebar1.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/navbaruser.php';?>

</body>
</html>
