<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate required fields for pet info
    $petName = $_POST['pet_name'] ?? null;
    $age = $_POST['pet_age'] ?? null;
    $type = $_POST['pet_type'] ?? null;
    $breed = $_POST['pet_breed'] ?? null;
    $color = $_POST['pet_color'] ?? null;
    $description = $_POST['pet_description'] ?? null;
    $birthdate = $_POST['pet_birthdate'] ?? null;
    $weight = $_POST['pet_weight'] ?? null;
    $height = $_POST['pet_height'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $userId = $_POST['user_id'] ?? null;

    // Check if all required fields are present
    if (empty($petName) || empty($age) || empty($type) || empty($breed) || empty($color) || empty($description) || empty($birthdate) || empty($weight) || empty($height) || empty($gender) || empty($userId)) {
        echo json_encode(['message' => 'All fields are required.']);
        exit;
    }

    // Check if image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];

        // Validate the image file type
        $validExtensions = ['jpg', 'jpeg', 'png'];
        $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        
        if (!in_array($imageFileType, $validExtensions)) {
            echo json_encode(['message' => 'Invalid file type. Only JPG, JPEG, and PNG files are allowed.']);
            exit;
        }

        // Set the upload directory and create it if it doesn't exist
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate a unique filename for the image
        $filename = time() . '.' . $imageFileType;
        $uploadFilePath = $uploadDir . $filename;

        // Move the uploaded file
        if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
            // Prepare and execute the database insert
            $stmt = $conn->prepare("INSERT INTO pets (pet_name, age, type, breed, color, description, birthdate, weight, height, gender, image_path, pet_owner_id, pet_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sisssssssssi", $petName, $age, $type, $breed, $color, $description, $birthdate, $weight, $height, $gender, $uploadFilePath, $userId, "Active");

            if ($stmt->execute()) {
                echo json_encode(['message' => 'Pet uploaded successfully']);
            } else {
                echo json_encode(['message' => 'Failed to save pet data: ' . $stmt->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(['message' => 'Failed to upload image.']);
        }
    } else {
        echo json_encode(['message' => 'No image uploaded or there was an upload error.']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}

$conn->close();
?>
