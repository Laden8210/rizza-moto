<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
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
    h2{
        text-align:center;
    }
    /* Style for the form */
    form {
        margin-top: 20px; /* Add some space above the form */
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

    .success-popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(-45deg, #66D3FA,#0F5298);
        border: 1px solid #111;
        color: white;
        padding: 50px;
        border-radius: 5px;
        z-index: 999;
        text-align: center; 
    }
    .success-popup button{
        text-align:center;
    }
    /* You can add more styles for close button if needed */
    .close {
        position: absolute;
        top: 5px;
        right: 10px;
        cursor: pointer;
    }
</style>
</head>
<body>
<?php include 'includes/sidebar1.php'; ?> 
<?php include 'includes/header.php'; ?>

<div class="content">
<div class="container mt-5">
    <h2 class="mb-4">Report Lost Pet</h2>
    <form id="myForm" action="report_lost_process.php" method="POST" enctype="multipart/form-data">
        
        <h3>Name</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="middle_name" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                </div>
            </div>
        </div>
        
        <div class="row">
                <div class="col-md-4">
                        <div class="mb-3">
                            <label for="o_gender" class="form-label">Gender</label>
                            <select class="form-select" name="o_gender" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                <div class="col-md-1">
                        <div class="mb-6">
                            <label for="o_age" class="form-label">Age</label>
                            <input type="number" class="form-control" name="o_age" required>
                        </div>
                </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control"placeholder="@gmail.com" id="email" name="email" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            
        </div>

        <h3>Address</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="house_no" class="form-label">HouseNo. / Block/ Lot</label>
                    <input type="text" class="form-control" id="house_no" name="house_no" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="barangay" class="form-label">Barangay</label>
                    <select class="form-select" name="barangay" required>
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
                    <label for="pet_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="pet_name" required>
                </div>
            </div>
                
            <div class="col-md-4">
                <label for="petType" class="form-label">Pet Type</label>
                <div class="mb-3">
                    <select class="form-select" name="pet_type" required>
                        <option value="">Select</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <label for="breed" class="form-label">Breed</label>
                <div class="mb-3">
                    <select class="form-select" name="breed" required>
                        <option value="">Select</option>
                        <option value="Aspin">Aspin</option>
                        <option value="Shih Tzu">Shih Tzu</option>
                        <option value="Siberian Husky">Siberian Husky</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Labrador Retriever">Labrador Retriever</option>
                        <option value="Beagle">Beagle</option>
                        <option value="Golden Retriever">Golden Retriever</option>
                        <option value="Poodle">Poodle</option>
                        <option value="Dachshund">Dachshund</option>
                        <option value="Rottweiler">Rottweiler</option>
                    </select>
                </div>
            </div>
            </div>

        <div class="row">
            <div class="col-md-3">
                <div class="mb-6">
                    <label for="desc_breed" class="form-label">Others(Mixed Breed)</label>
                    <input type="text" class="form-control" name="desc_breed" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-6">
                    <label for="petcolor" class="form-label">Pet Color</label>
                    <input type="text" class="form-control" name="color" required>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="mb-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-6">
                    <label for="petAge" class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-6">
                    <label for="yr_mnth" class="form-label">Yr / Month Old</label>
                    <select class="form-select" name="yr_mnth" required>
                        <option value="">Select</option>
                        <option value="Mnth">Months</option>
                        <option value="Yr">Year</option>
                        
                    </select>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="mb-6">
                    <label for="status_pet" class="form-label">Status</label>
                    <select class="form-select" name="status_pet" required>
                        <option value="">Select</option>
                        <option value="Active">Active</option>
                        <option value="Missing">Missing</option>
                        <option value="Found">Found</option>
                        <option value="Dead">Dead</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div> 
            

        </div>
    </div>
    <div class="row">
        <div class="form-buttons">
            <div class="mb-6"></div> <!-- Empty column to push the register button to the right -->
            <button type="button" class="btn btn-primary register-button" onclick="showConfirmation()">Submit</button>
            <a href="loss_pets.php" class="btn btn-danger cancel-button">Cancel</a>
        </div>
    </div>
    </form>
    <!-- Popup container -->
        <div id="confirmationPopup" class="success-popup">
            <span class="close" onclick="hideConfirmation()">&times;</span>
            <p>Are you sure you want to submit?</p>
            <button class="btn btn-primary" onclick="submitForm()">Yes</button>
            <button class="btn btn-danger" onclick="hideConfirmation()">No</button>
        </div>

</div>
</div>
<script>
    function showConfirmation() {
        var confirmationPopup = document.getElementById("confirmationPopup");
        confirmationPopup.style.display = "block";
    }

    function hideConfirmation() {
        var confirmationPopup = document.getElementById("confirmationPopup");
        confirmationPopup.style.display = "none";
    }

    function validateAndSubmitForm() {
        var inputs = document.querySelectorAll('input, select, textarea');
        var isValid = true;

        inputs.forEach(function(input) {
            if (input.required && input.value.trim() === '') {
                isValid = false;
            }
        });

        if (isValid) {
            // Submit the form
            document.getElementById("myForm").submit();
        } else {
            // Show an alert or handle the error message
            alert('Please fill in all required fields.');
        }
    }
</script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
