<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $jsonData = file_get_contents('php://input');
    
    // Decode the JSON data
    $data = json_decode($jsonData, true);

    // Check for errors in JSON decoding
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON provided.']);
        exit();
    }

    // Validate required fields
    $requiredFields = [
        'AGE', 'BIRTHDATE', 'BRGY', 'CITY', 'EMAIL', 'FIRST_NAME', 
        'GENDER', 'HOUSE_NUMBER', 'LAST_NAME', 'MIDDLE_NAME', 
        'PASSWORD', 'PHONE', 'PROVINCE', 'STREET', 'TEL_NUMBER', 
        'USER_NAME', 'ZIP_CODE', 'IMAGE'
    ];

    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            echo json_encode(['error' => "The field '$field' is required."]);
            exit();
        }
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO pet_owner (age, birthdate, brgy, city, email, first_name, gender, 
                    house_number, last_name, middle_name, password, phone, province, 
                    street, tel_number, user_name, zip_code, image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if preparation was successful
    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare the SQL statement.']);
        exit();
    }


    $email = $data['EMAIL'];
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
        $data['AGE'],
        $data['BIRTHDATE'],
        $data['BRGY'],
        $data['CITY'],
        $data['EMAIL'],
        $data['FIRST_NAME'],
        $data['GENDER'],
        $data['HOUSE_NUMBER'],
        $data['LAST_NAME'],
        $data['MIDDLE_NAME'],
        $data['PASSWORD'],
        $data['PHONE'],
        $data['PROVINCE'],
        $data['STREET'],
        $data['TEL_NUMBER'],
        $data['USER_NAME'],
        $data['ZIP_CODE'],
        $data['IMAGE']
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['success' => 'User registered successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to register user: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();

} else {
    echo json_encode(['error' => 'Invalid request method.']);
}

// Close the database connection
$conn->close();
?>
