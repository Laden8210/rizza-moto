<?php
session_start();

include 'includes/header.php';
include 'includes/sidebar1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #f8f9fa;
        }
        .content{
            position: fixed;
            margin-top: 40px;
            margin-left: 260px;
            margin-bottom: 50px;
            width: 1150px;
            height: 650px;
            padding: 2px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .mission-vision {
            margin-bottom: 40px;
        }
        .developer-section {
            margin-bottom: 40px;
        }
        .developer-img {
            width: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
    <div class="container">
        <h2 class="text-center">About Us</h2>
        
        <div class="mission-vision">
            <h3>Mission:</h3>
            <p>To establish a unified and accessible registration system for dogs and cats, promoting responsible ownership, ensuring animal welfare, and fostering community safety.</p>
            <h3>Vision:</h3>
            <p>We envision a society where every dog and cat is accounted for and cherished, where responsible ownership is the norm, and where communities thrive in harmony with their beloved animal companions. Through our registration system, we aim to create a network that not only identifies and protects pets but also serves as a platform for education, advocacy, and collaboration among pet owners, animal welfare organizations, and local authorities. By promoting responsible pet ownership and facilitating efficient identification and tracking, we strive to reduce stray populations, prevent animal cruelty, and enhance the overall well-being of our furry friends and the communities they call home.</p>
        </div>
        
        <div class="developer-section">
            <h3>Developers</h3>
            <div class="row">
                <div class="col-md-4">
                    <img src="img/profile1.png" alt="Developer 1" class="developer-img">
                    <h4>Adrian Santos</h4>
                    <p>Lead Developer</p>
                </div>
                <div class="col-md-4">
                    <img src="img/profile1.png" alt="Developer 2" class="developer-img">
                    <h4>Ezekiel Balladares</h4>
                    <p>Frontend Developer</p>
                </div>
                <div class="col-md-4">
                    <img src="img/profile1.png" alt="Developer 3" class="developer-img">
                    <h4>Junil Tino</h4>
                    <p>Backend Developer</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>


    <?php
include 'includes/footer.php';
?>
</body>
</html>
