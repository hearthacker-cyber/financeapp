<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Loan Product Management - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Loan Product Management" name="description" />
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

                    <!-- Add New Loan Product Button -->
                    <div class="mb-4">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addLoanProductModal">
                            <i class="mdi mdi-plus-circle me-1"></i> Add New Loan Product
                        </button>
                    </div>

                    <!-- DataTables -->
                    <div class="table-responsive">
                        <table id="loanProductTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Loan Product Name</th>
                                    <th>Category</th>
                                    <th>Interest Rate (%)</th>
                                    <th>Interest Type</th>
                                    <th>Loan Term</th>
                                    <th>Payment Frequency</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td>Personal Loan</td>
                                    <td>Personal Finance</td>
                                    <td>12%</td>
                                    <td>Fixed</td>
                                    <td>12 Months</td>
                                    <td>Monthly</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editLoanProduct(1)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Vehicle Loan</td>
                                    <td>Vehicle Finance</td>
                                    <td>10%</td>
                                    <td>Variable</td>
                                    <td>24 Months</td>
                                    <td>Weekly</td>
                                    <td>Inactive</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editLoanProduct(2)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Home Loan</td>
                                    <td>Real Estate Finance</td>
                                    <td>8%</td>
                                    <td>Fixed</td>
                                    <td>36 Months</td>
                                    <td>Half-yearly</td>
                                    <td>Archived</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editLoanProduct(3)" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
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

    <!-- Add Loan Product Modal -->
    <div class="modal fade" id="addLoanProductModal" tabindex="-1" aria-labelledby="addLoanProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addLoanProductForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLoanProductModalLabel">Add New Loan Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="loanProductName" class="form-label">Loan Product Name</label>
                            <input type="text" class="form-control" id="loanProductName" name="loanProductName" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="interestRate" class="form-label">Interest Rate (%)</label>
                            <input type="number" step="0.01" class="form-control" id="interestRate" name="interestRate" required>
                        </div>
                        <div class="mb-3">
                            <label for="interestType" class="form-label">Interest Type</label>
                            <select class="form-select" id="interestType" name="interestType" required>
                                <option value="">Select Interest Type</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Variable">Variable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="loanTerm" class="form-label">Loan Term</label>
                            <input type="text" class="form-control" id="loanTerm" name="loanTerm" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                            <select class="form-select" id="paymentFrequency" name="paymentFrequency" required>
                                <option value="">Select Frequency</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Half-yearly">Half-yearly</option>
                                <option value="Annually">Annually</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Archived">Archived</option>
                            </select>
                        </div>
                        <!-- Add more fields as necessary -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Loan Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Loan Product Modal -->
    <div class="modal fade" id="editLoanProductModal" tabindex="-1" aria-labelledby="editLoanProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editLoanProductForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLoanProductModalLabel">Edit Loan Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for Loan Product ID -->
                        <input type="hidden" id="editLoanProductId" name="loanProductId">

                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="editLoanProductName" class="form-label">Loan Product Name</label>
                            <input type="text" class="form-control" id="editLoanProductName" name="loanProductName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="editCategory" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="editInterestRate" class="form-label">Interest Rate (%)</label>
                            <input type="number" step="0.01" class="form-control" id="editInterestRate" name="interestRate" required>
                        </div>
                        <div class="mb-3">
                            <label for="editInterestType" class="form-label">Interest Type</label>
                            <select class="form-select" id="editInterestType" name="interestType" required>
                                <option value="">Select Interest Type</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Variable">Variable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editLoanTerm" class="form-label">Loan Term</label>
                            <input type="text" class="form-control" id="editLoanTerm" name="loanTerm" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPaymentFrequency" class="form-label">Payment Frequency</label>
                            <select class="form-select" id="editPaymentFrequency" name="paymentFrequency" required>
                                <option value="">Select Frequency</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Half-yearly">Half-yearly</option>
                                <option value="Annually">Annually</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Archived">Archived</option>
                            </select>
                        </div>
                        <!-- Add more fields as necessary -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Loan Product</button>
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
            // Initialize DataTable with Bootstrap styling
            var table = $('#loanProductTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "language": {
                    "search": "Search Products:",
                    "lengthMenu": "Show _MENU_ products",
                    "info": "Showing _START_ to _END_ of _TOTAL_ products"
                }
            });

            // Handle Add Loan Product Form Submission
            $('#addLoanProductForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var newRowData = {};
                formData.forEach(function (field) {
                    newRowData[field.name] = field.value;
                });

                // Generate a new ID (this is just a placeholder, ideally handled by backend)
                var newId = table.data().count() + 1;

                // Add the new row to the table
                table.row.add([
                    newId,
                    newRowData.loanProductName,
                    newRowData.category,
                    newRowData.interestRate + '%',
                    newRowData.interestType,
                    newRowData.loanTerm,
                    newRowData.paymentFrequency,
                    newRowData.status,
                    generateActionButtons(newId) // Only Edit button
                ]).draw(false);

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#addLoanProductModal').modal('hide');
            });

            // Function to generate action buttons based on status (only Edit button)
            function generateActionButtons(id) {
                var editBtn = '<button class="btn btn-primary btn-sm" onclick="editLoanProduct(' + id + ')" title="Edit">' +
                              '<i class="mdi mdi-pencil"></i>' +
                              '</button>';
                return editBtn;
            }

            // Placeholder function for editing loan product
            window.editLoanProduct = function (id) {
                // Fetch the row data based on ID
                var rowData = table.row(function (idx, data, node) {
                    return data[0] == id;
                }).data();

                if (rowData) {
                    // Populate the edit form with existing data
                    $('#editLoanProductId').val(rowData[0]);
                    $('#editLoanProductName').val(rowData[1]);
                    $('#editCategory').val(rowData[2]);
                    // Remove '%' from interest rate before setting the value
                    $('#editInterestRate').val(parseFloat(rowData[3].replace('%', '')));
                    $('#editInterestType').val(rowData[4]);
                    $('#editLoanTerm').val(rowData[5]);
                    $('#editPaymentFrequency').val(rowData[6]);
                    $('#editStatus').val(rowData[7]);

                    // Show the edit modal
                    $('#editLoanProductModal').modal('show');
                }
            }

            // Handle Edit Loan Product Form Submission
            $('#editLoanProductForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var updatedData = {};
                formData.forEach(function (field) {
                    updatedData[field.name] = field.value;
                });

                var id = updatedData.loanProductId;
                // Find the row to update
                var row = table.row(function (idx, data, node) {
                    return data[0] == id;
                });

                if (row) {
                    // Update the row data
                    row.data([
                        id,
                        updatedData.loanProductName,
                        updatedData.category,
                        updatedData.interestRate + '%',
                        updatedData.interestType,
                        updatedData.loanTerm,
                        updatedData.paymentFrequency,
                        updatedData.status,
                        generateActionButtons(id) // Only Edit button
                    ]).draw(false);

                    // Reset the form and hide the modal
                    $(this)[0].reset();
                    $('#editLoanProductModal').modal('hide');
                }
            });
        });
    </script>
</body>

</html>
