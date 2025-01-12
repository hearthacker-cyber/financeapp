<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:48 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Agent Dashboard | CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Agents" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

                    <!-- Top Cards -->
                    <?php include 'topcard.php'; ?>
                    <!-- end top card -->

                    <!-- Charts and Graphs -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Subscription Status Distribution</h4>
                                    <canvas id="subscriptionStatusChart" height="280"></canvas>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Agencies by Subscription Package</h4>
                                    <canvas id="agenciesByPackageChart" height="280"></canvas>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                    <!-- end row -->

                    <!-- Recent Activities and Quick Actions -->
                    <div class="row">
                        <!-- Recent Activities -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Recent Activities</h4>
                                    <div class="table-responsive">
                                        <table id="recentActivitiesTable" class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Agency Name</th>
                                                    <th>Activity</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Example Data Rows -->
                                                <tr>
                                                    <td>Alpha Finance</td>
                                                    <td>Assigned Premium Package</td>
                                                    <td>2023-10-01</td>
                                                </tr>
                                                <tr>
                                                    <td>Beta Loans</td>
                                                    <td>Subscription Deactivated</td>
                                                    <td>2023-09-28</td>
                                                </tr>
                                                <tr>
                                                    <td>Gamma Credit</td>
                                                    <td>Added New Agency</td>
                                                    <td>2023-09-25</td>
                                                </tr>
                                                <tr>
                                                    <td>Delta Services</td>
                                                    <td>Updated Contact Information</td>
                                                    <td>2023-09-22</td>
                                                </tr>
                                                <tr>
                                                    <td>Epsilon Bank</td>
                                                    <td>Renewed Basic Package</td>
                                                    <td>2023-09-20</td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <!-- Quick Actions -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Quick Actions</h4>
                                    <div class="d-grid gap-3">
                                        <a href="create_agency.php" class="btn btn-primary waves-effect waves-light">
                                            <i class="mdi mdi-plus-circle-outline me-2"></i> Add New Agency
                                        </a>
                                        <a href="manage_agencies.php" class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-account-group me-2"></i> Manage Agencies
                                        </a>
                                        <a href="manage_subscriptions.php" class="btn btn-success waves-effect waves-light">
                                            <i class="mdi mdi-briefcase-check me-2"></i> Manage Subscriptions
                                        </a>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->
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

    <!-- Todo js -->
    <script src="assets/js/ui/component.todo.js"></script>

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
            $('#recentActivitiesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "order": [[ 2, "desc" ]], // Order by date descending
                "language": {
                    "search": "Search Activities:",
                    "lengthMenu": "Show _MENU_ activities",
                    "info": "Showing _START_ to _END_ of _TOTAL_ activities"
                }
            });
        });
    </script>

    <!-- demo app -->
    <script src="assets/js/pages/demo.agent-dashboard.js"></script>
    <!-- end demo js-->
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:49 GMT -->
</html>
