<?php
session_start();

include 'db.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM vac_reservations WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    // If no ID is provided, redirect to a page or display an error message
    header("Location: vac_list.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $middlename = $_POST['middle_name'];
    $o_gender = $_POST['o_gender'];
    $o_age = $_POST['o_age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];

    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $breed = $_POST['breed'];
    $desc_breed = $_POST['desc_breed'];
    $color = $_POST['color'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $yr_mnth = $_POST['yr_mnth'];
    $status_pet = $_POST['status_pet'];
    $description = $_POST['description'];

    // Assuming you have an upload mechanism for the profile picture, you can handle it here

    // Update the pet details in the database
    $updateQuery = "UPDATE vac_reservations SET first_name='$first_name',last_name='$last_name',middle_name='$middle_name', o_gender='$o_gender', o_age='$o_age',
     phone='$phone', email='$email', house_no='$house_no', street='$street', barangay='$barangay', pet_name='$pet_name', pet_type='$pet_type' 
     , breed='$breed', desc_breed='$desc_breed', color='$color', gender='$gender', age='$age', yr_mnth='$yr_mnth', status_pet='$status_pet', description='$description' WHERE id='$id'";
    mysqli_query($conn, $updateQuery);

    // Redirect to a page after successful update
    header("Location: vac_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vaccine Reservation</title>
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
</head>
</head>
<body>
<?php include 'includes/sidebar1.php'; ?> 
<?php include 'includes/header.php'; ?>


<div class="content">
<div class="container mt-5">
    <h2>Edit Pet Details</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
    <h3><br>Name</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="middle_name" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $row['middle_name']; ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3">
                <div class="mb-6">
                    <label for="o_gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" name="o_gender" value="<?php echo $row['o_gender']; ?>" required>
                </div>
            </div>
            <div class="col-md-1">
                <div class="mb-6">
                    <label for="o_age" class="form-label">Age</label>
                    <input type="text" class="form-control" name="o_age" value="<?php echo $row['o_age']; ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control"placeholder="@gmail.com" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
                </div>
            </div>
            
        </div>

        <h3>Address</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="house_no" class="form-label">HouseNo. / Block/ Lot</label>
                    <input type="text" class="form-control" id="house_no" name="house_no" value="<?php echo $row['house_no']; ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" value="<?php echo $row['street']; ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="barangay" class="form-label">Barangay</label>
                    <select class="form-select" name="barangay" value="<?php echo $row['barangay']; ?>" required>
                        <option value="San Roque">San Roque</option>
                    </select>
                </div>
            </div>
        </div>
        
        
        <hr>
        <h3>Pet Details</h3>
        <div class="pet-details">
            <div class="pet-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="pet_name" class="form-label">Pet Name</label>
                        <input type="text" class="form-control" name="pet_name" value="<?php echo $row['pet_name']; ?>" required>
                    </div>
                </div>
                    
                <div class="col-md-2">
                    <div class="mb-6">
                        <label for="pet_type" class="form-label">Pet Type</label>
                        <input type="text" class="form-control" name="pet_type" value="<?php echo $row['pet_type']; ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-6">
                        <label for="breed" class="form-label">Breed</label>
                        <input type="text" class="form-control" name="breed" value="<?php echo $row['breed']; ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-6">
                        <label for="desc_breed" class="form-label">Others (Mixed Breed)</label>
                        <input type="text" class="form-control" name="desc_breed" value="<?php echo $row['desc_breed']; ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-6">
                        <label for="color" class="form-label">Pet Color</label>
                        <input type="text" class="form-control" name="color" value="<?php echo $row['color']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">    
            <div class="col-md-2">
                <div class="mb-6">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-6">
                    <label for="petAge" class="form-label">Age</label>
                    <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-6">
                    <label for="yr_mnth" class="form-label">Yr/Month</label>
                    <input type="text" class="form-control" name="yr_mnth" value="<?php echo $row['yr_mnth']; ?>" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-6">
                    <label for="status_pet" class="form-label">Status</label>
                    <input type="text" class="form-control" name="status_pet" value="<?php echo $row['status_pet']; ?>" required>
                </div>
            </div>
        
                <div class="mb-1">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
                </div> 
            

            </div>
        </div>
        <!-- Include the file upload input if needed -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="loss_pets.php" class="btn btn-danger cancel-button">Cancel</a>
        <br><br>
    </form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
