<?php
include 'db.php';

$sql = "SELECT * FROM found_pets";
$result = $conn->query($sql);

include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/sidebar.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Pets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #report-btn {
            float: right;
            margin-bottom: 10px;
            margin-right: 2px;
        }
    #add-btn {
            float: right;
            margin-bottom: 10px;
            margin-right: 2px;
        }
</style>  
</head>
<body>

<div class="container mt-5">
    <h2><br><br>Found Pets </h2>

    <!-- Search Bar -->
    <input type="text" id="searchInput" onkeyup="searchOwners()" placeholder="Search for owners..">
    <button id="report-btn" class="btn btn-primary" onclick="location.href = 'report_pound_pet.php';">Report Found Pets</button>
    <button id="add-btn" class="btn btn-danger" onclick="location.href = 'loss_pets.php';">Lost Pets</button>
    <!-- Display Owner and Pet Details -->
    <table class="table" id="foundpetTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pet Name</th>
                <th>Reported At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display owner and pet details -->
            <?php
            include 'db.php';

            $sql = "SELECT * FROM found_pets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["pet_name"] . "</td>";
                    echo "<td>" . $row["reported_at"] . "</td>";
                    echo "<td>
                        <a href='edit_pound_pet.php?id={$row['id']}' class='btn btn-primary btn-sm'>See More</a>
                        <a href='delete_pound_pet.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                      </td>";
                echo "</tr>";
                    
                }
            } else {
                echo "<tr><td colspan='3'>No lost pets found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    // Function to search for owners
    function searchOwners() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("foundpetTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 2; j < td.length - 1; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    // Function to print selected owner details
    function printSelectedOwners() {
        var selectedOwners = document.querySelectorAll('input[name="selectedOwners[]"]:checked');
        if (selectedOwners.length === 0) {
            alert("Please select at least one owner to print.");
        } else {
            var ownerIds = [];
            selectedOwners.forEach(function(owner) {
                ownerIds.push(owner.value);
            });
            // Pass the selected owner IDs to the printOwners.php page for printing
            window.location.href = "printOwners.php?ids=" + ownerIds.join(',');
        }
    }
</script>

</body>
</html>
