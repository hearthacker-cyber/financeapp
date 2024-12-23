<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Manage Agencies - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Managing Agencies and Subscription Statuses" name="description" />
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

                    <!-- DataTables -->
                    <div class="table-responsive">
                        <table id="agencyTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Agency Name</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Subscription Status</th>
                                    <th>Pending Subscription</th>
                                    <th>Pending Days</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td><a href="agency_dashboard.php?agency_id=1">Alpha Finance</a></td>
                                    <td>9876543210</td>
                                    <td>alpha.finance@example.com</td>
                                    <td>123, Market Street, Mumbai</td>
                                    <td>Active</td>
                                    <td>No</td>
                                    <td>0</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAgency(1)" title="Edit Agency" aria-label="Edit Agency">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deactivateAgency(1)" title="Deactivate Subscription" aria-label="Deactivate Subscription">
                                            <i class="mdi mdi-logout"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="agency_dashboard.php?agency_id=2">Beta Loans</a></td>
                                    <td>9123456789</td>
                                    <td>beta.loans@example.com</td>
                                    <td>456, Liberty Road, Delhi</td>
                                    <td>Inactive</td>
                                    <td>Yes</td>
                                    <td>15</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAgency(2)" title="Edit Agency" aria-label="Edit Agency">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm" onclick="activateAgency(2)" title="Activate Subscription" aria-label="Activate Subscription">
                                            <i class="mdi mdi-login"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
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

    <!-- Right Sidebar -->
    <?php include 'rightbar.php'; ?>
    <div class="rightbar-overlay"></div>

    <!-- Edit Agency Modal -->
    <div class="modal fade" id="editAgencyModal" tabindex="-1" aria-labelledby="editAgencyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editAgencyForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAgencyModalLabel">Edit Agency Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for Agency ID -->
                        <input type="hidden" id="editAgencyId" name="agencyId">

                        <!-- Basic Agency Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editAgencyName" class="form-label">Agency Name</label>
                                <input type="text" class="form-control" id="editAgencyName" name="agencyName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editContactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="editContactNumber" name="contactNumber" pattern="\d{10}" title="Enter a 10-digit contact number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="editAddress" name="address" required>
                            </div>
                        </div>

                        <!-- Subscription Status -->
                        <div class="mb-3">
                            <label for="editSubscriptionStatus" class="form-label">Subscription Status</label>
                            <select class="form-select" id="editSubscriptionStatus" name="subscriptionStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Pending Subscription -->
                        <div class="mb-3">
                            <label for="editPendingSubscription" class="form-label">Pending Subscription</label>
                            <select class="form-select" id="editPendingSubscription" name="pendingSubscription" required>
                                <option value="">Select Status</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <!-- Pending Days -->
                        <div class="mb-3">
                            <label for="editPendingDays" class="form-label">Pending Days</label>
                            <input type="number" class="form-control" id="editPendingDays" name="pendingDays" min="0" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Agency</button>
                    </div>
                </div>
            </form>
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

    <!-- Custom JS -->
    <script>
        $(document).ready(function () {
            // Initialize DataTable for Agencies
            var agencyTable = $('#agencyTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": -1 } // Make Actions column non-orderable
                ],
                "language": {
                    "search": "Search Agencies:",
                    "lengthMenu": "Show _MENU_ agencies",
                    "info": "Showing _START_ to _END_ of _TOTAL_ agencies"
                }
            });

            // Handle Edit Agency Form Submission
            $('#editAgencyForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var agencyData = {};
                formData.forEach(function (field) {
                    agencyData[field.name] = field.value;
                });

                // Get Agency ID
                var agencyId = parseInt(agencyData.agencyId);

                // Find the row in DataTable
                agencyTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update row data
                        this.data([
                            agencyId,
                            '<a href="agency_dashboard.php?agency_id=' + agencyId + '">' + agencyData.agencyName + '</a>',
                            agencyData.contactNumber,
                            agencyData.email,
                            agencyData.address,
                            agencyData.subscriptionStatus,
                            agencyData.pendingSubscription,
                            agencyData.pendingDays,
                            agencyData.subscriptionStatus === 'Active' ?
                                '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit Agency" aria-label="Edit Agency">' +
                                '<i class="mdi mdi-pencil"></i></button> ' +
                                '<button class="btn btn-danger btn-sm" onclick="deactivateAgency(' + agencyId + ')" title="Deactivate Subscription" aria-label="Deactivate Subscription">' +
                                '<i class="mdi mdi-logout"></i></button>' :
                                '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit Agency" aria-label="Edit Agency">' +
                                '<i class="mdi mdi-pencil"></i></button> ' +
                                '<button class="btn btn-success btn-sm" onclick="activateAgency(' + agencyId + ')" title="Activate Subscription" aria-label="Activate Subscription">' +
                                '<i class="mdi mdi-login"></i></button>'
                        ]).draw(false);
                    }
                });

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#editAgencyModal').modal('hide');
            });
        });

        // Function to handle Edit Agency
        function editAgency(agencyId) {
            // Find the row data based on agencyId
            var rowData = null;
            $('#agencyTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                var data = this.data();
                if (parseInt(data[0]) === agencyId) {
                    rowData = data;
                }
            });

            if (rowData) {
                // Populate the edit form with existing data
                $('#editAgencyId').val(rowData[0]);
                // Extract agency name without HTML tags
                var agencyName = $(rowData[1]).text();
                $('#editAgencyName').val(agencyName);
                $('#editContactNumber').val(rowData[2]);
                $('#editEmail').val(rowData[3]);
                $('#editAddress').val(rowData[4]);
                $('#editSubscriptionStatus').val(rowData[5]);
                $('#editPendingSubscription').val(rowData[6]);
                $('#editPendingDays').val(rowData[7]);

                // Show the Edit Agency Modal
                $('#editAgencyModal').modal('show');
            }
        }

        // Function to deactivate Agency Subscription
        function deactivateAgency(agencyId) {
            if (confirm('Are you sure you want to deactivate the subscription for this agency?')) {
                $('#agencyTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update status to Inactive
                        data[5] = 'Inactive';
                        // Reset Pending Subscription and Days
                        data[6] = 'Yes'; // Assuming deactivation triggers a pending subscription
                        data[7] = calculatePendingDays(); // Function to calculate pending days

                        // Update agency name link if needed
                        data[1] = '<a href="agency_dashboard.php?agency_id=' + agencyId + '">' + $(data[1]).text() + '</a>';

                        // Update action buttons to allow activation
                        data[8] = '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit Agency" aria-label="Edit Agency">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-success btn-sm" onclick="activateAgency(' + agencyId + ')" title="Activate Subscription" aria-label="Activate Subscription">' +
                            '<i class="mdi mdi-login"></i></button>';
                        this.data(data).draw(false);
                    }
                });
            }
        }

        // Function to activate Agency Subscription
        function activateAgency(agencyId) {
            if (confirm('Are you sure you want to activate the subscription for this agency?')) {
                $('#agencyTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update status to Active
                        data[5] = 'Active';
                        // Reset Pending Subscription and Days
                        data[6] = 'No';
                        data[7] = '0';

                        // Update agency name link if needed
                        data[1] = '<a href="agency_dashboard.php?agency_id=' + agencyId + '">' + $(data[1]).text() + '</a>';

                        // Update action buttons to allow deactivation
                        data[8] = '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit Agency" aria-label="Edit Agency">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-danger btn-sm" onclick="deactivateAgency(' + agencyId + ')" title="Deactivate Subscription" aria-label="Deactivate Subscription">' +
                            '<i class="mdi mdi-logout"></i></button>';
                        this.data(data).draw(false);
                    }
                });
            }
        }

        // Function to calculate pending days (placeholder logic)
        function calculatePendingDays() {
            // Example: Set pending days to 30
            // Replace this with actual logic based on subscription policies
            return 30;
        }
    </script>
</body>

</html>
