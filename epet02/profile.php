<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}




// Include your database connection file
include 'db.php';

// Fetch user data
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    // Update user information in the database
    $updateQuery = "UPDATE users SET first_name='$firstname', middle_name='$middlename', last_name='$lastname', username='$newUsername', password='$newPassword' WHERE username='$username'";
    mysqli_query($conn, $updateQuery);

    // Redirect to the profile page to show the updated information
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
.content {
position: static;
margin-top: 60px;
margin-left: 500px;
margin-bottom: 10px;
width: 600px;
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
form h2{
    text-align:center;
} 
.form-buttons {
    display: flex;
    align-items: center;
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
<?php include 'includes/sidebar1.php';?>

<div class="content">
    <div class="container mt-5">
        <h1>User Profile</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['first_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $row['middle_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['last_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="changePasswordCheckbox">
                <label class="form-check-label" for="changePasswordCheckbox">Change Password</label>
            </div>
            <div id="passwordFields" style="display: none;">
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a href="Pet_management.php" class="btn btn-danger cancel-button">Cancel</a><br><br>
        </form>
    </div>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>';
    });

    const changePasswordCheckbox = document.querySelector('#changePasswordCheckbox');
    const passwordFields = document.querySelector('#passwordFields');
    changePasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordFields.style.display = 'block';
        } else {
            passwordFields.style.display = 'none';
        }
    });
</script>

<?php
include 'includes/footer.php';
?>
