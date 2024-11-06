<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Owners Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .owner {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .owner h3 {
            margin-bottom: 10px;
        }

        .pet {
            margin-left: 20px;
            border-left: 2px solid #ccc;
            padding-left: 10px;
        }

        .pet p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <?php
    // Include database connection
    include 'db.php';

    // Check if owner IDs are provided in the query string
    if(isset($_GET['ids']) && !empty($_GET['ids'])) {
        // Sanitize and retrieve owner IDs
        $ownerIds = explode(',', $_GET['ids']);
        $ownerIds = array_map('intval', $ownerIds); // Convert IDs to integers to prevent SQL injection

        // Fetch owner details based on the provided IDs
        $query = "SELECT * FROM owners WHERE owner_id IN (" . implode(',', $ownerIds) . ")";
        $result = mysqli_query($conn, $query);

        // Store owner details in an array
        $owners = array();
        while ($row = mysqli_fetch_assoc($result)) {
            // Fetch pet details for each owner
            $query = "SELECT * FROM pets WHERE owner_id = " . $row['owner_id'];
            $petResult = mysqli_query($conn, $query);
            $pets = array();
            while ($petRow = mysqli_fetch_assoc($petResult)) {
                $pets[] = $petRow;
            }
            $row['pets'] = $pets;
            $owners[] = $row;
        }

        // Convert owner details to JSON format
        $jsonOwners = json_encode($owners);
        ?>
        <div id="print-content">
            <?php
            // Display owner and pet details
            foreach ($owners as $owner) {
                ?>
                <div class='owner'>
                    <h3>Owner ID: <?= $owner['owner_id'] ?></h3>
                    <p>First Name: <?= $owner['first_name'] ?></p>
                    <p>Last Name: <?= $owner['last_name'] ?></p>
                    <p>Address: <?= $owner['address'] ?></p>
                    <p>Contact Number: <?= $owner['contact_number'] ?></p>
                    <p>Pets:</p>
                    <?php
                    foreach ($owner['pets'] as $pet) {
                        ?>
                        <div class='pet'>
                            <p>Pet Type: <?= $pet['type'] ?></p>
                            <p>Name: <?= $pet['name'] ?></p>
                            <p>Age: <?= $pet['age'] ?></p>
                            <p>Breed: <?= $pet['breed'] ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <button onclick="printContent()">Print</button>
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
        // No owner IDs provided, display an error message or redirect
        echo "<p>No owner IDs provided.</p>";
    }
    ?>
</body>
</html>
