<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="images/logo1.png">

</head>

<body >

    <nav class="d-flex justify-content-between item align-items-center bg-info p-2">
        <div>
            <img src="images/1.png" alt="User" class="user" width="60" height="60">
        </div>

        <div class="d-flex justify-content-normal px-2 gap-2">
            <div>
                <a href="index.php" class="text-white fs-4 text-decoration-none">Home</a>


            </div>
            <div>
                <a href="about.php" class="text-white fs-4 text-decoration-none">About</a>
            </div>

            
            <div class="dropdown">
                <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="login.php" class="dropdown-item">Login</a></li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="container " style="padding-top: 20px;">

        <section style="height: 100vh;" class="d-flex align-items-center justify-content-center">
            <div class="card bg-white m-auto p-3 w-50">
                <div class="text-center">
                    <img src="img/img.jpg" class="rounded img-fluid" alt="About us image" style="max-width: 100%; height: auto;">
                </div>

                <div class="text-center mt-3">
                    <h1 class="fw-bold fs-2" style="color: #03A9F4;">ABOUT US</h1>
                    <p class="text-break fs-5">
                        At ePet: An Integrated Pet Management Application, we offer the best tips on caring for your pets and ensure a healthy and happy life for your furry family members in Brgy San Roque.
                    </p>
                </div>
            </div>
        </section>

        <section style="height: 100vh;" class="d-flex align-items-center justify-content-center">
            <div class="card bg-white m-auto p-3 w-50">


                <div class="text-center mt-3">

                    <p class="text-break fs-5">
                        To establish a unified and accessible registration
                        system for dogs and cats,
                        promoting responsible ownership, ensuring animal
                        welfare, and fostering community safety.
                        We envision a society where every dog and cat is
                        accounted for and cherished,
                        where responsible ownership is the norm, and
                        where communities thrive in harmony
                        with their beloved animal companions. Through
                        our registration system,
                        we aim to create a network that not only identifies
                        and protects pets but also serves
                        as a platform for education, advocacy,
                        and collaboration among pet owners, animal welfare
                        organizations, and local authorities. By promoting
                        responsible pet ownership and facilitating
                        efficient identification and tracking, we strive to
                        reduce stray populations, prevent animal cruelty,
                        and enhance the overall well-being of our furry
                        friends and the communities they call home.
                </div>
            </div>
        </section>

        <section style="height: 100vh;" class="d-flex align-items-center justify-content-center">
            <div class="w-50 text-center">

                <a href="" class="btn btn-primary fs-2 p-2">
                    Download App
                </a>


            </div>
        </section>









    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>