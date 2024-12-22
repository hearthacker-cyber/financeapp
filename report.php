<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Customer Report - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Customer Report" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">
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

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Start Page Title -->
                    <?php include 'title.php'; ?>
                    <!-- End Page Title -->

                    <!-- Customer Reports -->
                    <div class="table-responsive mt-2">
                        <table id="reportTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Contact Number</th>
                                    <th>Loan Product</th>
                                    <th>Total Amount</th>
                                    <th>Interest Rate (%)</th>
                                    <th>Duration</th>
                                    <th>Payment Frequency</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>9876543210</td>
                                    <td>Personal Loan</td>
                                    <td>500000</td>
                                    <td>12%</td>
                                    <td>12 Months</td>
                                    <td>Monthly</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mary Smith</td>
                                    <td>9123456789</td>
                                    <td>Vehicle Loan</td>
                                    <td>750000</td>
                                    <td>10%</td>
                                    <td>24 Months</td>
                                    <td>Weekly</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Robert Brown</td>
                                    <td>9988776655</td>
                                    <td>Home Loan</td>
                                    <td>1000000</td>
                                    <td>8%</td>
                                    <td>36 Months</td>
                                    <td>Half-yearly</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'footer.php'; ?>
            <!-- End Footer -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- jQuery (required for DataTables and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Export Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>

    <!-- Initialize DataTable with Export Buttons -->
    <script>
        $(document).ready(function () {
            $('#reportTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "language": {
                    "search": "Search Reports:",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries"
                },
                dom: 'Bfrtip', // Define layout with buttons
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print' // Export options
                ]
            });
        });
    </script>
</body>

</html>
