<?php

include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jsonData = file_get_contents('php://input');
    

    $data = json_decode($jsonData, true);


    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON provided.']);
        exit();
    }


    if (empty($data['USER_IDENTIFIER']) || empty($data['PASSWORD'])) {
        echo json_encode(['error' => 'Username/Email and Password are required.']);
        exit();
    }


    $userIdentifier = $data['USER_IDENTIFIER'];
    $password = $data['PASSWORD'];


    $stmt = $conn->prepare("SELECT * FROM pet_owner WHERE email = ? OR user_name = ?");
    
    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare the SQL statement.']);
        exit();
    }


    $stmt->bind_param('ss', $userIdentifier, $userIdentifier);


    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {

            unset($user['password']);
            echo json_encode($user);
        } else {
            echo json_encode(['error' => 'Invalid password.']);
        }
    } else {
        echo json_encode(['error' => 'No user found with the provided email/username.']);
    }


    $stmt->close();

} else {
    echo json_encode(['error' => 'Invalid request method.']);
}

$conn->close();
?>
