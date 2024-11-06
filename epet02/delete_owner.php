<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM pets WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location: Pet_management.php"); // Redirect to the registration page
    exit();
}
?>
