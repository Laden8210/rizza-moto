<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find My Pet - Community</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="images/logo1.png">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5fe;
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

        .hero-section {
            background-color: #4a90e2;
            color: #fff;
            padding: 80px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.5rem;
            max-width: 800px;
            margin: auto;
            line-height: 1.6;
        }

        .carousel-inner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .info-section {
            background: #f0f8ff;
            color: #333;
            padding: 60px 0;
        }

        .info-section .info-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .info-section .info-card:hover {
            transform: translateY(-10px);
        }

        .download-section {
            background-color: #e8f5fe;
            padding: 40px 0;
            text-align: center;
        }

        .download-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .btn-download {
            background-color: #4a90e2;
            color: #fff;
            font-weight: bold;
            padding: 15px 30px;
            border-radius: 5px;
        }

        .btn-download:hover {
            background-color: #357ab8;
            color: #fff;
        }

        footer {
            background-color: #4a90e2;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .carousel-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 0;
        }

        .carousel-section .saying {
            max-width: 50%;
            padding-left: 30px;
        }

        .carousel-section .saying h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .carousel-section .saying p {
            font-size: 1.5rem;
            line-height: 1.6;
        }
    </style>
</head>

<body>
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
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="carousel-section">
        <div id="petCarousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 50%;">
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
                <div class="carousel-item">
                    <img src="img/slide-3.png" class="d-block w-100" alt="Community Support">
                </div>
                <div class="carousel-item">
                    <img src="img/slide-4.png" class="d-block w-100" alt="Community Support">
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
        <div class="saying">
            <h2>Together, We Can Bring Pets Home</h2>
            <p>Join our community in finding lost pets and reuniting them with their families. Every effort counts, and with your help, we can make a difference in the lives of these beloved animals.</p>
        </div>
    </section>

    <section class="hero-section">
        <div class="container">
            <h1>Find Missing Pets in Your Community!</h1>
            <p>Join our community to help reunite lost pets with their owners. Share information, post details of lost pets, and support each other in bringing pets back to their loving homes.</p>
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

    <section class="download-section">
        <div class="container">
            <h2>Download Our App</h2>
            <p>Stay connected and receive updates on missing pets in your area. Download our app now to get started!</p>
            <a href="#" class="btn btn-download">Download App</a>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Find My Pet. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
