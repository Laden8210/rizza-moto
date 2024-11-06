<?php
// Include your database connection file
include 'db.php';

// Check if ID parameter is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    $deleteQuery = "DELETE FROM vac_reservations WHERE id='$id'";
    mysqli_query($conn, $deleteQuery);

    // Redirect back to user management page
    header("Location: loss_pets.php");
    exit();
} else {
    // Redirect if ID parameter is not provided
    header("Location: loss_pets.php");
    exit();
}
?>
