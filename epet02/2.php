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
            height: 900px;
            border: 2px solid #111;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 20px; /* Add padding to give space between content and border */
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            text-align: center;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="container">
        <h2>Owner and Pet Registration Form</h2>
        <form action="submit_registration.php" method="POST" enctype="multipart/form-data">
            <!-- Owner Details -->
            <h3>Owner Information</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="owner_name" class="form-label">Owner Name:</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="owner_email" class="form-label">Owner Email:</label>
                        <input type="email" class="form-control" id="owner_email" name="owner_email" required>
                    </div>
                </div>
            </div>
            <!-- Pet Details -->
            <h3>Pet Information</h3>
            <div id="pet_details">
                <!-- Pet 1 -->
                <div class="pet mb-3">
                    <h4>Pet 1</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pet_name_1" class="form-label">Pet Name:</label>
                                <input type="text" class="form-control" id="pet_name_1" name="pet_name[]" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pet_type_1" class="form-label">Pet Type:</label>
                                <select class="form-select" id="pet_type_1" name="pet_type[]" required>
                                    <option value="">Select</option>
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pet_breed_1" class="form-label">Pet Breed:</label>
                                <select class="form-select" id="pet_breed_1" name="pet_breed[]" required>
                                    <!-- Breed options will be populated dynamically using JavaScript -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pet_image_1" class="form-label">Pet Image:</label>
                                <input type="file" class="form-control" id="pet_image_1" name="pet_image[]" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pet Button -->
            <button type="button" class="btn btn-primary" id="add_pet_btn">Add Another Pet</button>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>
</div>

<script>
    // Function to dynamically add pet input fields
    document.getElementById("add_pet_btn").addEventListener("click", function () {
        const petCount = document.querySelectorAll(".pet").length + 1;
        const petDetails = document.getElementById("pet_details");

        // Create pet container
        const petDiv = document.createElement("div");
        petDiv.classList.add("pet", "mb-3");

        // Pet heading
        const petHeading = document.createElement("h4");
        petHeading.textContent = "Pet " + petCount;

        // Pet Name input
        const petNameInput = document.createElement("div");
        petNameInput.classList.add("col-md-6", "mb-3");
        petNameInput.innerHTML = `
            <label for="pet_name_${petCount}" class="form-label">Pet Name:</label>
            <input type="text" class="form-control" id="pet_name_${petCount}" name="pet_name[]" required>
        `;

        // Pet Type select
        const petTypeSelect = document.createElement("div");
        petTypeSelect.classList.add("col-md-6", "mb-3");
        petTypeSelect.innerHTML = `
            <label for="pet_type_${petCount}" class="form-label">Pet Type:</label>
            <select class="form-select" id="pet_type_${petCount}" name="pet_type[]" required>
                <option value="">Select</option>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
            </select>
        `;

        // Pet Breed select
        const petBreedSelect = document.createElement("div");
        petBreedSelect.classList.add("col-md-6", "mb-3");
        petBreedSelect.innerHTML = `
            <label for="pet_breed_${petCount}" class="form-label">Pet Breed:</label>
            <select class="form-select" id="pet_breed_${petCount}" name="pet_breed[]" required>
                <!-- Breed options will be populated dynamically using JavaScript -->
            </select>
        `;

        // Pet Image input
        const petImageInput = document.createElement("div");
        petImageInput.classList.add("col-md-6", "mb-3");
        petImageInput.innerHTML = `
            <label for="pet_image_${petCount}" class="form-label">Pet Image:</label>
            <input type="file" class="form-control" id="pet_image_${petCount}" name="pet_image[]" accept="image/*" required>
        `;

        // Append elements to pet container
        petDiv.appendChild(petHeading);
        petDiv.appendChild(petNameInput);
        petDiv.appendChild(petTypeSelect);
        petDiv.appendChild(petBreedSelect);
        petDiv.appendChild(petImageInput);

        // Append pet container to pet details section
        petDetails.appendChild(petDiv);
    });

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
</script>
</body>
</html>
