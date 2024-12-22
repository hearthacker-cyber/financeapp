<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "it_solutions_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the dynamic title from the database
$sql = "SELECT title FROM settings WHERE id = 1";
$result = $conn->query($sql);
$title = "Default IT Solutions Title"; // Default title if not found

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }
        header {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 20px 0;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .hero-section {
            background: url('https://images.unsplash.com/photo-1478760329108-5c3ed9d495a0?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 15px;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
        }
        .hero-section p {
            font-size: 1.2rem;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #0056b3;
            font-weight: 500;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .footer-links a {
            color: white;
            text-decoration: none;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header with Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">IT Solutions</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to Hifi11 Technologies We are here for your digital services </h1>
            <p>Your trusted partner for innovative IT solutions.</p>
            <a href="#services" class="btn btn-primary btn-lg mt-3">Explore Services</a>
        </div>
    </div>

    <!-- Services Section -->
    <div class="container my-5">
        <section id="services">
            <h2 class="text-center mb-4">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">Build responsive and modern websites tailored to your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Cloud Solutions</h5>
                            <p class="card-text">Scale your business with secure and efficient cloud services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">IT Support</h5>
                            <p class="card-text">24/7 support to keep your business running smoothly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="mt-5">
            <h2 class="text-center mb-4">Client Testimonials</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <blockquote class="blockquote text-center">
                            <p class="mb-4">"The team transformed our online presence and boosted our customer engagement significantly!"</p>
                            <footer class="blockquote-footer">John Doe, CEO of TechCorp</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote text-center">
                            <p class="mb-4">"Outstanding cloud solutions! Our operations have never been more efficient."</p>
                            <footer class="blockquote-footer">Jane Smith, Manager at CloudWorks</footer>
                        </blockquote>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> IT Solutions. All rights reserved.</p>
            <div class="footer-links">
                <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a> | <a href="#">Contact Us</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
