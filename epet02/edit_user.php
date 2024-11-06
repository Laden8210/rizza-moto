<?php
session_start();

// Include your database connection file
include 'db.php';

// Check if ID parameter is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch user data based on ID
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $status = $_POST['u_status'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $hno = $_POST['hno'];
        $st = $_POST['st'];
        $brgy = $_POST['brgy'];
        $role = $_POST['role'];

        // Update user information in the database
        $updateQuery = "UPDATE users SET first_name='$firstname', middle_name='$middlename', last_name='$lastname', age='$age'
        , gender='$gender', u_status='$status', email='$email', phone='$phone', hno='$hno', st='$st', brgy='$brgy', usertype='$role' WHERE id='$id'";
        mysqli_query($conn, $updateQuery);

        // Redirect back to user management page
        header("Location: user_management.php");
        exit();
    }
} else {
    // Redirect if ID parameter is not provided
    header("Location: user_management.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .content {
        position: static;
        margin-top: 60px;
        margin-left: 260px;
        margin-bottom: 10px;
        width: 1150px;
        height: 900x;
        border: 2px solid #111;
        border-radius:10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        padding: 20px; /* Add padding to give space between content and border */
}

/* Style for the container */
.container {
    margin-top: 50px;
  
}

/* Style for the form */
form {
    margin-top: 20px; /* Add some space above the form */
}

.form-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    margin-bottom: 1rem;
}

.pet-section {
    margin-top: 2rem;
}
.pet-section:not(:first-child) {
    border-top: 1px solid #ccc;
    padding-top: 1rem;
}

.remove-pet-button {
    margin-top: 0.5rem;
}
    </style>
</style>
</head>
<body>
<?php include 'includes/sidebar1.php';?>
<?php include 'includes/header.php';?>

<div class="content">
<div class="container mt-5">
    <h2>Edit User</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['first_name']; ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="middlename" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $user['middle_name']; ?>">
        </div>
    </div>    
    <div class="col-md-4">
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['last_name']; ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-1">
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo $user['age']; ?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $user['gender']; ?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label for="u_status" class="form-label">Status</label>
            <input type="text" class="form-control" id="u_status" name="u_status" value="<?php echo $user['u_status']; ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="hno" class="form-label">House#</label>
            <input type="text" class="form-control" id="hno" name="hno" value="<?php echo $user['hno']; ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="st" class="form-label">Street</label>
            <input type="text" class="form-control" id="st" name="st" value="<?php echo $user['st']; ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="brgy" class="form-label">Barangay</label>
            <input type="text" class="form-control" id="brgy" name="brgy" value="<?php echo $user['brgy']; ?>" required>
        </div>
    </div>
</div>    
    <div class="col-md-2">
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin" <?php if($user['usertype'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="user" <?php if($user['usertype'] == 'user') echo 'selected'; ?>>User</option>
            </select>
        </div>
    </div>
    <br>
        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="user_management.php" class="btn btn-danger cancel-button">Cancel</a>
    </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
