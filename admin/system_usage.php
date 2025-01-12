<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>System Usage - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Monitoring System Usage and Agent Activities" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

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
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
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

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Start Page Title -->
                    <?php include 'includes/title.php'; ?>
                    <!-- End Page Title -->

                    <!-- Dashboard Overview -->
                    <div class="row">
                        <!-- Key Metrics Cards -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Active Agents</h5>
                                    <h3 id="activeAgents">0</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Active Subscriptions</h5>
                                    <h3 id="activeSubscriptions">0</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Subscriptions</h5>
                                    <h3 id="pendingSubscriptions">0</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Transactions</h5>
                                    <h3 id="totalTransactions">0</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="row">
                        <!-- Subscription Growth Chart -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Subscription Growth Over Time</h5>
                                    <div class="chart-container">
                                        <canvas id="subscriptionGrowthChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Agent Performance Chart -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Agent Performance</h5>
                                    <div class="chart-container">
                                        <canvas id="agentPerformanceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Agent Activity Logs -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Agent Activities</h5>
                                    <table id="activityLogsTable" class="table table-bordered table-hover table-striped table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Agent Name</th>
                                                <th>Activity</th>
                                                <th>Date & Time</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Example Data Rows -->
                                            <tr>
                                                <td>1</td>
                                                <td>John Doe</td>
                                                <td>Visited Shop</td>
                                                <td>2024-04-15 10:30 AM</td>
                                                <td>Visited ABC Electronics in Mumbai West.</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jane Smith</td>
                                                <td>Registered Agency</td>
                                                <td>2024-04-14 02:45 PM</td>
                                                <td>Registered XYZ Finance in Delhi South.</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Performance Monitoring -->
                    <div class="row">
                        <!-- Resource Usage Card -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Server Resource Usage</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">CPU Usage: <span id="cpuUsage">0%</span></li>
                                        <li class="list-group-item">Memory Usage: <span id="memoryUsage">0%</span></li>
                                        <li class="list-group-item">Disk Space: <span id="diskSpace">0%</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Alerts & Notifications Card -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">System Alerts & Notifications</h5>
                                    <div id="alertsContainer">
                                        <!-- Alerts will be populated here -->
                                        <p>No alerts at the moment.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Loader -->
                    <div class="loader" id="loader"></div>
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'includes/footer.php'; ?>
            <!-- End Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include 'includes/rightbar.php'; ?>
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
            // Show loader
            $('#loader').show();

            // Initialize DataTables for Activity Logs
            var activityLogsTable = $('#activityLogsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "order": [[3, "desc"]], // Order by Date & Time descending
                "language": {
                    "search": "Search Activities:",
                    "lengthMenu": "Show _MENU_ activities",
                    "info": "Showing _START_ to _END_ of _TOTAL_ activities"
                }
            });

            // Fetch and display Key Metrics
            fetchKeyMetrics();

            // Fetch and display Charts
            fetchCharts();

            // Fetch and display System Performance
            fetchSystemPerformance();

            // Fetch and display Alerts
            fetchAlerts();

            // Hide loader after all data is loaded
            $('#loader').hide();

            // Function to fetch Key Metrics
            function fetchKeyMetrics() {
                $.ajax({
                    url: 'backend/get_key_metrics.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#activeAgents').text(data.active_agents);
                        $('#activeSubscriptions').text(data.active_subscriptions);
                        $('#pendingSubscriptions').text(data.pending_subscriptions);
                        $('#totalTransactions').text(data.total_transactions);
                    },
                    error: function () {
                        showToast('Failed to fetch key metrics.');
                    }
                });
            }

            // Function to fetch Charts Data
            function fetchCharts() {
                $.ajax({
                    url: 'backend/get_charts_data.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        renderSubscriptionGrowthChart(data.subscription_growth);
                        renderAgentPerformanceChart(data.agent_performance);
                    },
                    error: function () {
                        showToast('Failed to fetch charts data.');
                    }
                });
            }

            // Function to render Subscription Growth Chart
            function renderSubscriptionGrowthChart(subscriptionGrowth) {
                const ctx = document.getElementById('subscriptionGrowthChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: subscriptionGrowth.labels,
                        datasets: [{
                            label: 'Active Subscriptions',
                            data: subscriptionGrowth.data,
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
                                text: 'Subscription Growth Over Time'
                            }
                        }
                    },
                });
            }

            // Function to render Agent Performance Chart
            function renderAgentPerformanceChart(agentPerformance) {
                const ctx = document.getElementById('agentPerformanceChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: agentPerformance.labels,
                        datasets: [{
                            label: 'Number of Visits',
                            data: agentPerformance.data,
                            backgroundColor: 'rgba(40, 167, 69, 0.5)',
                            borderColor: 'rgba(40, 167, 69, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false,
                            },
                            title: {
                                display: false,
                                text: 'Agent Performance'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision:0
                                }
                            }
                        }
                    },
                });
            }

            // Function to fetch and display System Performance
            function fetchSystemPerformance() {
                $.ajax({
                    url: 'backend/get_system_performance.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#cpuUsage').text(data.cpu_usage + '%');
                        $('#memoryUsage').text(data.memory_usage + '%');
                        $('#diskSpace').text(data.disk_space + '%');
                    },
                    error: function () {
                        showToast('Failed to fetch system performance data.');
                    }
                });
            }

            // Function to fetch and display Alerts
            function fetchAlerts() {
                $.ajax({
                    url: 'backend/get_system_alerts.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data.alerts.length > 0) {
                            var alertsHTML = '<ul class="list-group">';
                            data.alerts.forEach(function (alert) {
                                alertsHTML += '<li class="list-group-item list-group-item-danger">' +
                                    '<strong>' + alert.type + ':</strong> ' + alert.message +
                                    '</li>';
                            });
                            alertsHTML += '</ul>';
                            $('#alertsContainer').html(alertsHTML);
                        } else {
                            $('#alertsContainer').html('<p>No alerts at the moment.</p>');
                        }
                    },
                    error: function () {
                        showToast('Failed to fetch system alerts.');
                    }
                });
            }

            // Function to show toast notifications
            function showToast(message) {
                $('#liveToast .toast-body').text(message);
                var toast = new bootstrap.Toast(document.getElementById('liveToast'));
                toast.show();
            }
        </script>
</body>

</html>
