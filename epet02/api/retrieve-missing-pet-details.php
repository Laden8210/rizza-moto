<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $petId = $data['pet_id'] ?? null;

    if (empty($petId)) {
        echo json_encode(['message' => 'Pet ID is required.']);
        exit;
    }

    $stmt = $conn->prepare("
        SELECT 
            *
        FROM 
            missing_reports mr
        JOIN 
            pets p ON mr.pet_id = p.id
        WHERE 
            mr.pet_id = ? AND mr.missing_status = 0
        ORDER BY 
            mr.created_at DESC
        LIMIT 1
    ");
    
    $stmt->bind_param("i", $petId);

    if ($stmt->execute()) {
        // Get the result set
        $result = $stmt->get_result();
        
        // Fetch the latest report
        $latestReport = $result->fetch_assoc();

        // Output the latest report in JSON format
        if ($latestReport) {
            echo json_encode($latestReport);
        } else {
            echo json_encode(['error' => 'No reports found.']);
        }
    } else {
        echo json_encode(['error' => 'Failed to retrieve report: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}

$conn->close();
