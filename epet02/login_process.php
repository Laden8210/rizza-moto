<?php
session_start();
include 'db.php';

$username = $_POST['loginUsername'];
$password = $_POST['loginPassword'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['usertype'] = $row['usertype'];
    $_SESSION['first_name'] = $row['first_name']; // Ensure first_name is set in session
    if ($row['usertype'] == 'admin') {
        header("Location: Pet_management.php"); // Redirect to admin dashboard
    
    } else {
        header("Location: Pet_management.php"); // Redirect to user dashboard

    }
    exit(); // Ensure no further code execution after redirection
} else {
    echo "<script>alert('Invalid username or password');</script>";
    echo "<script>window.location.href='login.php';</script>";
}

?>
