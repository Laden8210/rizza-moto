<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner and Pet Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
        .container {
        margin-top: 50px;
        }
        h2{
            text-align:center;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }


        .pet {
            position: fixed;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
            background-color: #f9f9f9;
            position: relative;
        }

        .remove-pet {
            position: absolute;
            top: 1px;
            right: 1px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 20%;
            width: 25px;
            height: 25px;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            padding:2px;
        }
    </style>
</head>
<body>
<?php include 'includes/sidebar1.php'; ?> 
<?php include 'includes/header.php'; ?>
<div class="content">
    <div class="container">
        <h2>Owner and Pet Registration Form</h2>
        <form action="Dog&Cat_Registration_process.php" method="POST" onsubmit="return validateForm()">
            <!-- Owner Details -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-6">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                    </div>    
                    <div class="col-md-3">
                        <div class="mb-6">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="mb-6">
                            <label for="middle_name">Middle Name:</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-6">        
                            <label for="Ownergender" class="form-label">Gender:</label>
                                <select class="form-select" name="Ownergender" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                        </div>
                    </div> 
                    <div class="col-md-2">
                        <div class="mb-6">
                            <label for="Ownerage" class="form-label">Age:</label>
                            <input type="number" class="form-control" id="Ownerage" name="Ownerage" min="0"required>
                        </div>
                    </div>     
                    <div class="col-md-2">
                        <div class="mb-6">
                            <label for="date_birth" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" id="date_birth" name="date_birth" required>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-6"> 
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required><br>
                        </div>
                    </div>     
                    <div class="col-md-3">
                        <div class="mb-6">
                            <label for="contact_number" class="form-label">Contact Number:</label>
                            <input type="tel" class="form-control" id="contact_number" name="contact_number" required pattern="[0-9]{11}" title="Please enter a valid 11-digit phone number starting with 09"><br>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-6">
                            <label for="Ownershouse" class="form-label">House Number:</label>
                            <input type="text" class="form-control" id="Ownershouse" name="Ownershouse" required><br>
                        </div>
                    </div>     
                    <div class="col-md-2">
                        <div class="mb-6">
                            <label for="Ownersstreet" class="form-label">Street:</label>
                            <input type="text" class="form-control" id="Ownersstreet" name="Ownersstreet" required><br>
                        </div>
                    </div> 
                    <div class="col-md-2">
                        <div class="mb-6">        
                            <label for="Ownersbrgy" class="form-label">Gender:</label>
                                <select class="form-select" name="Ownersbrgy" required>
                                    <option value="San Roque">San Roque</option>
                                    
                                </select>
                        </div>
                    </div> 
                </div>

            <!-- Pet Details (Assuming multiple pets can be registered at once) -->
            <h2>Pet Details</h2>
            <div id="pet_details">
                <div class="pet">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-6">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name[]" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="pet_type_1" class="form-label">Pet Type:</label>
                                <select class="form-select" id="pet_type_1" name="pet_type[]" required>
                                    <option value="">Select</option>
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="mb-3">
                                <label for="pet_breed_1" class="form-label">Pet Breed:</label>
                                <select class="form-select" id="pet_breed_1" name="pet_breed[]" required>
                                    <!-- Breed options will be populated dynamically using JavaScript -->
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="mb-6">
                                <label for="desc_breed" class="form-label">Breed Description:</label>
                                <input type="text" class="form-control" name="desc_breed[]" placeholder="Mixed breed(aspin/poodle)" required>
                            </div>
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="petage" class="form-label">Age:</label>
                                <input type="number" class="form-control" id="petage" name="petage[]" min="0" required>
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="mb-6">        
                                <label for="age_type" class="form-label">Yr/Mnth Old:</label>
                                    <select class="form-select" name="age_type[]" required>
                                        <option value="Year">Yr</option>
                                        <option value="Month">Mnth</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="gender" class="form-label">Gender:</label>
                                <select class="form-select" name="gender[]" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="color" class="form-label">Pet Color:</label>
                                <input type="text" class="form-control" name="color[]" required>
                            </div>
                        </div>
                    </div> 
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="status_pet" class="form-label">Status:</label>
                                <select class="form-select" name="status_pet[]" required>
                                    <option value="Active">Active</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="mb-6">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" name="image[]" accept="image/*">
                            </div>
                        </div>
                     <button type="button" class="remove-pet" onclick="removePet(this)">x</button>
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-success register-button" id="add_pet">Add Another Pet</button>
            <button type="submit" class="btn btn-primary register-button">Register</button>
            <button type="button" class="btn btn-danger cancel-button" onclick="cancelRegistration()">Cancel</button>
        </form>
    </div>
</div>
<script>
    // Function to dynamically populate breed options based on pet type
    document.addEventListener("change", function (event) {
        if (event.target && event.target.matches("select[name^='pet_type']")) {
            const petType = event.target.value;
            const petNumber = event.target.id.split("_")[2];
            const breedSelect = document.getElementById(`pet_breed_${petNumber}`);

            // Clear previous breed options
            breedSelect.innerHTML = "";

            // Create default option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select pet type first";
            breedSelect.appendChild(defaultOption);

            // Populate breed options based on pet type
            if (petType === "Dog") {
                const dogBreeds = ["Labrador Retriever", "German Shepherd", "Golden Retriever", "Bulldog", "Beagle"];
                dogBreeds.forEach(breed => {
                    const option = document.createElement("option");
                    option.value = breed;
                    option.textContent = breed;
                    breedSelect.appendChild(option);
                });
            } else if (petType === "Cat") {
                const catBreeds = ["Siamese", "Persian", "Maine Coon", "Ragdoll", "British Shorthair"];
                catBreeds.forEach(breed => {
                    const option = document.createElement("option");
                    option.value = breed;
                    option.textContent = breed;
                    breedSelect.appendChild(option);
                });
            }
        }
    });

    function removePet(button) {
        var petDiv = button.parentNode;
        petDiv.parentNode.removeChild(petDiv);
    }

    function cancelRegistration() {
        // Redirect to the homepage or any other desired action
        window.location.href = "Pet_management.php";
    }

    function validateForm() {
        var phoneInput = document.getElementById('contact_number');
        var phone = phoneInput.value.trim();
        if (!phone.startsWith('09') || phone.length !== 11 || isNaN(phone)) {
            alert('Please enter a valid 11-digit phone number starting with 09.');
            phoneInput.focus();
            return false;
        }
        var emailInput = document.getElementById('email');
        var email = emailInput.value.trim();
        if (!email.endsWith('@gmail.com')) {
            alert('Please enter a valid Gmail address.');
            emailInput.focus();
            return false;
        }
        return true;
    }
    document.getElementById('add_pet').addEventListener('click', function() {
            var petDiv = document.createElement('div');
            petDiv.classList.add('pet');

            petDiv.innerHTML = `
            <div class="row">
                        <div class="col-md-3">
                            <div class="mb-6">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name[]" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="pet_type_1" class="form-label">Pet Type:</label>
                                <select class="form-select" id="pet_type_1" name="pet_type[]" required>
                                    <option value="">Select</option>
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="mb-3">
                                <label for="pet_breed_1" class="form-label">Pet Breed:</label>
                                <select class="form-select" id="pet_breed_1" name="pet_breed[]" required>
                                    <!-- Breed options will be populated dynamically using JavaScript -->
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="mb-6">
                                <label for="desc_breed" class="form-label">Breed Description:</label>
                                <input type="text" class="form-control" name="desc_breed[]" placeholder="Mixed breed(aspin/poodle)" required>
                            </div>
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="petage" class="form-label">Age:</label>
                                <input type="number" class="form-control" id="petage" name="petage[]" required>
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="mb-6">        
                                <label for="age_type" class="form-label">Yr/Mnth Old:</label>
                                    <select class="form-select" name="age_type[]" required>
                                        <option value="Year">Yr</option>
                                        <option value="Month">Mnth</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="gender" class="form-label">Gender:</label>
                                <select class="form-select" name="gender[]" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="color" class="form-label">Pet Color:</label>
                                <input type="text" class="form-control" name="color[]" required>
                            </div>
                        </div>
                    </div> 
                        <div class="col-md-2">
                            <div class="mb-6">
                                <label for="status_pet" class="form-label">Status:</label>
                                <select class="form-select" name="status_pet[]" required>
                                    <option value="Active">Active</option>
                                    <option value="Female">Dead</option>
                                    <option value="Male">Missing</option>
                                    <option value="Female">Found</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="mb-6">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" name="image[]" accept="image/*">
                            </div>
                        </div>
                     <button type="button" class="remove-pet" onclick="removePet(this)">x</button>
            `;
            
            document.getElementById('pet_details').appendChild(petDiv);
        });
</script>

</body>
</html>
