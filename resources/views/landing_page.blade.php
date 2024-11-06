<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dann's Store - Your Local Grocery Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        nav {
            position: sticky;
        }

        nav a {
            color: white;
            font-weight: 600;
        }

        #home {
            background: url('adminlte/toko.png') no-repeat center center;
            background-size: cover;
            height: 100vh;
            color: white;
            position: relative;
        }

        #home h1 {
            margin-top: 180px;
            font-size: 60px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        #home p {
            font-size: 25px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
        }

        #about, #contact {
            padding: 60px 0;
        }

        #about {
            background-color: #f0f0f0;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
        }

        footer .footer-logo img {
            height: 50px;
        }

        footer .social-icons a {
            color: white;
            margin: 0 15px;
            transition: transform 0.3s ease-in-out;
        }

        footer .social-icons a:hover {
            transform: scale(1.2);
        }

        footer h3 {
            font-weight: 600;
        }

        .shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .rounded {
            border-radius: 20px;
        }

        .text-shadow {
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary position-sticky">
        <img src="{{ asset('adminlte/logo-d.png') }}" alt="Logo" width="45px">
        <a class="navbar-brand" href="#home">Dann's Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="gap: 25px">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li>
                    <a href="{{ url('login') }}" class="btn btn-light text-primary shadow rounded-pill p-2 px-3 py-2">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="text-center d-flex align-items-center justify-content-center">
        <div class="container">
            <h1 class="text-shadow">Welcome to Dann's Store</h1>
            <p class="lead shadow-sm">Your trusted local grocery store</p>
            <a href="#about" class="btn btn-primary shadow mt-4 p-3 px-4 rounded-pill">Learn More</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="text-center">
        <div class="container">
            <h2>About Dann's Store</h2>
            <p>Located at: Jl. Angsana No. 15, Jakarta</p>
            <p>Opening Hours: Monday - Sunday, 8:00 AM - 9:00 PM</p>
            <p>We sell a wide variety of grocery items such as fresh produce, snacks, household supplies, and more!</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="text-center">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Owner: Wildan Rama</p>
            <p>Email: dannsmarket@gmail.com</p>
            <p>Phone: +62 812-3456-7890</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="footer-logo mb-3">
                <img src="{{ asset('adminlte/logo-d.png') }}" alt="Dann's Market Logo"width="45px">
                <h3>Dann's Store</h3>
            </div>
            <div class="social-icons mb-4">
                <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
            <p>&copy; 2024 Dann's Store. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
