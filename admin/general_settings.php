
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:48 GMT -->
<head>
    <meta charset="utf-8" />
    <title>General Settings | CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Manage general settings for your CRM dashboard" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Bootstrap Icons for Badges -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'includes/topbar.php'; ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php include 'includes/title.php'; ?>
                    <!-- end page title -->

                    <!-- General Settings Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General Settings</h4>
                                    <p class="card-title-desc">Update the general settings of your CRM dashboard below.</p>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form action="general_settings_handler.php" method="POST">
                                        <div class="row">
                                            <!-- Site Name -->
                                            <div class="col-md-6 mb-3">
                                                <label for="siteName" class="form-label">Site Name</label>
                                                <input type="text" class="form-control" id="siteName" name="site_name" placeholder="Enter site name" required>
                                            </div>

                                            <!-- Site URL -->
                                            <div class="col-md-6 mb-3">
                                                <label for="siteURL" class="form-label">Site URL</label>
                                                <input type="url" class="form-control" id="siteURL" name="site_url" placeholder="https://www.yoursite.com" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Admin Email -->
                                            <div class="col-md-6 mb-3">
                                                <label for="adminEmail" class="form-label">Admin Email</label>
                                                <input type="email" class="form-control" id="adminEmail" name="admin_email" placeholder="admin@yoursite.com" required>
                                            </div>

                                            <!-- Contact Number -->
                                            <div class="col-md-6 mb-3">
                                                <label for="contactNumber" class="form-label">Contact Number</label>
                                                <input type="tel" class="form-control" id="contactNumber" name="contact_number" placeholder="Enter contact number" pattern="[0-9]{10}" required>
                                                <div class="form-text">Please enter a 10-digit phone number.</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Timezone -->
                                            <div class="col-md-6 mb-3">
                                                <label for="timezone" class="form-label">Timezone</label>
                                                <select class="form-select" id="timezone" name="timezone" required>
                                                    <option value="">Select Timezone</option>
                                                    <option value="UTC">UTC</option>
                                                    <option value="Asia/Kolkata">Asia/Kolkata</option>
                                                    <option value="America/New_York">America/New_York</option>
                                                    <option value="Europe/London">Europe/London</option>
                                                    <!-- Add more timezones as needed -->
                                                </select>
                                            </div>

                                            <!-- Language -->
                                            <div class="col-md-6 mb-3">
                                                <label for="language" class="form-label">Language</label>
                                                <select class="form-select" id="language" name="language" required>
                                                    <option value="">Select Language</option>
                                                    <option value="en">English</option>
                                                    <option value="es">Spanish</option>
                                                    <option value="fr">French</option>
                                                    <option value="de">German</option>
                                                    <!-- Add more languages as needed -->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Maintenance Mode -->
                                            <div class="col-md-6 mb-3">
                                                <label for="maintenanceMode" class="form-label">Maintenance Mode</label>
                                                <select class="form-select" id="maintenanceMode" name="maintenance_mode" required>
                                                    <option value="">Select Status</option>
                                                    <option value="enabled">Enabled</option>
                                                    <option value="disabled">Disabled</option>
                                                </select>
                                            </div>

                                            <!-- Logo Upload -->
                                            <div class="col-md-6 mb-3">
                                                <label for="logoUpload" class="form-label">Upload Logo</label>
                                                <input class="form-control" type="file" id="logoUpload" name="logo" accept="image/*">
                                                <div class="form-text">Upload your company logo (PNG, JPG).</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Footer Text -->
                                            <div class="col-12 mb-3">
                                                <label for="footerText" class="form-label">Footer Text</label>
                                                <textarea class="form-control" id="footerText" name="footer_text" rows="3" placeholder="Enter footer text"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-end">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="mdi mdi-content-save me-1"></i> Save Changes
                                                </button>
                                                <button type="reset" class="btn btn-secondary">
                                                    <i class="mdi mdi-refresh me-1"></i> Reset
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'includes/footer.php'; ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <?php include 'includes/rightbar.php'; ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- Apex js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Chart.js Initialization -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Example data for charts
            const subscriptionStatuses = ['Active', 'Inactive', 'Not Subscribed'];
            const subscriptionCounts = [50, 30, 20]; // Replace with dynamic data

            const agenciesByPackage = {
                'Basic Package': 30,
                'Premium Package': 20,
                'Enterprise Package': 10
            };

            // Pie Chart for Subscription Status
            const ctx1 = document.getElementById('subscriptionStatusChart').getContext('2d');
            new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: subscriptionStatuses,
                    datasets: [{
                        data: subscriptionCounts,
                        backgroundColor: [
                            '#28a745',
                            '#ffc107',
                            '#6c757d'
                        ]
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Bar Chart for Agencies by Package
            const ctx2 = document.getElementById('agenciesByPackageChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: Object.keys(agenciesByPackage),
                    datasets: [{
                        label: 'Number of Agencies',
                        data: Object.values(agenciesByPackage),
                        backgroundColor: '#007bff'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        });
    </script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function () {
            $('#downloadReportsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "order": [[ 4, "desc" ]], // Order by Date Created descending
                "language": {
                    "search": "Search Reports:",
                    "lengthMenu": "Show _MENU_ reports",
                    "info": "Showing _START_ to _END_ of _TOTAL_ reports"
                }
            });
        });
    </script>

    <!-- demo app -->
    <script src="assets/js/pages/demo.general-settings.js"></script>
    <!-- end demo js-->
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:49 GMT -->
</html>
