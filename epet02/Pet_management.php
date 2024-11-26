<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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

    .sidebar.closed {
      width: 0;
      overflow: hidden;
    }

    .sidebar .brand {
      display: flex;
      align-items: center;
      justify-content: center;
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

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar ul li:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar ul li a i {
      font-size: 1.2rem;
    }

    .sidebar .social_media {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }

    .sidebar .social_media a {
      color: #fff;
      font-size: 1.2rem;
      transition: color 0.3s;
    }

    .sidebar .social_media a:hover {
      color: #0F5298;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
      transition: margin-left 0.3s ease-in-out;
    }

    .main-content.expanded {
      margin-left: 0;
    }

    .toggle-btn {
      position: fixed;
      left: 10px;
      top: 10px;
      background: transparent;
      border: none;
      color: #0F5298;
      font-size: 1.5rem;
      cursor: pointer;
      z-index: 1000;
    }

    .toggle-btn:hover {
      color: #66D3FA;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 0;
      }

      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <div class="sidebar" id="sidebar">
    <div class="brand">
      <img src="images/logo1.png" alt="Logo" width="120">
    </div>
    <ul>
      <li><a href="Pet_management.php"><i class="fas fa-home"></i> Dashboard</a></li>
      <li><a href="Dog&Cat_Registration.php"><i class="fas fa-paw"></i> Register Pet</a></li>
      <li><a href="loss_pets.php"><i class="fas fa-search"></i> Lost/Found</a></li>
      <li><a href="about_us.php"><i class="fas fa-info-circle"></i> About Us</a></li>
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
    <div class="social_media">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
  </div>

  <div class="main-content" id="mainContent">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <div class="container">
      <h1>Welcome to the Pet Management System</h1>
      <p>Manage your pets and track their details with ease.</p>
      <div class="card mt-4">
        <div class="card-body">
          <h2>Pet Management</h2>
          <div class="d-flex justify-content-between mb-3">
            <input type="text" id="searchInput" class="form-control w-25" placeholder="Search for owners...">
            <div>
              <button class="btn btn-success" id="print-btn" onclick="printSelectedOwners()">Print</button>
              <button class="btn btn-primary" id="add-btn" onclick="location.href = 'Dog&Cat_Registration.php';">Add</button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="ownersTable">
              <thead>
                <tr>
                  <th>Select</th>
                  <th>Owner ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Contact Number</th>
                  <th>Pet Name</th>
                  <th>Type</th>
                  <th>Age</th>
                  <th>Breed</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Include database connection
                include 'db.php';

                // SQL query to fetch owner and pet details
                $query = "
        SELECT 
          po.pet_owner_id,
          po.first_name,
          po.last_name,
          po.phone AS contact_number,
          p.pet_name,
          p.type AS pet_type,
          p.age AS pet_age,
          p.breed,
          COALESCE(p.pet_status, 'Unknown') AS pet_status
        FROM pet_owner po
        LEFT JOIN pets p ON po.pet_owner_id = p.pet_owner_id
        ORDER BY po.first_name, p.pet_name
      ";

                // Execute the query
                $result = mysqli_query($conn, $query);

                // Check if the query executed successfully
                if (!$result) {
                  echo "<tr><td colspan='11'>Error fetching data: " . mysqli_error($conn) . "</td></tr>";
                } else {
                  // Loop through each record and create table rows
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selectedOwners[]' value='{$row['pet_owner_id']}'></td>";
                    echo "<td>{$row['pet_owner_id']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                    echo "<td>{$row['contact_number']}</td>";
                    echo "<td>" . htmlspecialchars($row['pet_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['pet_type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['pet_age']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['breed']) . "</td>";
                    echo "<td>{$row['pet_status']}</td>";
                    echo "<td class='actions'>
                  <a href='edit_owner.php?id={$row['pet_owner_id']}' class='btn btn-primary btn-sm'>Edit</a>
                  <a href='delete_owner.php?id={$row['pet_owner_id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>";
                    echo "</tr>";
                  }
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const mainContent = document.getElementById("mainContent");

      if (sidebar.classList.contains("closed")) {
        sidebar.classList.remove("closed");
        mainContent.classList.remove("expanded");
      } else {
        sidebar.classList.add("closed");
        mainContent.classList.add("expanded");
      }
    }

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

    function searchOwners() {
      const input = document.getElementById("searchInput").value.toUpperCase();
      const table = document.getElementById("ownersTable");
      const rows = table.getElementsByTagName("tr");

      for (let i = 1; i < rows.length; i++) {
        let match = false;
        const cells = rows[i].getElementsByTagName("td");
        for (let j = 1; j < cells.length - 1; j++) {
          if (cells[j].textContent.toUpperCase().includes(input)) {
            match = true;
            break;
          }
        }
        rows[i].style.display = match ? "" : "none";
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>