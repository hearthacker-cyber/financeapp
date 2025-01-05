<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Agency Dashboard - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Agency Dashboard for Monitoring Performance Metrics" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Chart.js CSS (if any custom styling is needed) -->
    <style>
        /* Custom styles for charts */
        .chart-container {
            position: relative;
            margin: auto;
            height: 40vh;
            width: 80vw;
        }

        /* Loader Styles */
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #0d6efd;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin: auto;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">

    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <!-- Replace this comment with your sidebar.php content -->
        <!-- Example Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="dashboard.php">
                    <span class="align-middle">CRM Dashboard</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main Menu
                    </li>

                    <li class="sidebar-item">
                        <a href="dashboard.php" class="sidebar-link">
                            <i class="mdi mdi-view-dashboard-outline"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a href="manage_agency_admins.php" class="sidebar-link">
                            <i class="mdi mdi-account-group-outline"></i> <span class="align-middle">Manage Agencies</span>
                        </a>
                    </li>

                    <!-- Add more sidebar items as needed -->
                </ul>
            </div>
        </nav>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <!-- Replace this comment with your topbar.php content -->
                <!-- Example Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topbar-nav"
                            aria-controls="topbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="topbar-nav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                                        <span class="ms-1 font-weight-bold">Super Admin</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout me-1"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- end Topbar -->

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Start Page Title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Agency Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Title -->

                    <!-- Agency Overview -->
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Welcome to <span id="agencyName">Alpha Finance</span> Dashboard</h2>
                            <p>Manage subscriptions, transactions, and monitor agent activities.</p>
                        </div>
                    </div>

                    <!-- Agency Details -->
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Agency Details</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Agency Name:</strong> <span id="agencyNameDetail">Alpha Finance</span></li>
                                <li class="list-group-item"><strong>Contact Number:</strong> <span id="contactNumber">9876543210</span></li>
                                <li class="list-group-item"><strong>Email:</strong> <span id="agencyEmail">alpha.finance@example.com</span></li>
                                <li class="list-group-item"><strong>Address:</strong> <span id="agencyAddress">123, Market Street, Mumbai</span></li>
                                <li class="list-group-item"><strong>Subscription Status:</strong> <span id="subscriptionStatus">Active</span></li>
                                <li class="list-group-item"><strong>Pending Subscription:</strong> <span id="pendingSubscription">No</span></li>
                                <li class="list-group-item"><strong>Pending Days:</strong> <span id="pendingDays">0</span></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <!-- Additional Information or Widgets can be added here -->
                        </div>
                    </div>

                    <!-- KPI Cards -->
                    <div class="row mt-4">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Active Subscriptions</h5>
                                    <h3 id="activeSubscriptions">150</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-white bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Subscriptions</h5>
                                    <h3 id="pendingSubscriptions">20</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Total Transactions</h5>
                                    <h3 id="totalTransactions">500</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-white bg-info">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue Generated</h5>
                                    <h3 id="revenueGenerated">₹1,500,000</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="row">
                        <!-- Subscription Trends Chart -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Subscription Trends Over Time</h5>
                                    <canvas id="subscriptionTrendsChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Revenue Breakdown Chart -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue Breakdown</h5>
                                    <canvas id="revenueBreakdownChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transactions Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Transactions</h5>
                                    <table id="transactionsTable" class="table table-bordered table-hover table-striped table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Subscription Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Transaction Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Mock Data Rows -->
                                            <tr>
                                                <td>1</td>
                                                <td>2024-01-15</td>
                                                <td>₹10,000</td>
                                                <td>Success</td>
                                                <td>2024-01-16</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>2024-02-20</td>
                                                <td>₹15,000</td>
                                                <td>Failed</td>
                                                <td>2024-02-21</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>2024-03-10</td>
                                                <td>₹20,000</td>
                                                <td>Success</td>
                                                <td>2024-03-11</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Agent Activities -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Agent Activities</h5>
                                    <table id="agentActivitiesTable" class="table table-bordered table-hover table-striped table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Agent Name</th>
                                                <th>Visit Date</th>
                                                <th>Shop Name</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Mock Data Rows -->
                                            <tr>
                                                <td>1</td>
                                                <td>John Doe</td>
                                                <td>2024-04-05</td>
                                                <td>Shop A</td>
                                                <td>Mumbai</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jane Smith</td>
                                                <td>2024-04-06</td>
                                                <td>Shop B</td>
                                                <td>Delhi</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Mike Johnson</td>
                                                <td>2024-04-07</td>
                                                <td>Shop C</td>
                                                <td>Bangalore</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Loader -->
                    <div class="loader" id="loader"></div>
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <!-- Replace this comment with your footer.php content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            © <?php echo date("Y"); ?> CRM Dashboard
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About</a>
                                <a href="javascript:void(0);">Support</a>
                                <a href="javascript:void(0);">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <!-- Replace this comment with your rightbar.php content -->
    <aside class="rightbar">
        <!-- Right Sidebar content -->
    </aside>
    <div class="rightbar-overlay"></div>

    <!-- Toast Notification -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <!-- Message will be inserted here via JavaScript -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- jQuery (required for DataTables and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS (Ensure Bootstrap is included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

    <!-- Custom JS -->
    <script>
        $(document).ready(function () {
            // Initialize DataTables
            $('#transactionsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "order": [[3, "desc"]], // Order by Transaction Date descending
                "language": {
                    "search": "Search Transactions:",
                    "lengthMenu": "Show _MENU_ transactions",
                    "info": "Showing _START_ to _END_ of _TOTAL_ transactions"
                }
            });

            $('#agentActivitiesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "order": [[2, "desc"]], // Order by Visit Date descending
                "language": {
                    "search": "Search Activities:",
                    "lengthMenu": "Show _MENU_ activities",
                    "info": "Showing _START_ to _END_ of _TOTAL_ activities"
                }
            });

            // Initialize Charts
            initializeCharts();
        });

        function initializeCharts() {
            // Subscription Trends Chart
            var ctx1 = document.getElementById('subscriptionTrendsChart').getContext('2d');
            var subscriptionTrendsChart = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // Mock labels
                    datasets: [{
                        label: 'Active Subscriptions',
                        data: [50, 60, 70, 80, 90, 100, 110], // Mock data
                        backgroundColor: 'rgba(13, 110, 253, 0.5)',
                        borderColor: 'rgba(13, 110, 253, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Subscription Trends Over Time'
                        }
                    }
                },
            });

            // Revenue Breakdown Chart
            var ctx2 = document.getElementById('revenueBreakdownChart').getContext('2d');
            var revenueBreakdownChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Subscriptions', 'Transactions'],
                    datasets: [{
                        label: 'Revenue Breakdown',
                        data: [500000, 1000000], // Mock data
                        backgroundColor: [
                            'rgba(40, 167, 69, 0.7)',
                            'rgba(255, 193, 7, 0.7)'
                        ],
                        borderColor: [
                            'rgba(40, 167, 69, 1)',
                            'rgba(255, 193, 7, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: false,
                            text: 'Revenue Breakdown'
                        }
                    }
                },
            });
        }

        // Function to show toast notifications
        function showToast(message) {
            $('#liveToast .toast-body').text(message);
            var toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }

        // Example: Show a toast notification after 2 seconds
        setTimeout(function () {
            showToast('Welcome to the Agency Dashboard!');
        }, 2000);
    </script>
</body>

</html>
