<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['username']) || !isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'admin') {
    header("Location: login.php");
    exit();
}
include 'includes/sidebar.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>



<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>


<?php
include 'includes/footer.php';

?>
