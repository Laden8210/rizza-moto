<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner and Pet Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }

        .report-container {
            max-width: 1200px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .report-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .report-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .owner-section {
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }

        .owner-section h2 {
            font-size: 20px;
            color: #0F5298;
            margin-bottom: 10px;
        }

        .owner-details,
        .pet-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .owner-details th,
        .pet-details th {
            background-color: #0F5298;
            color: #fff;
            text-align: left;
            padding: 8px;
        }

        .owner-details td,
        .pet-details td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .pet-details {
            margin-top: 20px;
        }

        .print-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #0F5298;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .print-button:hover {
            background-color: #66D3FA;
        }
    </style>
</head>
<body>
    <?php
    // Include database connection
    include 'db.php';

    // Check if owner IDs are provided in the query string
    if (isset($_GET['ids']) && !empty($_GET['ids'])) {
        // Sanitize and retrieve owner IDs
        $ownerIds = explode(',', $_GET['ids']);
        $ownerIds = array_map('intval', $ownerIds); // Convert IDs to integers to prevent SQL injection

        // Fetch owner details based on the provided IDs
        $query = "SELECT * FROM pet_owner WHERE pet_owner_id IN (" . implode(',', $ownerIds) . ")";
        $result = mysqli_query($conn, $query);

        // Store owner details in an array
        $owners = array();
        while ($row = mysqli_fetch_assoc($result)) {
            // Fetch pet details for each owner
            $query = "SELECT * FROM pets WHERE pet_owner_id = " . $row['pet_owner_id'];
            $petResult = mysqli_query($conn, $query);
            $pets = array();
            while ($petRow = mysqli_fetch_assoc($petResult)) {
                $pets[] = $petRow;
            }
            $row['pets'] = $pets;
            $owners[] = $row;
        }

        ?>
        <div class="report-container" id="print-content">
            <div class="report-header">
                <h1>Owner and Pet Report</h1>
            </div>
            <?php
            // Display owner and pet details
            foreach ($owners as $owner) {
                ?>
                <div class="owner-section">
                    <h2>Owner: <?= $owner['first_name'] . ' ' . $owner['last_name'] ?></h2>
                    <table class="owner-details">
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><?= $owner['pet_owner_id'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $owner['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?= $owner['gender'] ?></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><?= $owner['age'] ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?= $owner['phone'] ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <?= $owner['house_number'] . ', ' . $owner['street'] . ', ' . $owner['brgy'] . ', ' . $owner['city'] . ', ' . $owner['province'] . ' ' . $owner['zip_code'] ?>
                            </td>
                        </tr>
                    </table>

                    <h3>Pets</h3>
                    <table class="pet-details">
                        <tr>
                            <th>Pet Name</th>
                            <th>Type</th>
                            <th>Breed</th>
                            <th>Color</th>
                            <th>Age</th>
                            <th>Weight (kg)</th>
                            <th>Height (cm)</th>
                            <th>Status</th>
                            <th>Description</th>
                        </tr>
                        <?php
                        foreach ($owner['pets'] as $pet) {
                            ?>
                            <tr>
                                <td><?= $pet['pet_name'] ?></td>
                                <td><?= $pet['type'] ?></td>
                                <td><?= $pet['breed'] ?></td>
                                <td><?= $pet['color'] ?></td>
                                <td><?= $pet['age'] ?></td>
                                <td><?= $pet['weight'] ?></td>
                                <td><?= $pet['height'] ?></td>
                                <td><?= $pet['pet_status'] ?></td>
                                <td><?= $pet['description'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
        <button class="print-button" onclick="printContent()">Print Report</button>
        <script>
            function printContent() {
                var printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Print</title></head><body>');
                printWindow.document.write(document.getElementById('print-content').innerHTML);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            }
        </script>
        <?php
    } else {
        echo "<p>No owner IDs provided.</p>";
    }
    ?>
</body>
</html>
