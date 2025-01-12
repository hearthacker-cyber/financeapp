
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Decconz - Secure Login Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Secure login portal for Decconz services." name="description" />
    <meta content="Decconz" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <style>
        /* Optional: Style for error and success messages */
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .error {
            background-color: #f8d7da;
            color: #842029;
        }

        .success {
            background-color: #d1e7dd;
            color: #0f5132;
        }
    </style>
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>
    <div class="auth-fluid">
        <!-- Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <h2 class="logo-text">Decconz</h2>
                    </div>

                    <!-- Title -->
                    <h4 class="mt-0">Sign In</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access your account.</p>

                    <!-- Display Success Message -->
                    <?php if (!empty($success)) : ?>
                        <div class="message success">
                            <?php echo $success; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Display Error Messages -->
                    <?php if (!empty($errors)) : ?>
                        <div class="message error">
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" name="email" required placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <a href="recover_password.php" class="text-muted float-end"><small>Forgot your password?</small></a>
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" required id="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember_me">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                        </div>
                        <!-- Optional Social Login Buttons -->
                        <!--
                        <div class="text-center mt-3">
                            <p class="text-muted">Or log in with</p>
                            <button type="button" class="btn btn-icon btn-outline-primary"><i class="mdi mdi-facebook"></i></button>
                            <button type="button" class="btn btn-icon btn-outline-danger"><i class="mdi mdi-google"></i></button>
                            <button type="button" class="btn btn-icon btn-outline-dark"><i class="mdi mdi-github-circle"></i></button>
                        </div>
                        -->
                    </form>
                    <!-- End Form -->

                    <!-- Footer -->
                    <footer class="footer footer-alt">
                        <p class="text-muted">Don't have an account? <a href="register.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
                    </footer>

                </div>
            </div>
        </div>
        <!-- End auth-fluid-form-box -->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">Decconz - Simplifying Access!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> Secure and reliable login experience with Decconz. <i class="mdi mdi-format-quote-close"></i>
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
