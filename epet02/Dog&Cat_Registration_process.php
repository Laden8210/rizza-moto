<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form submission to register owner and pets

    // Owner details
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $middle_name = $_POST['middle_name'] ?? '';
    $Ownergender = $_POST['Ownergender'] ?? '';
    $Ownerage = $_POST['Ownerage'] ?? '';
    $date_birth = date('Y-m-d', strtotime($_POST['date_birth'] ?? ''));
    $email = $_POST['email'] ?? '';
    $Ownershouse = $_POST['Ownershouse'] ?? '';
    $Ownersstreet = $_POST['Ownersstreet'] ?? '';
    $Ownersbrgy = $_POST['Ownersbrgy'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';

    // Validate required fields for owner
    if (empty($first_name) || empty($last_name) || empty($Ownergender) || empty($Ownerage) || empty($date_birth) || empty($email) || empty($Ownershouse) || empty($Ownersstreet) || empty($Ownersbrgy) || empty($contact_number)) {
        header("Location: Dog&Cat_Registration.php?error=missing_fields");
        exit();
    }

    // Insert owner details into the owners table
    $insertOwnerQuery = "INSERT INTO owners (first_name, last_name, middle_name, Ownergender, Ownerage, date_birth, email, Ownershouse, Ownersstreet, Ownersbrgy, contact_number)
    VALUES ('$first_name', '$last_name', '$middle_name', '$Ownergender', '$Ownerage', '$date_birth', '$email', '$Ownershouse', '$Ownersstreet', '$Ownersbrgy', '$contact_number')";

    if (!mysqli_query($conn, $insertOwnerQuery)) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Get the ID of the last inserted owner
    $ownerId = mysqli_insert_id($conn);

    // Pet details
    $types = $_POST['type'] ?? [];
    $names = $_POST['name'] ?? [];
    $petages = $_POST['petage'] ?? [];
    $age_types = $_POST['age_type'] ?? [];
    $genders = $_POST['gender'] ?? [];
    $breeds = $_POST['breed'] ?? [];
    $desc_breeds = $_POST['desc_breed'] ?? [];
    $colors = $_POST['color'] ?? [];
    $statuss = $_POST['status_pet'] ?? [];

    // Check if pet arrays are not empty before proceeding
    if (!empty($types) && !empty($names) && !empty($petages) && !empty($age_types) && !empty($genders) && !empty($breeds) && !empty($desc_breeds) && !empty($colors) && !empty($statuss)) {
        // Insert pet details into the pets table
        for ($i = 0; $i < count($types); $i++) {
            $type = mysqli_real_escape_string($conn, $types[$i]);
            $name = mysqli_real_escape_string($conn, $names[$i]);
            $petage = mysqli_real_escape_string($conn, $petages[$i]);
            $age_type = mysqli_real_escape_string($conn, $age_types[$i]);
            $gender = mysqli_real_escape_string($conn, $genders[$i]);
            $breed = mysqli_real_escape_string($conn, $breeds[$i]);
            $desc_breed = mysqli_real_escape_string($conn, $desc_breeds[$i]);
            $color = mysqli_real_escape_string($conn, $colors[$i]);
            $status = mysqli_real_escape_string($conn, $statuss[$i]);

            // Insert pet details into the pets table
            $insertPetQuery = "INSERT INTO pets (owner_id, name, petage, age_type, gender, breed, desc_breed, color, type, status_pet) 
                               VALUES ('$ownerId', '$name', '$petage', '$age_type', '$gender', '$breed', '$desc_breed', '$color', '$type', '$status')";

            if (!mysqli_query($conn, $insertPetQuery)) {
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        }
    }

    // Redirect to registration success page
    header("Location: Dog&Cat_Registration_success.php");
    exit();
} else {
    // Redirect to registration page if accessed directly without form submission
    header("Location: Pet_management.php");
    exit();
}
?>