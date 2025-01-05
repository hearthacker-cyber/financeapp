
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:48 GMT -->
<head>
    <meta charset="utf-8" />
    <title>View Reports | CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="View and manage reports" name="description" />
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
        <?php include 'sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'topbar.php'; ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php include 'title.php'; ?>
                    <!-- end page title -->

                    <!-- Reports Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Reports Overview</h4>
                                    <p class="card-title-desc">View and manage your reports below.</p>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="reportsTable" class="table table-bordered table-hover table-striped table-sm">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Report ID</th>
                                                    <th>Agency Name</th>
                                                    <th>Report Type</th>
                                                    <th>Date Created</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Example Data Rows -->
                                                <tr>
                                                    <td>1</td>
                                                    <td>RPT-001</td>
                                                    <td>Alpha Finance</td>
                                                    <td>Subscription Report</td>
                                                    <td>2023-10-01</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    <td>
                                                        <a href="view_report_details.php?report_id=RPT-001" class="btn btn-sm btn-primary" title="View Details">
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                        <a href="download_report.php?report_id=RPT-001" class="btn btn-sm btn-success" title="Download Report">
                                                            <i class="mdi mdi-download"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>RPT-002</td>
                                                    <td>Beta Loans</td>
                                                    <td>Financial Report</td>
                                                    <td>2023-09-28</td>
                                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                                    <td>
                                                        <a href="view_report_details.php?report_id=RPT-002" class="btn btn-sm btn-primary" title="View Details">
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                        <a href="download_report.php?report_id=RPT-002" class="btn btn-sm btn-success" title="Download Report">
                                                            <i class="mdi mdi-download"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>RPT-003</td>
                                                    <td>Gamma Credit</td>
                                                    <td>Subscription Report</td>
                                                    <td>2023-09-25</td>
                                                    <td><span class="badge bg-danger">Failed</span></td>
                                                    <td>
                                                        <a href="view_report_details.php?report_id=RPT-003" class="btn btn-sm btn-primary" title="View Details">
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                        <a href="download_report.php?report_id=RPT-003" class="btn btn-sm btn-success" title="Download Report">
                                                            <i class="mdi mdi-download"></i>
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

                    <!-- Generate Report Button -->
                    <div class="row">
                        <div class="col-12 text-end">
                            <a href="generate_report.php" class="btn btn-success">
                                <i class="mdi mdi-plus-circle-outline me-1"></i> Generate New Report
                            </a>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'footer.php'; ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <?php include 'rightbar.php'; ?>

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
            $('#reportsTable').DataTable({
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
    <script src="assets/js/pages/demo.view-reports.js"></script>
    <!-- end demo js-->
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:49 GMT -->
</html>
