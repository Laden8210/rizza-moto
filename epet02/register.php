<?php
session_start();

include 'includes/sidebar1.php';
include 'includes/header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <style>
  
        .content {
        position: static;
        margin-top: 60px;
        margin-left: 260px;
        margin-bottom: 50px;
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
    align-items: center;
    margin-top: 1rem;
    margin-bottom: 1rem;
}
.form-buttons #submit{
    float: right;
    margin: 10px;
}
.form-buttons a{
    margin-left:10px;
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
</head>
<body>
<div class="content">
<div class="container">
    <form id="registerForm" method="POST" action="register_process.php">
        <h2>Edit User Information</h2>
        <div class="row">    
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="registerFirstname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="registerFirstname" name="registerFirstname" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="registerMiddlename" class="form-label">Middle name</label>
                    <input type="text" class="form-control" id="registerMiddlename" name="registerMiddlename" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="registerLastname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="registerLastname" name="registerLastname" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="u_status" class="form-label">Status</label>
                    <select class="form-select" name="yr_mnth" required>
                        <option value="">Select</option>
                        <option value="Single">Single</option>
                        <option value="Merried">Merried</option>
                        <option value="Devorced">Devorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="hno" class="form-label">House# / Block/ Lot</label>
                    <input type="text" class="form-control" id="hno" name="hno" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="st" class="form-label">Street</label>
                    <input type="text" class="form-control" id="st" name="st" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="brgy" class="form-label">Barangay</label>
                    <select class="form-select" name="brgy" required>
                        <option value="San Roque">San Roque</option>
                        
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="registerUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="registerUsername" name="registerUsername" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="registerPassword" name="registerPassword" required>
                </div>
            </div>
        </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="registerUserType" class="form-label">User Type</label>
                    <select class="form-select" id="registerUserType" name="registerUserType" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <a href="user_management.php" class="btn btn-danger cancel-button">Cancel</a>
    </form>
    
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
include 'includes/footer.php';
?>
</body>
</html>
