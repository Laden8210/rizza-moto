<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="images/logo1.png">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .imgcontainer {
            text-align: center;
            padding-top: 80px;
            height: 10px;
            
        }  
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        .card {
            width: 100%;
            max-width: 400px; /* Set maximum width for the card */
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
            font-size: 1.5rem;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }
             
    </style>
</head>
<body>
<div class="imgcontainer">
    <img src="images/1.png" alt="User" class="user" width="200" height="200">
  </div>
<div class="container">
    <div class="card">
        <div class="card-header text-center">EPet Login</div>
        <div class="card-body">
            <form id="loginForm" method="POST" action="login_process.php" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Username</label>
                    <input type="text" class="form-control" id="loginEmail" name="loginUsername" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                    <?php if(isset($_GET['login']) && $_GET['login'] === 'failed'): ?>
                        <div class="error-message">Please enter a valid username and password.</div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
