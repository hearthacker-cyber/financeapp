<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Settings - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Settings Page" name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">

    <!-- Begin page -->
    <div class="wrapper">
        <!-- Include Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Start Page Content here -->
        <div class="content-page">
            <div class="content">
                <!-- Include Topbar -->
                <?php include 'topbar.php'; ?>

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Page Title -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="page-title">Settings</h4>
                        </div>
                    </div>

                    <!-- Settings Form -->
                    <form id="settingsForm">
                        <div class="row">
                            <!-- General Settings -->
                            <div class="col-md-6 mb-3">
                                <h5>General Settings</h5>
                                <div class="mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" placeholder="Enter company name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email address">
                                </div>
                                <div class="mb-3">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber" placeholder="Enter contact number">
                                </div>
                            </div>

                            <!-- Security Settings -->
                            <div class="col-md-6 mb-3">
                                <h5>Security Settings</h5>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Change Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter new password">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                    </form>
                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Include Footer -->
            <?php include 'footer.php'; ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- Form Validation and Submit Script -->
    <script>
        document.getElementById('settingsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var companyName = document.getElementById('companyName').value;
            var email = document.getElementById('email').value;
            var contactNumber = document.getElementById('contactNumber').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            alert('Settings saved successfully!');

            // Backend integration placeholder
            /*
            fetch('/api/save-settings', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    companyName: companyName,
                    email: email,
                    contactNumber: contactNumber,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => alert('Settings saved successfully!'))
            .catch(error => alert('Error saving settings: ' + error));
            */
        });
    </script>
</body>
</html>
