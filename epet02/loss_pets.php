<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #0F5298, #66D3FA);
            color: #fff;
            transition: all 0.3s ease-in-out;
            z-index: 999;
        }

        .sidebar .brand {
            text-align: center;
            padding: 1rem 0;
        }

        .sidebar ul {
            padding: 0;
            list-style: none;
        }

        .sidebar ul li {
            padding: 15px 20px;
            transition: background 0.3s;
        }

        .sidebar ul li:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
        }

        .table-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-container h2 {
            color: #0F5298;
            margin-bottom: 20px;
        }

        .action-buttons {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-buttons input {
            max-width: 300px;
        }

        .table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            background: #0F5298;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 8px 15px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
            }

            .action-buttons {
                flex-direction: column;
                align-items: flex-start;
            }

            .action-buttons input {
                margin-top: 10px;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <img src="images/logo1.png" alt="Logo" width="100">
        </div>
        <ul>
            <li><a href="Pet_management.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="Dog&Cat_Registration.php"><i class="fas fa-paw"></i> Register Pet</a></li>
            <li><a href="loss_pets.php"><i class="fas fa-search"></i> Lost/Found</a></li>
            <li><a href="about_us.php"><i class="fas fa-info-circle"></i> About Us</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="table-container">
            <h2>Lost and Found Reports</h2>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button id="print-btn" class="btn btn-success" onclick="printSelectedOwners()">Print Selected</button>
                <button id="add-btn" class="btn btn-primary" onclick="location.href = 'report_lost_pet.php';">Add Report</button>
                <input type="text" id="searchInput" class="form-control" placeholder="Search for reports...">
            </div>

            <!-- Reports Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Pet ID</th>
                        <th>Location</th>
                        <th>Report</th>
                        <th>Found Report</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database connection
                    include 'db.php';

                    $query = "SELECT * FROM missing_reports";
                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        die("Query Failed: " . mysqli_error($conn));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='selectedReports[]' value='{$row['id']}'></td>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['user_id']}</td>";
                        echo "<td>{$row['pet_id']}</td>";
                        echo "<td>{$row['location']}</td>";
                        echo "<td>{$row['report']}</td>";
                        echo "<td>" . ($row['found_report'] ?? 'N/A') . "</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['time']}</td>";
                        echo "<td>{$row['missing_status']}</td>";
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
        // Search Function
        document.getElementById("searchInput").addEventListener("keyup", function () {
            let filter = this.value.toUpperCase();
            let rows = document.querySelectorAll(".table tbody tr");
            rows.forEach(row => {
                let text = row.innerText.toUpperCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });

        // Print Selected Reports
        function printSelectedOwners() {
            let selectedReports = document.querySelectorAll('input[name="selectedReports[]"]:checked');
            if (selectedReports.length === 0) {
                alert("Please select at least one report to print.");
                return;
            }
            let ids = Array.from(selectedReports).map(report => report.value).join(",");
            window.location.href = "vac_print.php?ids=" + ids;
        }
    </script>
</body>
</html>
