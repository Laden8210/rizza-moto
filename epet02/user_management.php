<?php
session_start();

// Include your database connection file
include 'db.php';

include 'includes/header.php';
include 'includes/sidebar1.php';

// Fetch user data
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
.content {
position: static;
margin-top: 60px;
margin-left: 260px;
margin-bottom: 50px;
width: 1150px;
height: 900x;
border: 2px solid #111;
border-radius:10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
padding: 20px;
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
    </style>
</head>
<body>

<div class="content">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>User Management</h2><br>
        <a href="register.php" class="btn btn-primary">Add New User</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['usertype']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
