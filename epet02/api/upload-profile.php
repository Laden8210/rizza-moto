<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $uploadDir = '../uploads/user-profiles/';

        $timestamp = time();
        $imageName = md5($timestamp . basename($_FILES['image']['name'])) . '.jpg'; 

        $uploadFile = $uploadDir . $imageName;


        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {

            echo json_encode(['success' => 'Image uploaded successfully.', 'image' => $imageName]);
        } else {

            echo json_encode(['error' => 'Failed to upload image.']);
        }
    } else {

        echo json_encode(['error' => 'No image uploaded.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}

?>
