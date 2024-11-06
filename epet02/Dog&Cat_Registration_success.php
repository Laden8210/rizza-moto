<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS styles -->
    <style>
        /* Insert your custom CSS styles here */
        body {
            background-color: #f4f4f4;
        }
        .content{
            position: static;
            margin-top: 10px;
            margin-left: 260px;
            margin-bottom: 50px;
            width: 90%;
        }
        .container {
            margin-left: 500px;
        }
        .alert {
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar1.php'; ?>

<div class="content">
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <br><br> Edit Information successful!
        </div>
        <a href="Dog&Cat_Registration.php" class="btn btn-primary">Edit Other</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


