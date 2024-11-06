<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Decode JSON input
    $data = json_decode(file_get_contents("php://input"), true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON format.']);
        exit;
    }

    $description = $data['DESCRIPTION'] ?? null;
    $missingId = $data['MISSING_PET_ID'] ?? null;

    // Check if required fields are provided
    if (empty($description) || empty($missingId)) {
        echo json_encode(['error' => 'All fields are required.']);
        exit;
    }

    // Prepare the SQL statement
    if ($stmt = $conn->prepare("UPDATE missing_reports SET found_report = ?, missing_status = ? WHERE id = ?")) {
        $missingStatus = 1; // Assuming 1 indicates the pet has been found
        $stmt->bind_param("sii", $description, $missingStatus, $missingId);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Missing pet status updated successfully.']);
        } else {
            echo json_encode(['error' => 'Failed to update missing pet status: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Failed to prepare the SQL statement.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}

$conn->close();
?>
