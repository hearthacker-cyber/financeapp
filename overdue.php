<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Overdue Payments - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Overdue Payments Page" name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">
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
                    <?php include 'title.php'; ?>
                    <!-- End Page Title -->

                    <!-- Bulk Action Button -->
                    <div class="mb-3">
                        <button class="btn btn-warning" id="bulkReminderBtn" disabled>
                            <i class="mdi mdi-message-alert-outline"></i> Send Bulk Reminder
                        </button>
                    </div>

                    <!-- Overdue Payments Table -->
                    <div class="table-responsive mt-4">
                        <table id="overduePaymentsTable" class="table table-bordered table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Contact Number</th>
                                    <th>Loan Product</th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Overdue Days</th>
                                    <th>Overdue Amount</th>
                                    <th>Progress (Paid/Total)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Include Footer -->
            <?php include 'footer.php'; ?>
        </div>
        <!-- End Page content -->
    </div>
    <!-- END wrapper -->

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Overdue Payments Script -->
    <script>
        var overduePaymentsData = [
            { id: 1, name: "John Doe", contact: "9876543210", loan: "Personal Loan", date: "2024-10-01", amount: 5000, days: 5, overdue: 5250, paid: 4, total: 9 },
            { id: 2, name: "Mary Smith", contact: "9123456789", loan: "Vehicle Loan", date: "2024-09-28", amount: 2000, days: 10, overdue: 2500, paid: 2, total: 6 },
            { id: 3, name: "Robert Brown", contact: "9988776655", loan: "Home Loan", date: "2024-09-15", amount: 10000, days: 30, overdue: 11500, paid: 0, total: 12 }
        ];

        $(document).ready(function () {
            var table = $('#overduePaymentsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: -1 }
                ]
            });

            overduePaymentsData.forEach(function (payment) {
                table.row.add([
                    '<input type="checkbox" class="rowCheckbox" data-id="' + payment.id + '">',
                    payment.id,
                    payment.name,
                    payment.contact,
                    payment.loan,
                    payment.date,
                    payment.amount.toFixed(2),
                    payment.days,
                    payment.overdue.toFixed(2),
                    payment.paid + '/' + payment.total,
                    '<button class="btn btn-success btn-sm" onclick="redirectToReminder(' + payment.id + ')">Send Reminder</button>'
                ]).draw(false);
            });

            $('#selectAll').on('change', function () {
                $('.rowCheckbox').prop('checked', $(this).is(':checked'));
                toggleBulkReminder();
            });

            $('#overduePaymentsTable').on('change', '.rowCheckbox', toggleBulkReminder);

            function toggleBulkReminder() {
                $('#bulkReminderBtn').prop('disabled', $('.rowCheckbox:checked').length === 0);
            }

            $('#bulkReminderBtn').on('click', function () {
                var selectedIds = [];
                $('.rowCheckbox:checked').each(function () {
                    selectedIds.push($(this).data('id'));
                });
                window.location.href = 'reminder_sender.php?customerId=' + selectedIds.join(',');
            });
        });

        function redirectToReminder(customerId) {
            window.location.href = 'reminder_sender.php?customerId=' + customerId;
        }
    </script>
</body>
</html>
