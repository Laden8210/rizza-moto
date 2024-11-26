<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form submission to register owner and pets
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name'] ?? '');
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name'] ?? '');
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name'] ?? '');
    $gender = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
    $age = mysqli_real_escape_string($conn, $_POST['age'] ?? '');
    $birthdate = mysqli_real_escape_string($conn, date('Y-m-d', strtotime($_POST['birthdate'] ?? '')));
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $house_number = mysqli_real_escape_string($conn, $_POST['house_number'] ?? '');
    $street = mysqli_real_escape_string($conn, $_POST['street'] ?? '');
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy'] ?? '');
    $city = mysqli_real_escape_string($conn, $_POST['city'] ?? '');
    $province = mysqli_real_escape_string($conn, $_POST['province'] ?? '');
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code'] ?? '');
    $phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
    $tel_number = mysqli_real_escape_string($conn, $_POST['tel_number'] ?? null);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name'] ?? '');
    $password = $_POST['password'] ?? '';
    $image = $_FILES['image']['name'] ?? '';
    $is_activate = isset($_POST['is_activate']) ? 1 : 0;

    // Handle profile image upload
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $targetFilePath = $targetDir . basename($image);
    if ($image && !move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        die("Error uploading profile image.");
    }


    $insertOwnerQuery = "
        INSERT INTO pet_owner 
        (first_name, last_name, middle_name, gender, age, birthdate, email, house_number, street, brgy, city, province, zip_code, phone, tel_number, user_name, password, image, is_activate) 
        VALUES ('$first_name', '$last_name', '$middle_name', '$gender', '$age', '$birthdate', '$email', '$house_number', '$street', '$brgy', '$city', '$province', '$zip_code', '$phone', '$tel_number', '$user_name', '$password', '$image', '$is_activate')";

    mysqli_begin_transaction($conn);
    try {
        if (!mysqli_query($conn, $insertOwnerQuery)) {
            throw new Exception("Error: " . mysqli_error($conn));
        }

        // Get the last inserted owner's ID
        $ownerId = mysqli_insert_id($conn);

        // Pet details
        $types = $_POST['pet_type'] ?? [];
        $names = $_POST['pet_name'] ?? [];
        $ages = $_POST['pet_age'] ?? [];
        $genders = $_POST['pet_gender'] ?? [];
        $breeds = $_POST['breed'] ?? [];
        $descriptions = $_POST['pet_description'] ?? [];
        $colors = $_POST['color'] ?? [];
        $statuses = $_POST['status_pet'] ?? [];
        $pet_images = $_FILES['pet_image']['name'] ?? [];
        $pet_birthdates = $_POST['birthdate'] ?? [];
        $weights = $_POST['weight'] ?? [];
        $heights = $_POST['height'] ?? [];

        for ($i = 0; $i < count($types); $i++) {
            $type = mysqli_real_escape_string($conn, $types[$i]);
            $name = mysqli_real_escape_string($conn, $names[$i]);
            $age = mysqli_real_escape_string($conn, $ages[$i]);
            $gender = mysqli_real_escape_string($conn, $genders[$i]);
            $breed = mysqli_real_escape_string($conn, $breeds[$i]);
            $description = mysqli_real_escape_string($conn, $descriptions[$i]);
            $color = mysqli_real_escape_string($conn, $colors[$i ?? '']);
            $status = mysqli_real_escape_string($conn, $statuses[$i]);
            $pet_image = isset($pet_images[$i]) ? $pet_images[$i] : '';
            $pet_birthdate = mysqli_real_escape_string($conn, $pet_birthdates[$i] ?? null);
            $weight = mysqli_real_escape_string($conn, $weights[$i] ?? null);
            $height = mysqli_real_escape_string($conn, $heights[$i] ?? null);

            // Handle pet image upload
            $petTargetFilePath = $targetDir . basename($pet_image);
            if ($pet_image && !move_uploaded_file($_FILES['pet_image']['tmp_name'][$i], $petTargetFilePath)) {
                throw new Exception("Error uploading pet image for $name.");
            }

            $insertPetQuery = "
                INSERT INTO pets (pet_owner_id, pet_name, age, gender, breed, description, color, type, pet_status, image_path, birthdate, weight, height) 
                VALUES ('$ownerId', '$name', '$age', '$gender', '$breed', '$description', '$color', '$type', '$status', '$pet_image', '$pet_birthdate', '$weight', '$height')";

            if (!mysqli_query($conn, $insertPetQuery)) {
                throw new Exception("Error: " . mysqli_error($conn));
            }
        }

        mysqli_commit($conn);
        header("Location: Dog&Cat_Registration_success.php");
        exit();
    } catch (Exception $e) {
        mysqli_rollback($conn);
        die("Transaction failed: " . $e->getMessage());
    }
} else {
    header("Location: Pet_management.php");
    exit();
}
?>
