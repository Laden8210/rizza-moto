<?php
include 'db.php'; // Assuming db.php contains your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your code here...
	$firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $middleName = $_POST['middle_name'];
    $ownerGender = $_POST['Ownergender'];
    $ownerAge = $_POST['Ownerage'];
    $dateOfBirth = $_POST['date_birth'];
    $email = $_POST['email'];
    $ownersHouse = $_POST['Ownershouse'];
    $ownersStreet = $_POST['Ownersstreet'];
    $ownersBrgy = $_POST['Ownersbrgy'];
    $contactNumber = $_POST['contact_number'];
    // Insert owner information into owners table
    $insertOwnerQuery = "INSERT INTO owners (first_name, last_name, middle_name, Ownergender, Ownerage, date_birth, email, Ownershouse, Ownersstreet, Ownersbrgy, contact_number) 
                        VALUES ('$firstName', '$lastName', '$middleName', '$ownerGender', $ownerAge, '$dateOfBirth', '$email', '$ownersHouse', '$ownersStreet', '$ownersBrgy', '$contactNumber')";

    if (mysqli_query($connection, $insertOwnerQuery)) {
        $ownerId = mysqli_insert_id($connection);

        // Extract pet information
        for ($i = 1; isset($_POST['petName'.$i]); $i++) {
            // Your code here...
			$petName = $_POST['petName'.$i];
            $petAge = $_POST['petAge'.$i];
            $ageType = $_POST['ageType'.$i];
            $petGender = $_POST['petGender'.$i];
            $breed = $_POST['breed'.$i];
            $descBreed = $_POST['descBreed'.$i];
            $color = $_POST['color'.$i];
            $type = $_POST['type'.$i];
            $statusPet = $_POST['statusPet'.$i];
			
			// Upload pet image
            $petImageName = $_FILES['petImage'.$i]['name'];
            $petImageTemp = $_FILES['petImage'.$i]['tmp_name'];
            move_uploaded_file($petImageTemp, 'pet_images/'.$petImageName);
			
            // Insert pet information into pets table
            $insertPetQuery = "INSERT INTO pets (owner_id, name, petage, age_type, gender, breed, desc_breed, color, type, status_pet, Image) 
                               VALUES ($ownerId, '$petName', $petAge, '$ageType', '$petGender', '$breed', '$descBreed', '$color', '$type', '$statusPet', '$petImageName')";
            mysqli_query($connection, $insertPetQuery);
        }

        echo "Registration successful!";
    } else {
        echo "Error: " . $insertOwnerQuery . "<br>" . mysqli_error($connection);
    }

    // Close database connection
    mysqli_close($connection);
}
?>