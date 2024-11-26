<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog & Cat Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #0F5298, #66D3FA);
            color: #fff;
            transition: all 0.3s ease-in-out;
            z-index: 999;
        }

        .sidebar.closed {
            width: 0;
            overflow: hidden;
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 0;
        }

        .sidebar ul {
            padding: 0;
            list-style: none;
        }

        .sidebar ul li {
            padding: 15px 20px;
            transition: background 0.3s;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar ul li:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar ul li a i {
            font-size: 1.2rem;
        }

        .sidebar .social_media {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .sidebar .social_media a {
            color: #fff;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .sidebar .social_media a:hover {
            color: #0F5298;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .toggle-btn {
            position: fixed;
            left: 10px;
            top: 10px;
            background: transparent;
            border: none;
            color: #0F5298;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1000;
        }

        .toggle-btn:hover {
            color: #66D3FA;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="brand">
            <img src="images/logo1.png" alt="Logo" width="120">
        </div>
        <ul>
            <li><a href="Pet_management.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="Dog&Cat_Registration.php"><i class="fas fa-paw"></i> Register Pet</a></li>
            <li><a href="loss_pets.php"><i class="fas fa-search"></i> Lost/Found</a></li>
            <li><a href="about_us.php"><i class="fas fa-info-circle"></i> About Us</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <div class="social_media">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <div class="main-content" id="mainContent">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        <h2>Register Owner and Pets</h2>
        <form action="Dog&Cat_Registration_process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <!-- Owner Details -->
            <h4>Owner Details</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="col-md-4">
                    <label for="middle_name" class="form-label">Middle Name:</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="gender" class="form-label">Gender:</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" min="1" required>
                </div>
                <div class="col-md-4">
                    <label for="birthdate" class="form-label">Birthdate:</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="user_name" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" required>
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-4">
                    <label for="phone" class="form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{11}" title="Enter a valid 11-digit number starting with 09" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="tel_number" class="form-label">Telephone Number (Optional):</label>
                    <input type="tel" class="form-control" id="tel_number" name="tel_number">
                </div>
                <div class="col-md-4">
                    <label for="house_number" class="form-label">House Number:</label>
                    <input type="text" class="form-control" id="house_number" name="house_number" required>
                </div>
                <div class="col-md-4">
                    <label for="street" class="form-label">Street:</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="brgy" class="form-label">Barangay:</label>
                    <input type="text" class="form-control" id="brgy" name="brgy" required>
                </div>
                <div class="col-md-4">
                    <label for="city" class="form-label">City:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="col-md-4">
                    <label for="province" class="form-label">Province:</label>
                    <input type="text" class="form-control" id="province" name="province" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="zip_code" class="form-label">Zip Code:</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                </div>
                <div class="col-md-4">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-4">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
            </div>

            <!-- Dynamic Pet Details -->
            <h4 class="mt-4">Pet Details</h4>
            <div id="pet_details">
                <div class="row">
                    <div class="col-md-3">
                        <label for="pet_name" class="form-label">Pet Name:</label>
                        <input type="text" class="form-control" name="pet_name[]" required>
                    </div>
                    <div class="col-md-3">
                        <label for="pet_type" class="form-label">Pet Type:</label>
                        <select class="form-select" name="pet_type[]" required>
                            <option value="">Select</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="breed" class="form-label">Breed:</label>
                        <input type="text" class="form-control" name="breed[]" required>
                    </div>
                    <div class="col-md-3">
                        <label for="color" class="form-label">Color:</label>
                        <input type="text" class="form-control" name="color[]" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="pet_age" class="form-label">Age:</label>
                        <input type="number" class="form-control" name="pet_age[]" min="0" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_gender" class="form-label">Gender:</label>
                        <select class="form-select" name="pet_gender[]" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_image" class="form-label">Pet Image:</label>
                        <input type="file" class="form-control" name="pet_image[]" accept="image/*">
                    </div>
                </div>

                <div class="row mt-3">
                  
                    <div class="col-md-4">
                        <label for="pet_birthdate" class="form-label">Pet BirthDate:</label>
                        <input type="date" class="form-control" name="pet_birthdate[]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_weight" class="form-label">Pet Weight (kg):</label>
                        <input type="number" class="form-control" name="weight[]" step="0.01" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_height" class="form-label">Pet Height (cm):</label>
                        <input type="number" class="form-control" name="height[]" step="0.01" required>
                    </div>
                    <div class="col-md-4">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description[]" rows="3"></textarea>
                    </div>
                </div>

            </div>
            <button type="button" id="add_pet" class="btn btn-success mt-3">Add Another Pet</button>
            <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("closed");
        }

        document.getElementById('add_pet').addEventListener('click', function() {
            const container = document.getElementById('pet_details');
            const newPet = `
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="pet_name" class="form-label">Pet Name:</label>
                        <input type="text" class="form-control" name="pet_name[]" required>
                    </div>
                    <div class="col-md-3">
                        <label for="pet_type" class="form-label">Pet Type:</label>
                        <select class="form-select" name="pet_type[]" required>
                            <option value="">Select</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="breed" class="form-label">Breed:</label>
                        <input type="text" class="form-control" name="breed[]" required>
                    </div>
                    <div class="col-md-3">
                        <label for="color" class="form-label">Color:</label>
                        <input type="text" class="form-control" name="color[]" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="pet_age" class="form-label">Age:</label>
                        <input type="number" class="form-control" name="pet_age[]" min="0" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_gender" class="form-label">Gender:</label>
                        <select class="form-select" name="pet_gender[]" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_image" class="form-label">Pet Image:</label>
                        <input type="file" class="form-control" name="pet_image[]" accept="image/*">
                    </div>
                </div>
                
                               <div class="row mt-3">
                      
                    <div class="col-md-4">
                        <label for="pet_birthdate" class="form-label">Pet BirthDate:</label>
                        <input type="date" class="form-control" name="pet_birthdate[]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_weight" class="form-label">Pet Weight (kg):</label>
                        <input type="number" class="form-control" name="weight[]" step="0.01" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pet_height" class="form-label">Pet Height (cm):</label>
                        <input type="number" class="form-control" name="height[]" step="0.01" required>
                    </div>
                      <div class="col-md-4">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description[]" rows="3"></textarea>
                    </div>
                </div>
                `;
            container.insertAdjacentHTML('beforeend', newPet);
        });

        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>