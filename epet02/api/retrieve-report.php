<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepare a SQL statement to retrieve missing reports with pet names
    $stmt = $conn->prepare("
        SELECT 
            *
        FROM 
            missing_reports mr
        JOIN 
            pets p ON mr.pet_id = p.id
        ORDER BY 
            mr.created_at DESC
    ");
    
    if ($stmt->execute()) {
        // Get the result set
        $result = $stmt->get_result();
        
        // Initialize an array to hold the reports
        $missingReports = [];

        // Fetch all reports
        while ($row = $result->fetch_assoc()) {
            $missingReports[] = $row;
        }

        // Output the missing reports in JSON format
        echo json_encode($missingReports);
    } else {
        echo json_encode(['message' => 'Failed to retrieve reports: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}

$conn->close();
?>
