<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Manage Agency Admins - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Managing Agency Admins" name="description" />
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

                    <!-- Add New Admin Button -->
                    <div class="mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                            <i class="mdi mdi-account-plus me-1"></i> Add New Agency Admin
                        </button>
                    </div>

                    <!-- DataTables -->
                    <div class="table-responsive">
                        <table id="adminTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Admin Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td>Alice Johnson</td>
                                    <td>alice.johnson@example.com</td>
                                    <td>9876543210</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAdmin(1)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deactivateAdmin(1)" title="Deactivate">
                                            <i class="mdi mdi-account-off"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Bob Smith</td>
                                    <td>bob.smith@example.com</td>
                                    <td>9123456789</td>
                                    <td>Inactive</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAdmin(2)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm" onclick="activateAdmin(2)" title="Activate">
                                            <i class="mdi mdi-account-check"></i>
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

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addAdminForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAdminModalLabel">Add New Agency Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Basic Admin Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="adminName" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" id="adminName" name="adminName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="adminEmail" name="adminEmail" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="adminContact" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="adminContact" name="adminContact" pattern="\d{10}" title="Enter a 10-digit contact number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="adminStatus" class="form-label">Status</label>
                                <select class="form-select" id="adminStatus" name="adminStatus" required>
                                    <option value="">Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Password (Optional for initial setup) -->
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" minlength="6" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="adminConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="adminConfirmPassword" name="adminConfirmPassword" minlength="6" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Admin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editAdminForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAdminModalLabel">Edit Agency Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for Admin ID -->
                        <input type="hidden" id="editAdminId" name="adminId">

                        <!-- Basic Admin Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editAdminName" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" id="editAdminName" name="adminName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editAdminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editAdminEmail" name="adminEmail" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editAdminContact" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="editAdminContact" name="adminContact" pattern="\d{10}" title="Enter a 10-digit contact number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editAdminStatus" class="form-label">Status</label>
                                <select class="form-select" id="editAdminStatus" name="adminStatus" required>
                                    <option value="">Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Password (Optional for updates) -->
                        <div class="mb-3">
                            <label for="editAdminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editAdminPassword" name="adminPassword" minlength="6" placeholder="Leave blank to keep existing password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="editAdminConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="editAdminConfirmPassword" name="adminConfirmPassword" minlength="6" placeholder="Leave blank to keep existing password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Admin</button>
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
            // Initialize DataTable for Agency Admins
            var adminTable = $('#adminTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": -1 } // Make Actions column non-orderable
                ],
                "language": {
                    "search": "Search Admins:",
                    "lengthMenu": "Show _MENU_ admins",
                    "info": "Showing _START_ to _END_ of _TOTAL_ admins"
                }
            });

            // Handle Add Admin Form Submission
            $('#addAdminForm').on('submit', function (e) {
                e.preventDefault();
                // Validate Passwords
                var password = $('#adminPassword').val();
                var confirmPassword = $('#adminConfirmPassword').val();
                if (password !== confirmPassword) {
                    alert('Passwords do not match.');
                    return;
                }

                // Collect form data
                var formData = $(this).serializeArray();
                var adminData = {};
                formData.forEach(function (field) {
                    adminData[field.name] = field.value;
                });

                // Generate a new Admin ID (placeholder, should be handled by backend)
                var newId = adminTable.rows().count() + 1;

                // Add new row to DataTable
                adminTable.row.add([
                    newId,
                    adminData.adminName,
                    adminData.adminEmail,
                    adminData.adminContact,
                    adminData.adminStatus,
                    '<button class="btn btn-primary btn-sm" onclick="editAdmin(' + newId + ')" title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                    ' <button class="btn btn-danger btn-sm" onclick="deactivateAdmin(' + newId + ')" title="Deactivate"><i class="mdi mdi-account-off"></i></button>'
                ]).draw(false);

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#addAdminModal').modal('hide');
            });

            // Handle Edit Admin Form Submission
            $('#editAdminForm').on('submit', function (e) {
                e.preventDefault();
                // Validate Passwords if fields are filled
                var password = $('#editAdminPassword').val();
                var confirmPassword = $('#editAdminConfirmPassword').val();
                if (password || confirmPassword) {
                    if (password !== confirmPassword) {
                        alert('Passwords do not match.');
                        return;
                    }
                }

                // Collect form data
                var formData = $(this).serializeArray();
                var adminData = {};
                formData.forEach(function (field) {
                    adminData[field.name] = field.value;
                });

                // Get Admin ID
                var adminId = parseInt(adminData.adminId);

                // Find the row in DataTable
                adminTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === adminId) {
                        // Update row data
                        var actions = '<button class="btn btn-primary btn-sm" onclick="editAdmin(' + adminId + ')" title="Edit"><i class="mdi mdi-pencil"></i></button> ' +
                                      '<button class="btn btn-danger btn-sm" onclick="deactivateAdmin(' + adminId + ')" title="Deactivate"><i class="mdi mdi-account-off"></i></button>';
                        this.data([
                            adminId,
                            adminData.adminName,
                            adminData.adminEmail,
                            adminData.adminContact,
                            adminData.adminStatus,
                            actions
                        ]).draw(false);
                    }
                });

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#editAdminModal').modal('hide');
            });
        });

        // Function to handle Edit Admin
        function editAdmin(adminId) {
            // Find the row data based on adminId
            var rowData = null;
            $('#adminTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                var data = this.data();
                if (parseInt(data[0]) === adminId) {
                    rowData = data;
                }
            });

            if (rowData) {
                // Populate the edit form with existing data
                $('#editAdminId').val(rowData[0]);
                $('#editAdminName').val(rowData[1]);
                $('#editAdminEmail').val(rowData[2]);
                $('#editAdminContact').val(rowData[3]);
                $('#editAdminStatus').val(rowData[4]);
                $('#editAdminPassword').val('');
                $('#editAdminConfirmPassword').val('');

                // Show the Edit Admin Modal
                $('#editAdminModal').modal('show');
            }
        }

        // Function to deactivate Admin
        function deactivateAdmin(adminId) {
            if (confirm('Are you sure you want to deactivate this admin?')) {
                $('#adminTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === adminId) {
                        // Update status to Inactive
                        data[4] = 'Inactive';
                        // Update action buttons to allow activation
                        data[5] = '<button class="btn btn-primary btn-sm" onclick="editAdmin(' + adminId + ')" title="Edit"><i class="mdi mdi-pencil"></i></button> ' +
                                  '<button class="btn btn-success btn-sm" onclick="activateAdmin(' + adminId + ')" title="Activate"><i class="mdi mdi-account-check"></i></button>';
                        this.data(data).draw(false);
                    }
                });
            }
        }

        // Function to activate Admin
        function activateAdmin(adminId) {
            if (confirm('Are you sure you want to activate this admin?')) {
                $('#adminTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === adminId) {
                        // Update status to Active
                        data[4] = 'Active';
                        // Update action buttons to allow deactivation
                        data[5] = '<button class="btn btn-primary btn-sm" onclick="editAdmin(' + adminId + ')" title="Edit"><i class="mdi mdi-pencil"></i></button> ' +
                                  '<button class="btn btn-danger btn-sm" onclick="deactivateAdmin(' + adminId + ')" title="Deactivate"><i class="mdi mdi-account-off"></i></button>';
                        this.data(data).draw(false);
                    }
                });
            }
        }
    </script>
</body>

</html>
