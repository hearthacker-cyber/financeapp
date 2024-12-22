<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Decconz - Secure Registration Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Secure registration portal for Decconz services." name="description" />
    <meta content="Decconz" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>
    <div class="auth-fluid">
        <!-- Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->

                    <!-- Title -->
                    <h4 class="mt-0">Create an Account</h4>
                    <p class="text-muted mb-4">Fill in the details below to get started with Decconz Finance.</p>

                    <!-- Form -->
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input class="form-control" type="text" id="fullname" name="fullname" required placeholder="Enter your full name">
                        </div>
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" name="email" required placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required placeholder="Enter your password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" required placeholder="Confirm your password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-terms" required>
                                <label class="form-check-label" for="checkbox-terms">I agree to the <a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-account-plus"></i> Register </button>
                        </div>
                        <!-- Optional Social Registration Buttons -->
                        <!--
                        <div class="text-center mt-3">
                            <p class="text-muted">Or register with</p>
                            <button type="button" class="btn btn-icon btn-outline-primary"><i class="mdi mdi-facebook"></i></button>
                            <button type="button" class="btn btn-icon btn-outline-danger"><i class="mdi mdi-google"></i></button>
                            <button type="button" class="btn btn-icon btn-outline-dark"><i class="mdi mdi-github-circle"></i></button>
                        </div>
                        -->
                    </form>
                    <!-- End Form -->

                    <!-- Footer -->
                    <footer class="footer footer-alt">
                        <p class="text-muted">Already have an account? <a href="index.html" class="text-muted ms-1"><b>Log In</b></a></p>
                    </footer>

                </div>
            </div>
        </div>
        <!-- End auth-fluid-form-box -->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">Decconz - Simplifying Access!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> Secure and reliable registration experience with Decconz. <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    - Decconz User
                </p>
            </div>
        </div>
        <!-- End Auth fluid right content -->
    </div>
    <!-- End auth-fluid-->

    <!-- Bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>
</html>
