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

  position: static;
  margin-left: 260px;
  transition: margin-left 0.5s;
  margin-top: 60px;
  max-width: 1150px;
  max-height: 1900px;
  border: 2px solid #111;
  border-radius:10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  padding: 20px; /* Add padding to give space between content and border */
  
}

.container {
  margin-top: 2rem; 
}

h2 {
  margin-bottom: 20px;
  margin-top: 20px;
}

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

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 0.75rem;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.table th:first-child,
.table td:first-child {
  padding-left: 0;
}

.table th:last-child,
.table td:last-child {
  padding-right: 0;
}

.table tbody tr:hover {
  background-color: #f5f5f5;
}

.btn {
  display: inline-block;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-success {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}

.btn-primary {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  color: #fff;
  background-color: #0069d9;
  border-color: #0062cc;
}

.btn-danger {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.btn-sm {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
  line-height: 1.5;
}

.btn:hover {
  text-decoration: none;
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
        }
*/
    </style>
</head>
<body>
<?php include 'includes/sidebar1.php'; ?> 
<?php include 'includes/header.php'; ?>


<div class="content">
<div class="container mt-5">
    <h2>Pet Management</h2>
    <!-- Button to Print Owner Details -->
    <button id="print-btn" class="btn btn-success" onclick="printSelectedOwners()">Print</button>
    <button id="add-btn" class="btn btn-primary" onclick="location.href = 'Dog&Cat_Registration.php';">Add</button>
    <!-- Search Bar -->
    <input type="text" id="searchInput" onkeyup="searchOwners()" placeholder="Search for owners..">

    <!-- Display Owner and Pet Details -->
    <table class="table" id="ownersTable">
        <thead>
            <tr>
                <th></th>
                <th>Owner ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Contact Number</th>
                <th>Pet Name</th>
                <th>Pet Type</th>
                <th>Pet Age</th>
                <th>Breed</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display owner and pet details -->
            <?php
            // Include database connection
            include 'db.php';
            
            // Fetch owner and pet details from the database
            $query = "SELECT * FROM owners INNER JOIN pets ON owners.owner_id = pets.owner_id";

            $result = mysqli_query($conn, $query);

            // Display owner and pet details
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='selectedOwners[]' value='{$row['owner_id']}'></td>";
                echo "<td>{$row['owner_id']}</td>";
                echo "<td>{$row['first_name']}</td>";
                echo "<td>{$row['last_name']}</td>";
                echo "<td>{$row['middle_name']}</td>";
                echo "<td>{$row['contact_number']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['type']}</td>";
                echo "<td>{$row['petage']}</td>";
                echo "<td>{$row['breed']}</td>";
                echo "<td>{$row['status_pet']}</td>";
                echo "<td>
                        <a href='edit_owner.php?id={$row['owner_id']}' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='delete_owner.php?id={$row['owner_id']}' class='btn btn-danger btn-sm'>Delete</a>
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
        table = document.getElementById("ownersTable");
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
