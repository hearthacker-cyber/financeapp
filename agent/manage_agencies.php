<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Manage Agencies - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Managing Agencies and Subscriptions" name="description" />
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

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Start Page Title -->
                    <?php include 'title.php'; ?>
                    <!-- End Page Title -->

                    <!-- Manage Agencies Button -->
                    <div class="mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAgencyModal">
                            <i class="mdi mdi-plus-circle-outline me-1"></i> Add New Agency
                        </button>
                    </div>

                    <!-- DataTables -->
                    <div class="table-responsive">
                        <table id="agencyTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Agency Name</th>
                                    <th>Contact Person</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subscription Status</th>
                                    <th>Subscription Package</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td>Alpha Finance</td>
                                    <td>John Doe</td>
                                    <td>john.doe@alphafinance.com</td>
                                    <td>+91 9876543210</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>Basic Package</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="assignSubscription(1)" title="Assign/Change Subscription">
                                            <i class="mdi mdi-briefcase-check"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm" onclick="editAgency(1)" title="Edit Agency">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deactivateSubscription(1)" title="Deactivate Subscription">
                                            <i class="mdi mdi-package-down"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Beta Loans</td>
                                    <td>Jane Smith</td>
                                    <td>jane.smith@betaloans.com</td>
                                    <td>+91 9123456780</td>
                                    <td><span class="badge bg-secondary">Not Subscribed</span></td>
                                    <td>N/A</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="assignSubscription(2)" title="Assign Subscription">
                                            <i class="mdi mdi-briefcase-check"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm" onclick="editAgency(2)" title="Edit Agency">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm" onclick="activateSubscription(2)" title="Activate Subscription">
                                            <i class="mdi mdi-package-up"></i>
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

    <!-- Add Agency Modal -->
    <div class="modal fade" id="addAgencyModal" tabindex="-1" aria-labelledby="addAgencyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addAgencyForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAgencyModalLabel">Add New Agency</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Basic Agency Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="agencyName" class="form-label">Agency Name</label>
                                <input type="text" class="form-control" id="agencyName" name="agencyName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contactPerson" class="form-label">Contact Person</label>
                                <input type="text" class="form-control" id="contactPerson" name="contactPerson" required>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="agencyEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="agencyEmail" name="agencyEmail" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="agencyPhone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="agencyPhone" name="agencyPhone" pattern="[0-9]{10}" required>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="agencyAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="agencyAddress" name="agencyAddress" rows="3" required></textarea>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="agencyPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="agencyPassword" name="agencyPassword" minlength="6" required>
                            <div class="form-text">Password must be at least 6 characters.</div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="agencyStatus" class="form-label">Status</label>
                            <select class="form-select" id="agencyStatus" name="agencyStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Agency</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Agency Modal -->
    <div class="modal fade" id="editAgencyModal" tabindex="-1" aria-labelledby="editAgencyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editAgencyForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAgencyModalLabel">Edit Agency</h5>
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
                                <label for="editContactPerson" class="form-label">Contact Person</label>
                                <input type="text" class="form-control" id="editContactPerson" name="contactPerson" required>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editAgencyEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editAgencyEmail" name="agencyEmail" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editAgencyPhone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="editAgencyPhone" name="agencyPhone" pattern="[0-9]{10}" required>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="editAgencyAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="editAgencyAddress" name="agencyAddress" rows="3" required></textarea>
                        </div>

                        <!-- Password (Optional for Reset) -->
                        <div class="mb-3">
                            <label for="editAgencyPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="editAgencyPassword" name="agencyPassword" minlength="6">
                            <div class="form-text">Leave blank if you do not want to change the password. Minimum 6 characters.</div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="editAgencyStatus" class="form-label">Status</label>
                            <select class="form-select" id="editAgencyStatus" name="agencyStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
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

    <!-- Assign Subscription Modal -->
    <div class="modal fade" id="assignSubscriptionModal" tabindex="-1" aria-labelledby="assignSubscriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="assignSubscriptionForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assignSubscriptionModalLabel">Assign Subscription Package</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for Agency ID -->
                        <input type="hidden" id="assignAgencyId" name="agencyId">

                        <!-- Subscription Details -->
                        <div class="mb-3">
                            <label for="subscriptionPackage" class="form-label">Select Package</label>
                            <select class="form-select" id="subscriptionPackage" name="subscriptionPackage" required>
                                <option value="">Select Package</option>
                                <option value="Basic Package">Basic Package</option>
                                <option value="Premium Package">Premium Package</option>
                                <!-- Add more packages as needed -->
                            </select>
                        </div>

                        <!-- Subscription Status -->
                        <div class="mb-3">
                            <label for="subscriptionStatus" class="form-label">Subscription Status</label>
                            <select class="form-select" id="subscriptionStatus" name="subscriptionStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Assign Subscription</button>
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
                    { "orderable": false, "targets": [6, 7] } // Make Subscription Package and Actions columns non-orderable
                ],
                "language": {
                    "search": "Search Agencies:",
                    "lengthMenu": "Show _MENU_ agencies",
                    "info": "Showing _START_ to _END_ of _TOTAL_ agencies"
                }
            });

            // Handle Add Agency Form Submission
            $('#addAgencyForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var agencyData = {};
                formData.forEach(function (field) {
                    agencyData[field.name] = field.value;
                });

                // Basic Frontend Validation for Password
                if (agencyData.agencyPassword.length < 6) {
                    alert('Password must be at least 6 characters long.');
                    return;
                }

                // Generate a new Agency ID (placeholder, should be handled by backend)
                var newId = agencyTable.rows().count() + 1;

                // Determine Subscription Status and Package
                var subscriptionStatus = "Not Subscribed";
                var subscriptionPackage = "N/A";

                // Add new row to DataTable
                agencyTable.row.add([
                    newId,
                    agencyData.agencyName,
                    agencyData.contactPerson,
                    agencyData.agencyEmail,
                    agencyData.agencyPhone,
                    '<span class="badge bg-secondary">Not Subscribed</span>',
                    'N/A',
                    '<button class="btn btn-info btn-sm" onclick="assignSubscription(' + newId + ')" title="Assign Subscription">' +
                        '<i class="mdi mdi-briefcase-check"></i></button> ' +
                        '<button class="btn btn-primary btn-sm" onclick="editAgency(' + newId + ')" title="Edit Agency">' +
                        '<i class="mdi mdi-pencil"></i></button> ' +
                        '<button class="btn btn-success btn-sm" onclick="activateSubscription(' + newId + ')" title="Activate Subscription">' +
                        '<i class="mdi mdi-package-up"></i></button>'
                ]).draw(false);

                // TODO: Send agency data to backend for storage, including hashed password
                // Example using AJAX (requires backend endpoint to handle data securely)
                /*
                $.ajax({
                    url: 'add_agency.php',
                    type: 'POST',
                    data: agencyData,
                    success: function(response) {
                        // Handle success (e.g., show a success message)
                    },
                    error: function(error) {
                        // Handle error (e.g., show an error message)
                    }
                });
                */

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#addAgencyModal').modal('hide');
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

                // Optional Password Reset
                var passwordReset = false;
                if (agencyData.agencyPassword && agencyData.agencyPassword.length > 0) {
                    if (agencyData.agencyPassword.length < 6) {
                        alert('Password must be at least 6 characters long.');
                        return;
                    }
                    passwordReset = true;
                }

                // Get Agency ID
                var agencyId = parseInt(agencyData.agencyId);

                // Find the row in DataTable
                agencyTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update row data (excluding password)
                        this.data([
                            agencyId,
                            agencyData.agencyName,
                            agencyData.contactPerson,
                            agencyData.agencyEmail,
                            agencyData.agencyPhone,
                            data[5], // Keep existing subscription status
                            data[6], // Keep existing subscription package
                            data[7]  // Keep existing action buttons
                        ]).draw(false);
                    }
                });

                // TODO: Send updated agency data to backend, handle password reset if applicable
                // Example using AJAX (requires backend endpoint to handle data securely)
                /*
                $.ajax({
                    url: 'edit_agency.php',
                    type: 'POST',
                    data: agencyData,
                    success: function(response) {
                        // Handle success (e.g., show a success message)
                    },
                    error: function(error) {
                        // Handle error (e.g., show an error message)
                    }
                });
                */

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#editAgencyModal').modal('hide');
            });

            // Handle Assign Subscription Form Submission
            $('#assignSubscriptionForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var subscriptionData = {};
                formData.forEach(function (field) {
                    subscriptionData[field.name] = field.value;
                });

                // Get Agency ID
                var agencyId = parseInt(subscriptionData.agencyId);
                var subscriptionPackage = subscriptionData.subscriptionPackage;
                var subscriptionStatus = subscriptionData.subscriptionStatus;

                // Find the row in DataTable and update subscription details
                agencyTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update Subscription Status
                        var statusBadge = '';
                        if (subscriptionStatus === 'Active') {
                            statusBadge = '<span class="badge bg-success">Active</span>';
                        } else if (subscriptionStatus === 'Inactive') {
                            statusBadge = '<span class="badge bg-warning text-dark">Inactive</span>';
                        } else {
                            statusBadge = '<span class="badge bg-secondary">Not Subscribed</span>';
                        }

                        // Update Subscription Package
                        var packageName = subscriptionStatus === 'Not Subscribed' ? 'N/A' : subscriptionPackage;

                        // Update Actions based on Subscription Status
                        var actions = '<button class="btn btn-info btn-sm" onclick="assignSubscription(' + agencyId + ')" title="Assign/Change Subscription">' +
                            '<i class="mdi mdi-briefcase-check"></i></button> ' +
                            '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit Agency">' +
                            '<i class="mdi mdi-pencil"></i></button> ';

                        if (subscriptionStatus === 'Active') {
                            actions += '<button class="btn btn-danger btn-sm" onclick="deactivateSubscription(' + agencyId + ')" title="Deactivate Subscription">' +
                                '<i class="mdi mdi-package-down"></i></button>';
                        } else if (subscriptionStatus === 'Inactive') {
                            actions += '<button class="btn btn-success btn-sm" onclick="activateSubscription(' + agencyId + ')" title="Activate Subscription">' +
                                '<i class="mdi mdi-package-up"></i></button>';
                        } else {
                            actions += '<button class="btn btn-success btn-sm" onclick="activateSubscription(' + agencyId + ')" title="Activate Subscription">' +
                                '<i class="mdi mdi-package-up"></i></button>';
                        }

                        // Update the row data
                        this.data([
                            data[0],
                            data[1],
                            data[2],
                            data[3],
                            data[4],
                            statusBadge,
                            packageName,
                            actions
                        ]).draw(false);
                    }
                });

                // TODO: Send subscription data to backend for storage
                // Example using AJAX (requires backend endpoint to handle data securely)
                /*
                $.ajax({
                    url: 'assign_subscription.php',
                    type: 'POST',
                    data: subscriptionData,
                    success: function(response) {
                        // Handle success (e.g., show a success message)
                    },
                    error: function(error) {
                        // Handle error (e.g., show an error message)
                    }
                });
                */

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#assignSubscriptionModal').modal('hide');
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
                $('#editAgencyName').val(rowData[1]);
                $('#editContactPerson').val(rowData[2]);
                $('#editAgencyEmail').val(rowData[3]);
                $('#editAgencyPhone').val(rowData[4]);

                // Assuming Address is part of the rowData, adjust index if needed
                // In this table, Address is not displayed, so you might need to fetch it via backend
                // For demonstration, we'll set it as empty or you can modify to include it
                $('#editAgencyAddress').val(''); // Replace with actual address if available

                $('#editAgencyStatus').val(rowData[5].includes('Active') ? 'Active' : 'Inactive');

                // Show the Edit Agency Modal
                $('#editAgencyModal').modal('show');
            }
        }

        // Function to handle Assign Subscription
        function assignSubscription(agencyId) {
            // Populate the assign subscription form with the agency ID
            $('#assignAgencyId').val(agencyId);
            // Show the Assign Subscription Modal
            $('#assignSubscriptionModal').modal('show');
        }

        // Function to deactivate Subscription
        function deactivateSubscription(agencyId) {
            if (confirm('Are you sure you want to deactivate this agency\'s subscription?')) {
                $('#agencyTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update Subscription Status to Inactive
                        data[5] = '<span class="badge bg-warning text-dark">Inactive</span>';
                        // Update Subscription Package to N/A or keep existing
                        data[6] = 'N/A';
                        // Update Action Buttons
                        data[7] = '<button class="btn btn-info btn-sm" onclick="assignSubscription(' + agencyId + ')" title="Assign/Change Subscription">' +
                            '<i class="mdi mdi-briefcase-check"></i></button> ' +
                            '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit Agency">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-success btn-sm" onclick="activateSubscription(' + agencyId + ')" title="Activate Subscription">' +
                            '<i class="mdi mdi-package-up"></i></button>';
                        this.data(data).draw(false);
                    }
                });

                // TODO: Send deactivate subscription request to backend
            }
        }

        // Function to activate Subscription
        function activateSubscription(agencyId) {
            if (confirm('Are you sure you want to activate this agency\'s subscription?')) {
                $('#agencyTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update Subscription Status to Active
                        data[5] = '<span class="badge bg-success">Active</span>';
                        // Assuming the subscription package is already assigned, keep it or set to a default
                        // For demonstration, we'll keep it as is. Adjust as necessary.
                        // data[6] = 'Basic Package'; // Example
                        // Update Action Buttons
                        data[7] = '<button class="btn btn-info btn-sm" onclick="assignSubscription(' + agencyId + ')" title="Assign/Change Subscription">' +
                            '<i class="mdi mdi-briefcase-check"></i></button> ' +
                            '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit Agency">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-danger btn-sm" onclick="deactivateSubscription(' + agencyId + ')" title="Deactivate Subscription">' +
                            '<i class="mdi mdi-package-down"></i></button>';
                        this.data(data).draw(false);
                    }
                });

                // TODO: Send activate subscription request to backend
            }
        }
    </script>
</body>

</html>
