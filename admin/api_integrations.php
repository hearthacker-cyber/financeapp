
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:48 GMT -->
<head>
    <meta charset="utf-8" />
    <title>API Integrations | CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Manage API integrations for your CRM dashboard" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

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

                    <!-- API Integrations Form and Table -->
                    <div class="row">
                        <!-- API Integrations Form -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add New API Integration</h4>
                                    <p class="card-title-desc">Fill in the details below to integrate a new API.</p>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form action="api_integrations_handler.php" method="POST">
                                        <!-- API Name -->
                                        <div class="mb-3">
                                            <label for="apiName" class="form-label">API Name</label>
                                            <input type="text" class="form-control" id="apiName" name="api_name" placeholder="Enter API name" required>
                                        </div>

                                        <!-- API Endpoint -->
                                        <div class="mb-3">
                                            <label for="apiEndpoint" class="form-label">API Endpoint</label>
                                            <input type="url" class="form-control" id="apiEndpoint" name="api_endpoint" placeholder="https://api.example.com" required>
                                        </div>

                                        <!-- API Key -->
                                        <div class="mb-3">
                                            <label for="apiKey" class="form-label">API Key</label>
                                            <input type="text" class="form-control" id="apiKey" name="api_key" placeholder="Enter API key" required>
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-3">
                                            <label for="apiStatus" class="form-label">Status</label>
                                            <select class="form-select" id="apiStatus" name="status" required>
                                                <option value="">Select status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="mdi mdi-content-save me-1"></i> Save Integration
                                            </button>
                                            <button type="reset" class="btn btn-secondary">
                                                <i class="mdi mdi-refresh me-1"></i> Reset
                                            </button>
                                        </div>
                                    </form>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <!-- API Integrations Table -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Existing API Integrations</h4>
                                    <p class="card-title-desc">Manage your current API integrations below.</p>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="apiIntegrationsTable" class="table table-bordered table-hover table-striped table-sm">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>API Name</th>
                                                    <th>Endpoint</th>
                                                    <th>API Key</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Example Data Rows -->
                                                <tr>
                                                    <td>1</td>
                                                    <td>Payment Gateway</td>
                                                    <td>https://api.paymentgateway.com/v1/</td>
                                                    <td>abcd1234efgh5678</td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td>
                                                        <a href="edit_api_integration.php?api_id=1" class="btn btn-sm btn-primary" title="Edit">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </a>
                                                        <a href="delete_api_integration.php?api_id=1" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this integration?');">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Email Service</td>
                                                    <td>https://api.emailservice.com/send</td>
                                                    <td>ijkl9012mnop3456</td>
                                                    <td><span class="badge bg-warning text-dark">Inactive</span></td>
                                                    <td>
                                                        <a href="edit_api_integration.php?api_id=2" class="btn btn-sm btn-primary" title="Edit">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </a>
                                                        <a href="delete_api_integration.php?api_id=2" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this integration?');">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
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
            $('#apiIntegrationsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "order": [[ 4, "desc" ]], // Order by Status descending
                "language": {
                    "search": "Search Integrations:",
                    "lengthMenu": "Show _MENU_ integrations",
                    "info": "Showing _START_ to _END_ of _TOTAL_ integrations"
                }
            });
        });
    </script>

    <!-- demo app -->
    <script src="assets/js/pages/demo.api-integrations.js"></script>
    <!-- end demo js-->
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:49 GMT -->
</html>
