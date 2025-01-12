<?php
// register.php

// Start session to store messages
session_start();

// Include the database configuration file
require_once 'include/config.php';

// Initialize variables for error and success messages
$errors = [];
$success = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize user inputs
    $fullname        = trim($_POST['fullname']);
    $email           = trim($_POST['email']);
    $password        = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmpassword']);

    // Basic validation
    if (empty($fullname)) {
        $errors[] = "Full Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if (empty($confirmPassword)) {
        $errors[] = "Confirm Password is required.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // Check if terms and conditions are accepted
    if (!isset($_POST['checkbox-terms'])) {
        $errors[] = "You must agree to the Terms and Conditions.";
    }

    // If no errors, proceed to insert the user into the database
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare an SQL statement to prevent SQL injection
        $stmt = mysqli_prepare($conn, "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hashedPassword);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                $success = "Registration successful! You can now <a href='index.php'>log in</a>.";
            } else {
                // Check for duplicate email error
                if (mysqli_errno($conn) === 1062) { // 1062 = Duplicate entry
                    $errors[] = "Email already exists. Please use a different email.";
                } else {
                    $errors[] = "Registration failed. Please try again later.";
                    // Log the error for debugging (optional)
                    error_log("Database Error: " . mysqli_error($conn));
                }
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Failed to prepare the registration statement.";
            // Log the error for debugging (optional)
            error_log("Prepare Error: " . mysqli_error($conn));
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

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
                    <h4 class="mt-0">Create an Account</h4>
                    <p class="text-muted mb-4">Fill in the details below to get started with Decconz Finance.</p>

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
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input class="form-control" type="text" id="fullname" name="fullname" required placeholder="Enter your full name" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" name="email" required placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
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
                                <input type="checkbox" class="form-check-input" id="checkbox-terms" name="checkbox-terms" required>
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
