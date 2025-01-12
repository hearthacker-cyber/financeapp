<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Subscription Packages - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Managing Subscription Packages" name="description" />
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

                    <!-- Add New Package Button -->
                    <div class="mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPackageModal">
                            <i class="mdi mdi-plus-circle-outline me-1"></i> Add New Package
                        </button>
                    </div>

                    <!-- DataTables -->
                    <div class="table-responsive">
                        <table id="packageTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Package Name</th>
                                    <th>Description</th>
                                    <th>Features</th>
                                    <th>Pricing (₹)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td>Basic Package</td>
                                    <td>Essential features for starting agencies.</td>
                                    <td>
                                        <ul>
                                            <li>Loan Management</li>
                                            <li>Customer Management</li>
                                            <li>Payment Scheduling</li>
                                        </ul>
                                    </td>
                                    <td>₹10,000/month</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editPackage(1)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deactivatePackage(1)" title="Deactivate">
                                            <i class="mdi mdi-package-down"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Premium Package</td>
                                    <td>Advanced features for growing agencies.</td>
                                    <td>
                                        <ul>
                                            <li>All Basic Features</li>
                                            <li>Automated Communications</li>
                                            <li>System Monitoring</li>
                                        </ul>
                                    </td>
                                    <td>₹20,000/month</td>
                                    <td>Inactive</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editPackage(2)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm" onclick="activatePackage(2)" title="Activate">
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

    <!-- Add Package Modal -->
    <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addPackageForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPackageModalLabel">Add New Subscription Package</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Basic Package Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="packageName" class="form-label">Package Name</label>
                                <input type="text" class="form-control" id="packageName" name="packageName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="packagePricing" class="form-label">Pricing (₹)</label>
                                <input type="number" step="0.01" class="form-control" id="packagePricing" name="packagePricing" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="packageDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="packageDescription" name="packageDescription" rows="3" required></textarea>
                        </div>

                        <!-- Features -->
                        <div class="mb-3">
                            <label for="packageFeatures" class="form-label">Features</label>
                            <textarea class="form-control" id="packageFeatures" name="packageFeatures" rows="3" placeholder="Enter features separated by commas (e.g., Feature 1, Feature 2)" required></textarea>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="packageStatus" class="form-label">Status</label>
                            <select class="form-select" id="packageStatus" name="packageStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Package</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Package Modal -->
    <div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="editPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editPackageForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPackageModalLabel">Edit Subscription Package</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for Package ID -->
                        <input type="hidden" id="editPackageId" name="packageId">

                        <!-- Basic Package Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editPackageName" class="form-label">Package Name</label>
                                <input type="text" class="form-control" id="editPackageName" name="packageName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editPackagePricing" class="form-label">Pricing (₹)</label>
                                <input type="number" step="0.01" class="form-control" id="editPackagePricing" name="packagePricing" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="editPackageDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editPackageDescription" name="packageDescription" rows="3" required></textarea>
                        </div>

                        <!-- Features -->
                        <div class="mb-3">
                            <label for="editPackageFeatures" class="form-label">Features</label>
                            <textarea class="form-control" id="editPackageFeatures" name="packageFeatures" rows="3" placeholder="Enter features separated by commas (e.g., Feature 1, Feature 2)" required></textarea>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="editPackageStatus" class="form-label">Status</label>
                            <select class="form-select" id="editPackageStatus" name="packageStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Package</button>
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
            // Initialize DataTable for Subscription Packages
            var packageTable = $('#packageTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": -1 } // Make Actions column non-orderable
                ],
                "language": {
                    "search": "Search Packages:",
                    "lengthMenu": "Show _MENU_ packages",
                    "info": "Showing _START_ to _END_ of _TOTAL_ packages"
                }
            });

            // Handle Add Package Form Submission
            $('#addPackageForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var packageData = {};
                formData.forEach(function (field) {
                    packageData[field.name] = field.value;
                });

                // Parse features into an array
                var featuresArray = packageData.packageFeatures.split(',').map(function (feature) {
                    return feature.trim();
                });

                // Generate a new Package ID (placeholder, should be handled by backend)
                var newId = packageTable.rows().count() + 1;

                // Create HTML for features list
                var featuresHTML = '<ul>';
                featuresArray.forEach(function (feature) {
                    featuresHTML += '<li>' + feature + '</li>';
                });
                featuresHTML += '</ul>';

                // Add new row to DataTable
                packageTable.row.add([
                    newId,
                    packageData.packageName,
                    packageData.packageDescription,
                    featuresHTML,
                    '₹' + parseFloat(packageData.packagePricing).toLocaleString(),
                    packageData.packageStatus,
                    '<button class="btn btn-primary btn-sm" onclick="editPackage(' + newId + ')" title="Edit">' +
                    '<i class="mdi mdi-pencil"></i></button> ' +
                    (packageData.packageStatus === 'Active' ?
                        '<button class="btn btn-danger btn-sm" onclick="deactivatePackage(' + newId + ')" title="Deactivate">' +
                        '<i class="mdi mdi-package-down"></i></button>' :
                        '<button class="btn btn-success btn-sm" onclick="activatePackage(' + newId + ')" title="Activate">' +
                        '<i class="mdi mdi-package-up"></i></button>')
                ]).draw(false);

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#addPackageModal').modal('hide');
            });

            // Handle Edit Package Form Submission
            $('#editPackageForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var packageData = {};
                formData.forEach(function (field) {
                    packageData[field.name] = field.value;
                });

                // Parse features into an array
                var featuresArray = packageData.packageFeatures.split(',').map(function (feature) {
                    return feature.trim();
                });

                // Create HTML for features list
                var featuresHTML = '<ul>';
                featuresArray.forEach(function (feature) {
                    featuresHTML += '<li>' + feature + '</li>';
                });
                featuresHTML += '</ul>';

                // Get Package ID
                var packageId = parseInt(packageData.packageId);

                // Find the row in DataTable
                packageTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === packageId) {
                        // Update row data
                        var actions = '<button class="btn btn-primary btn-sm" onclick="editPackage(' + packageId + ')" title="Edit">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            (packageData.packageStatus === 'Active' ?
                                '<button class="btn btn-danger btn-sm" onclick="deactivatePackage(' + packageId + ')" title="Deactivate">' +
                                '<i class="mdi mdi-package-down"></i></button>' :
                                '<button class="btn btn-success btn-sm" onclick="activatePackage(' + packageId + ')" title="Activate">' +
                                '<i class="mdi mdi-package-up"></i></button>');
                        this.data([
                            packageId,
                            packageData.packageName,
                            packageData.packageDescription,
                            featuresHTML,
                            '₹' + parseFloat(packageData.packagePricing).toLocaleString(),
                            packageData.packageStatus,
                            actions
                        ]).draw(false);
                    }
                });

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#editPackageModal').modal('hide');
            });
        });

        // Function to handle Edit Package
        function editPackage(packageId) {
            // Find the row data based on packageId
            var rowData = null;
            $('#packageTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                var data = this.data();
                if (parseInt(data[0]) === packageId) {
                    rowData = data;
                }
            });

            if (rowData) {
                // Populate the edit form with existing data
                $('#editPackageId').val(rowData[0]);
                $('#editPackageName').val(rowData[1]);
                $('#editPackageDescription').val(rowData[2]);

                // Extract features from HTML list
                var featuresText = $(rowData[3]).find('li').map(function () {
                    return $(this).text();
                }).get().join(', ');
                $('#editPackageFeatures').val(featuresText);

                // Extract pricing by removing '₹' and formatting
                var pricing = rowData[4].replace('₹', '').replace(/,/g, '');
                $('#editPackagePricing').val(parseFloat(pricing));

                $('#editPackageStatus').val(rowData[5]);

                // Show the Edit Package Modal
                $('#editPackageModal').modal('show');
            }
        }

        // Function to deactivate Package
        function deactivatePackage(packageId) {
            if (confirm('Are you sure you want to deactivate this package?')) {
                $('#packageTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === packageId) {
                        // Update status to Inactive
                        data[5] = 'Inactive';
                        // Update action buttons to allow activation
                        data[6] = '<button class="btn btn-primary btn-sm" onclick="editPackage(' + packageId + ')" title="Edit">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-success btn-sm" onclick="activatePackage(' + packageId + ')" title="Activate">' +
                            '<i class="mdi mdi-package-up"></i></button>';
                        this.data(data).draw(false);
                    }
                });
            }
        }

        // Function to activate Package
        function activatePackage(packageId) {
            if (confirm('Are you sure you want to activate this package?')) {
                $('#packageTable').DataTable().rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === packageId) {
                        // Update status to Active
                        data[5] = 'Active';
                        // Update action buttons to allow deactivation
                        data[6] = '<button class="btn btn-primary btn-sm" onclick="editPackage(' + packageId + ')" title="Edit">' +
                            '<i class="mdi mdi-pencil"></i></button> ' +
                            '<button class="btn btn-danger btn-sm" onclick="deactivatePackage(' + packageId + ')" title="Deactivate">' +
                            '<i class="mdi mdi-package-down"></i></button>';
                        this.data(data).draw(false);
                    }
                });
            }
        }
    </script>
</body>

</html>
