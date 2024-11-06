<?php
include 'config.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $location = $_POST['location'] ?? null;
    $report = $_POST['report'] ?? null;
    $date = $_POST['date'] ?? null;
    $time = $_POST['time'] ?? null;
    $userId = $_POST['user_id'] ?? null;
    $petId = $_POST['pet_id'] ?? null;

    if (empty($location) || empty($report) || empty($date) || empty($time) || empty($userId)) {
        echo json_encode(['message' => 'All fields are required.']);
        exit;
    }


    $uploadFilePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];

        $validExtensions = ['jpg', 'jpeg', 'png'];
        $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        
        if (!in_array($imageFileType, $validExtensions)) {
            echo json_encode(['message' => 'Invalid file type. Only JPG, JPEG, and PNG files are allowed.']);
            exit;
        }

        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }


        $filename = time() . '.' . $imageFileType;
        $uploadFilePath = $uploadDir . $filename;


        if (!move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
            echo json_encode(['message' => 'Failed to upload image.']);
            exit;
        }
    }

    $stmt = $conn->prepare("INSERT INTO missing_reports (user_id, location, report, date, time, missing_image_path, pet_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssi", $userId, $location, $report, $date, $time, $filename, $petId);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Report submitted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to save report data: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}

$conn->close();
?>
