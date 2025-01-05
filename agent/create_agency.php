<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Agency Management - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Managing Agencies" name="description" />
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

                    <!-- Add New Agency Button -->
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
                                    <th>Status</th>
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
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAgency(1)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deactivateAgency(1)" title="Deactivate">
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
                                    <td>Inactive</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAgency(2)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm" onclick="activateAgency(2)" title="Activate">
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

                // Add new row to DataTable (excluding password)
                agencyTable.row.add([
                    newId,
                    agencyData.agencyName,
                    agencyData.contactPerson,
                    agencyData.agencyEmail,
                    agencyData.agencyPhone,
                    agencyData.agencyStatus,
                    '<button class="btn btn-primary btn-sm" onclick="editAgency(' + newId + ')" title="Edit">' +
                    '<i class="mdi mdi-pencil"></i></button> ' +
                    (agencyData.agencyStatus === 'Active' ?
                        '<button class="btn btn-danger btn-sm" onclick="deactivateAgency(' + newId + ')" title="Deactivate">' +
                        '<i class="mdi mdi-package-down"></i></button>' :
                        '<button class="btn btn-success btn-sm" onclick="activateAgency(' + newId + ')" title="Activate">' +
                        '<i class="mdi mdi-package-up"></i></button>')
                ]).draw(false);

                // TODO: Send agency data to backend for storage, including hashed password
                // Example using AJAX (requires backend endpoint to handle data)
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
                        var actions = '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            (agencyData.agencyStatus === 'Active' ?
                                '<button class="btn btn-danger btn-sm" onclick="deactivateAgency(' + agencyId + ')" title="Deactivate">' +
                                '<i class="mdi mdi-package-down"></i></button>' :
                                '<button class="btn btn-success btn-sm" onclick="activateAgency(' + agencyId + ')" title="Activate">' +
                                '<i class="mdi mdi-package-up"></i></button>');
                        this.data([
                            agencyId,
                            agencyData.agencyName,
                            agencyData.contactPerson,
                            agencyData.agencyEmail,
                            agencyData.agencyPhone,
                            agencyData.agencyStatus,
                            actions
                        ]).draw(false);
                    }
                });

                // TODO: Send updated agency data to backend, handle password reset if applicable
                // Example using AJAX (requires backend endpoint to handle data)
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
                $('#editAgencyAddress').val(''); // Address handling needs to be consistent with table data

                $('#editAgencyStatus').val(rowData[5]);

                // Show the Edit Agency Modal
                $('#editAgencyModal').modal('show');
            }
        }

        // Function to deactivate Agency
        function deactivateAgency(agencyId) {
            if (confirm('Are you sure you want to deactivate this agency?')) {
                $('#agencyTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update status to Inactive
                        data[5] = 'Inactive';
                        // Update action buttons to allow activation
                        data[6] = '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-success btn-sm" onclick="activateAgency(' + agencyId + ')" title="Activate">' +
                            '<i class="mdi mdi-package-up"></i></button>';
                        this.data(data).draw(false);
                    }
                });

                // TODO: Send deactivate request to backend
            }
        }

        // Function to activate Agency
        function activateAgency(agencyId) {
            if (confirm('Are you sure you want to activate this agency?')) {
                $('#agencyTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === agencyId) {
                        // Update status to Active
                        data[5] = 'Active';
                        // Update action buttons to allow deactivation
                        data[6] = '<button class="btn btn-primary btn-sm" onclick="editAgency(' + agencyId + ')" title="Edit">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-danger btn-sm" onclick="deactivateAgency(' + agencyId + ')" title="Deactivate">' +
                            '<i class="mdi mdi-package-down"></i></button>';
                        this.data(data).draw(false);
                    }
                });

                // TODO: Send activate request to backend
            }
        }
    </script>
</body>

</html>
