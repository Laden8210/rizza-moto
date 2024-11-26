<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jsonData = file_get_contents('php://input');

    $data = json_decode($jsonData, true);


    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON provided.']);
        exit();
    }


    $requiredFields = [
        'age', 'birthdate', 'brgy', 'city', 'email', 'first_name', 
        'gender', 'house_number', 'last_name', 'middle_name', 
        'password', 'phone', 'province', 'street', 'tel_number', 
        'user_name', 'zip_code', 'image'
    ];

    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            echo json_encode(['error' => "The field '$field' is required."]);
            exit();
        }
    }

    $stmt = $conn->prepare("INSERT INTO pet_owner (age, birthdate, brgy, city, email, first_name, gender, 
                    house_number, last_name, middle_name, password, phone, province, 
                    street, tel_number, user_name, zip_code, image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare the SQL statement.']);
        exit();
    }

    $email = $data['email'];
    $checkEmailQuery = "SELECT email FROM pet_owner WHERE email = ?";
    $stmtCheck = $conn->prepare($checkEmailQuery);
    
    if ($stmtCheck) {
        $stmtCheck->bind_param('s', $email);
        $stmtCheck->execute();
        $stmtCheck->store_result();

        if ($stmtCheck->num_rows > 0) {
            echo json_encode(['error' => 'Email already exists.']);
            $stmtCheck->close();
            exit();
        }

        $stmtCheck->close();
    }
    
    $stmt->bind_param('isssssssssssssssss',
        $data['age'],
        $data['birthdate'],
        $data['brgy'],
        $data['city'],
        $data['email'],
        $data['first_name'],
        $data['gender'],
        $data['house_number'],
        $data['last_name'],
        $data['middle_name'],
        $data['password'],
        $data['phone'],
        $data['province'],
        $data['street'],
        $data['tel_number'],
        $data['user_name'],
        $data['zip_code'],
        $data['image']
    );


    if ($stmt->execute()) {
        echo json_encode(['success' => 'User registered successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to register user: ' . $stmt->error]);
    }

    $stmt->close();

} else {
    echo json_encode(['error' => 'Invalid request method.']);
}


$conn->close();
?>
