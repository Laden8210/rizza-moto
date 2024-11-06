<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $jsonData = file_get_contents('php://input');
    

    $data = json_decode($jsonData, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON provided.']);
        exit();
    }

    if (empty($data['USER_ID'])) {
        echo json_encode(['error' => 'User ID is required.']);
        exit();
    }


    $user_id = $data['USER_ID'];
    

    $stmt = $conn->prepare("SELECT * FROM pets WHERE pet_owner_id = ?");

    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare the SQL statement.']);
        exit();
    }

    $stmt->bind_param('i', $user_id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pets = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($pets);
    } else {
        echo json_encode(['error' => 'No pets found for the provided user.']);
    }


}