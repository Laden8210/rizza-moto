<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find My Pet - Community</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="images/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5fe;
        }

        /* Loader Styles */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #4a90e2;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10000;
        }

        #loader .spinner-border {
            width: 3rem;
            height: 3rem;
            margin-bottom: 15px;
        }

        #loader h1 {
            font-size: 1.5rem;
            animation: fadeInOut 1s infinite;
        }

        @keyframes fadeInOut {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .navbar {
            background-color: #4a90e2;
        }

        .navbar-brand {
            font-weight: bold;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .nav-link:hover {
            color: #d4e9fc;
        }

        .carousel-inner img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .carousel-section {
            padding: 40px 0;
        }

        .carousel-section .saying {
            padding-left: 30px;
        }

        .carousel-section .carousel {
            flex: 1;
            max-width: 600px;
        }

        @media (max-width: 768px) {
            .carousel-section {
                flex-direction: column;
                text-align: center;
            }

            .carousel-section .saying {
                padding-left: 0;
                margin-top: 20px;
            }
        }

        .info-section {
            background: #f9faff;
            padding: 60px 0;
        }

        .info-section .info-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-section .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }

        footer {
            background-color: #4a90e2;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Loader -->
    <div id="loader">
        <div class="spinner-border text-light" role="status"></div>
        <h1>Loading...</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Find My Pet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="carousel-section container d-flex align-items-center justify-content-between flex-wrap my-5">
    <!-- Carousel -->
    <div id="petCarousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 50%; min-width: 300px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide.png" class="d-block w-100" alt="Missing Pet">
            </div>
            <div class="carousel-item">
                <img src="img/slide-1.png" class="d-block w-100" alt="Happy Reunion">
            </div>
            <div class="carousel-item">
                <img src="img/slide-2.png" class="d-block w-100" alt="Community Support">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Text Section -->
    <div class="saying text-center text-md-start" style="max-width: 45%; min-width: 300px;">
        <h2>Together, We Can Bring Pets Home</h2>
        <p>
            Join our community in finding lost pets and reuniting them with their families. Every effort counts, and with
            your help, we can make a difference in the lives of these beloved animals.
        </p>
    </div>
</section>


    <section class="info-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-card">
                        <h4>Report a Missing Pet</h4>
                        <p>Quickly post details about your missing pet to alert the community.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <h4>Search for Lost Pets</h4>
                        <p>Browse through reported missing pets and help identify those you have seen.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <h4>Community Support</h4>
                        <p>Join discussions and collaborate with others in your area to support lost pet recovery.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Find My Pet. All rights reserved.</p>
    </footer>

    <script>
        // Hide loader after 2 seconds
        window.onload = function () {
            setTimeout(() => {
                document.getElementById("loader").style.display = "none";
            }, 2000);
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
