<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
.content {
    position: fixed;
    margin-top: 60px;
    margin-left: 260px;
    margin-bottom: 50px;
    width: 1150px;
    height: 650px;
    border: 2px solid #111;
    border-radius:10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 20px;
}

.container {
    max-width: 800px; /* Set maximum width */
     /* Center the container horizontally */
}

h2 {
    margin-bottom: 20px; /* Add space below the heading */
}

/* Style for the buttons */
#print-btn {
            float: right;
            margin-bottom: 10px;
        }
        #add-btn {
            float: right;
            margin-bottom: 10px;
            margin-right: 2px;
        }

#searchInput {
  width: 200px;
  padding: 0.5rem;
  margin-bottom: 1rem;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style for the table */
.table {
    width: 100%; /* Set table width to 100% */
    border-collapse: collapse; /* Collapse table borders */
}

/* Style for table headers */
th, td {
    border: 1px solid #ddd; /* Border properties for table cells */
    padding: 8px; /* Padding for table cells */
    text-align: left; /* Align text to the left */
}

/* Style for table actions column */
td:last-child {
    text-align: center; /* Align text to the center */
}

/* Style for checkboxes */
input[type="checkbox"] {
    margin: 0;
}
        /*
        #print-btn {
            float: right;
            margin-bottom: 10px;
        }
        #add-btn {
            float: right;
            margin-bottom: 10px;
            margin-right: 2px;
        }*/
    </style>
</head>
<body>
<?php include 'includes/sidebar1.php'; ?>    
<?php include 'includes/header.php'; ?>

<div class="content">
<div class="container mt-5">
    <h2>Lost and Found</h2>
    <!-- Button to Print Owner Details -->
    <button id="print-btn" class="btn btn-success" onclick="printSelectedOwners()">Print</button>
    <button id="add-btn" class="btn btn-primary" onclick="location.href = 'report_lost_pet.php';">Add</button>
    <!-- Search Bar -->
    <input type="text" id="searchInput" onkeyup="searchOwners()" placeholder="Search for owners..">

    <!-- Display Owner and Pet Details -->
    <table class="table" id="vacTable">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>PetName</th>
                <th>Pet Type</th>
                <th>Breed</th>
                <th>Color</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Yr/Mnth</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display owner and pet details -->
            <?php
            // Include database connection
            include 'db.php';
            
            // Fetch owner and pet details from the database
            $query = "SELECT * FROM vac_reservations";
            $result = mysqli_query($conn, $query);

            // Display owner and pet details
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='selectedOwners[]' value='{$row['id']}'></td>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['pet_name']}</td>";
                echo "<td>{$row['pet_type']}</td>";
                echo "<td>{$row['breed']}</td>";
                echo "<td>{$row['color']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['age']}</td>";
                echo "<td>{$row['yr_mnth']}</td>";
                echo "<td>{$row['status_pet']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>
                        <a href='edit_lost_pet.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='delete_lost_pet.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<script>
    // Function to search for owners
    function searchOwners() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("vacTable");
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
            var vaccineID = [];
            selectedOwners.forEach(function(owner) {
                vaccineID.push(owner.value);
            });
            // Pass the selected owner IDs to the printOwners.php page for printing
            window.location.href = "vac_print.php?ids=" + vaccineID.join(',');
        }
    }
</script>

</body>
</html>
