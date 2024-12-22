<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Customer Management - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Customer Management" name="description" />
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

                    <!-- Add New Customer Button -->
                    <div class="mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                            <i class="mdi mdi-account-plus me-1"></i> Add New Customer
                        </button>
                    </div>

                    <!-- DataTables -->
                    <div class="table-responsive">
                        <table id="customerTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Contact Number</th>
                                    <th>Alternate Contact</th>
                                    <th>Nominee Name</th>
                                    <th>Nominee Contact</th>
                                    <th>Loan Product</th>
                                    <th>Vehicle Details</th>
                                    <th>Home Loan Details</th>
                                    <th>Aadhaar Number</th>
                                    <th>Total Amount</th>
                                    <th>Interest Rate (%)</th>
                                    <th>Duration</th>
                                    <th>Payment Frequency</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>9876543210</td>
                                    <td>9123456780</td>
                                    <td>Jane Doe</td>
                                    <td>9988776655</td>
                                    <td>Personal Loan</td>
                                    <td></td>
                                    <td></td>
                                    <td>123456789012</td>
                                    <td>500000</td>
                                    <td>12%</td>
                                    <td>12 Months</td>
                                    <td>Monthly</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm me-2" onclick="editCustomer(1)" title="Edit" aria-label="Edit Customer 1">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" onclick="viewPayments(1)" title="View Payments" aria-label="View Payments for Customer 1">
                                            <i class="mdi mdi-calendar-text"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mary Smith</td>
                                    <td>9123456789</td>
                                    <td>9876543210</td>
                                    <td>Mark Smith</td>
                                    <td>9123456780</td>
                                    <td>Vehicle Loan</td>
                                    <td>Honda Civic, 2020</td>
                                    <td></td>
                                    <td></td>
                                    <td>750000</td>
                                    <td>10%</td>
                                    <td>24 Months</td>
                                    <td>Weekly</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm me-2" onclick="editCustomer(2)" title="Edit" aria-label="Edit Customer 2">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" onclick="viewPayments(2)" title="View Payments" aria-label="View Payments for Customer 2">
                                            <i class="mdi mdi-calendar-text"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Robert Brown</td>
                                    <td>9988776655</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Home Loan</td>
                                    <td></td>
                                    <td>123 Main St, Springfield</td>
                                    <td></td>
                                    <td>1000000</td>
                                    <td>8%</td>
                                    <td>36 Months</td>
                                    <td>Half-yearly</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm me-2" onclick="editCustomer(3)" title="Edit" aria-label="Edit Customer 3">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" onclick="viewPayments(3)" title="View Payments" aria-label="View Payments for Customer 3">
                                            <i class="mdi mdi-calendar-text"></i>
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

    <!-- Toast Container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055">
        <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage">
                    <!-- Message will be inserted here -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Payment Calendar Modal -->
    <div class="modal fade" id="paymentCalendarModal" tabindex="-1" aria-labelledby="paymentCalendarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Schedule for <span id="paymentCustomerName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Payment Schedule Table -->
                    <table id="paymentTable" class="table table-bordered table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Payment rows will be populated dynamically -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Add more actions if necessary -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addCustomerForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Basic Customer Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="customerName" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="customerName" name="customerName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" pattern="\d{10}" title="Enter a 10-digit contact number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="alternateContactNumber" class="form-label">Alternate Contact Number</label>
                                <input type="tel" class="form-control" id="alternateContactNumber" name="alternateContactNumber" pattern="\d{10}" title="Enter a 10-digit contact number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nomineeName" class="form-label">Nominee Name</label>
                                <input type="text" class="form-control" id="nomineeName" name="nomineeName">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nomineeContact" class="form-label">Nominee Contact Number</label>
                                <input type="tel" class="form-control" id="nomineeContact" name="nomineeContact" pattern="\d{10}" title="Enter a 10-digit contact number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="loanProduct" class="form-label">Loan Product</label>
                                <select class="form-select" id="loanProduct" name="loanProduct" required>
                                    <option value="">Select Loan Product</option>
                                    <!-- Options will be populated dynamically -->
                                </select>
                            </div>
                        </div>

                        <!-- Dynamic Fields Based on Loan Product -->
                        <div id="dynamicFields"></div>

                        <!-- Total Distribution Amount -->
                        <div class="mb-3">
                            <label for="totalAmount" class="form-label">Total Distribution Amount</label>
                            <input type="number" step="0.01" class="form-control" id="totalAmount" name="totalAmount" required>
                        </div>

                        <!-- Auto-Filled Loan Details -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="autoInterestRate" class="form-label">Interest Rate (%)</label>
                                <input type="text" class="form-control" id="autoInterestRate" name="autoInterestRate" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="autoDuration" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="autoDuration" name="autoDuration" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="autoPaymentFrequency" class="form-label">Payment Frequency</label>
                                <input type="text" class="form-control" id="autoPaymentFrequency" name="autoPaymentFrequency" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Customer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Customer Modal -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editCustomerForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for Customer ID -->
                        <input type="hidden" id="editCustomerId" name="customerId">

                        <!-- Basic Customer Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editCustomerName" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="editCustomerName" name="customerName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editContactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="editContactNumber" name="contactNumber" pattern="\d{10}" title="Enter a 10-digit contact number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editAlternateContactNumber" class="form-label">Alternate Contact Number</label>
                                <input type="tel" class="form-control" id="editAlternateContactNumber" name="alternateContactNumber" pattern="\d{10}" title="Enter a 10-digit contact number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editNomineeName" class="form-label">Nominee Name</label>
                                <input type="text" class="form-control" id="editNomineeName" name="nomineeName">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editNomineeContact" class="form-label">Nominee Contact Number</label>
                                <input type="tel" class="form-control" id="editNomineeContact" name="nomineeContact" pattern="\d{10}" title="Enter a 10-digit contact number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editLoanProduct" class="form-label">Loan Product</label>
                                <select class="form-select" id="editLoanProduct" name="loanProduct" required>
                                    <option value="">Select Loan Product</option>
                                    <!-- Options will be populated dynamically -->
                                </select>
                            </div>
                        </div>

                        <!-- Dynamic Fields Based on Loan Product -->
                        <div id="editDynamicFields"></div>

                        <!-- Total Distribution Amount -->
                        <div class="mb-3">
                            <label for="editTotalAmount" class="form-label">Total Distribution Amount</label>
                            <input type="number" step="0.01" class="form-control" id="editTotalAmount" name="totalAmount" required>
                        </div>

                        <!-- Auto-Filled Loan Details -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="editAutoInterestRate" class="form-label">Interest Rate (%)</label>
                                <input type="text" class="form-control" id="editAutoInterestRate" name="autoInterestRate" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="editAutoDuration" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="editAutoDuration" name="autoDuration" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="editAutoPaymentFrequency" class="form-label">Payment Frequency</label>
                                <input type="text" class="form-control" id="editAutoPaymentFrequency" name="autoPaymentFrequency" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Customer</button>
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
            // Initialize loanProducts array (This should ideally be fetched from backend)
            var loanProducts = [
                {
                    id: 1,
                    name: "Personal Loan",
                    category: "Personal Finance",
                    interestRate: 12,
                    interestType: "Fixed",
                    loanTerm: "12 Months",
                    paymentFrequency: "Monthly",
                    status: "Active"
                },
                {
                    id: 2,
                    name: "Vehicle Loan",
                    category: "Vehicle Finance",
                    interestRate: 10,
                    interestType: "Variable",
                    loanTerm: "24 Months",
                    paymentFrequency: "Weekly",
                    status: "Inactive"
                },
                {
                    id: 3,
                    name: "Home Loan",
                    category: "Real Estate Finance",
                    interestRate: 8,
                    interestType: "Fixed",
                    loanTerm: "36 Months",
                    paymentFrequency: "Half-yearly",
                    status: "Archived"
                }
                // Add more loan products as needed
            ];

            // Initialize DataTable for Customers
            var customerTable = $('#customerTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": -1 } // Make Actions column non-orderable
                ],
                "language": {
                    "search": "Search Customers:",
                    "lengthMenu": "Show _MENU_ customers",
                    "info": "Showing _START_ to _END_ of _TOTAL_ customers"
                }
            });

            // Function to populate Loan Product dropdown
            function populateLoanProductDropdown(selectElement) {
                selectElement.empty();
                selectElement.append('<option value="">Select Loan Product</option>');
                loanProducts.forEach(function (product) {
                    selectElement.append('<option value="' + product.id + '">' + product.name + '</option>');
                });
            }

            // Populate Loan Product dropdown in Add Customer Modal
            populateLoanProductDropdown($('#loanProduct'));

            // Populate Loan Product dropdown in Edit Customer Modal
            populateLoanProductDropdown($('#editLoanProduct'));

            // Function to generate action buttons based on status (Edit and View Payments buttons)
            function generateActionButtons(id) {
                var editBtn = '<button class="btn btn-primary btn-sm me-2" onclick="editCustomer(' + id + ')" title="Edit" aria-label="Edit Customer ' + id + '">' +
                              '<i class="mdi mdi-pencil" aria-hidden="true"></i>' +
                              '</button>';
                var viewPaymentsBtn = '<button class="btn btn-info btn-sm" onclick="viewPayments(' + id + ')" title="View Payments" aria-label="View Payments for Customer ' + id + '">' +
                                      '<i class="mdi mdi-calendar-text"></i>' +
                                      '</button>';
                return editBtn + viewPaymentsBtn;
            }

            // Handle Add Customer Form Submission
            $('#addCustomerForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var customerData = {};
                formData.forEach(function (field) {
                    customerData[field.name] = field.value;
                });

                // Get loan product details
                var selectedLoanProduct = loanProducts.find(function (p) { return p.id == customerData.loanProduct; });

                // Determine dynamic fields based on loan product category
                var vehicleDetails = '';
                var homeLoanDetails = '';
                var aadhaarNumber = '';

                if (selectedLoanProduct.category === 'Vehicle Finance') {
                    vehicleDetails = customerData.vehicleDetails || '';
                } else if (selectedLoanProduct.category === 'Real Estate Finance') {
                    homeLoanDetails = customerData.homeLoanDetails || '';
                } else if (selectedLoanProduct.category === 'Personal Finance') {
                    aadhaarNumber = customerData.aadhaarNumber || '';
                }

                // Generate a new Customer ID (placeholder, should be handled by backend)
                var newId = customerTable.rows().count() + 1;

                // Add new row to DataTable
                customerTable.row.add([
                    newId,
                    customerData.customerName,
                    customerData.contactNumber,
                    customerData.alternateContactNumber,
                    customerData.nomineeName,
                    customerData.nomineeContact,
                    selectedLoanProduct.name,
                    vehicleDetails,
                    homeLoanDetails,
                    aadhaarNumber,
                    customerData.totalAmount,
                    selectedLoanProduct.interestRate + '%',
                    selectedLoanProduct.loanTerm,
                    selectedLoanProduct.paymentFrequency,
                    generateActionButtons(newId) // Edit and View Payments buttons
                ]).draw(false);

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#dynamicFields').empty();
                $('#autoInterestRate').val('');
                $('#autoDuration').val('');
                $('#autoPaymentFrequency').val('');
                $('#addCustomerModal').modal('hide');

                // Show success notification
                showToast('Customer added successfully!', 'success');
            });

            // Handle Edit Customer Form Submission
            window.editCustomer = function (customerId) {
                // Find the row data based on customerId
                var rowData = null;
                customerTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === customerId) {
                        rowData = data;
                    }
                });

                if (rowData) {
                    // Populate the edit form with existing data
                    $('#editCustomerId').val(rowData[0]);
                    $('#editCustomerName').val(rowData[1]);
                    $('#editContactNumber').val(rowData[2]);
                    $('#editAlternateContactNumber').val(rowData[3]);
                    $('#editNomineeName').val(rowData[4]);
                    $('#editNomineeContact').val(rowData[5]);

                    // Set Loan Product selection
                    var loanProduct = loanProducts.find(function (p) { return p.name === rowData[6]; });
                    var loanProductId = loanProduct ? loanProduct.id : '';
                    $('#editLoanProduct').val(loanProductId).trigger('change');

                    // Populate dynamic fields based on loan product category
                    var selectedProduct = loanProducts.find(function (p) { return p.id === loanProductId; });

                    if (selectedProduct) {
                        if (selectedProduct.category === 'Vehicle Finance') {
                            $('#editVehicleDetails').val(rowData[7]);
                        } else if (selectedProduct.category === 'Real Estate Finance') {
                            $('#editHomeLoanDetails').val(rowData[8]);
                        } else if (selectedProduct.category === 'Personal Finance') {
                            $('#editAadhaarNumber').val(rowData[9]);
                        }
                    }

                    $('#editTotalAmount').val(rowData[10]);
                    $('#editAutoInterestRate').val(rowData[11]);
                    $('#editAutoDuration').val(rowData[12]);
                    $('#editAutoPaymentFrequency').val(rowData[13]);

                    // Show the Edit Customer Modal
                    $('#editCustomerModal').modal('show');
                }
            }

            $('#editCustomerForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serializeArray();
                var customerData = {};
                formData.forEach(function (field) {
                    customerData[field.name] = field.value;
                });

                // Get loan product details
                var selectedLoanProduct = loanProducts.find(function (p) { return p.id == customerData.loanProduct; });

                // Determine dynamic fields based on loan product category
                var vehicleDetails = '';
                var homeLoanDetails = '';
                var aadhaarNumber = '';

                if (selectedLoanProduct.category === 'Vehicle Finance') {
                    vehicleDetails = customerData.editVehicleDetails || '';
                } else if (selectedLoanProduct.category === 'Real Estate Finance') {
                    homeLoanDetails = customerData.editHomeLoanDetails || '';
                } else if (selectedLoanProduct.category === 'Personal Finance') {
                    aadhaarNumber = customerData.editAadhaarNumber || '';
                }

                // Get Customer ID
                var customerId = parseInt(customerData.customerId);

                // Find the row in DataTable
                customerTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === customerId) {
                        // Update row data
                        this.data([
                            customerId,
                            customerData.editCustomerName,
                            customerData.editContactNumber,
                            customerData.editAlternateContactNumber,
                            customerData.editNomineeName,
                            customerData.editNomineeContact,
                            selectedLoanProduct.name,
                            vehicleDetails,
                            homeLoanDetails,
                            aadhaarNumber,
                            customerData.editTotalAmount,
                            selectedLoanProduct.interestRate + '%',
                            selectedLoanProduct.loanTerm,
                            selectedLoanProduct.paymentFrequency,
                            generateActionButtons(customerId) // Edit and View Payments buttons
                        ]).draw(false);
                    }
                });

                // Reset the form and hide the modal
                $(this)[0].reset();
                $('#editDynamicFields').empty();
                $('#editAutoInterestRate').val('');
                $('#editAutoDuration').val('');
                $('#editAutoPaymentFrequency').val('');
                $('#editCustomerModal').modal('hide');

                // Show success notification
                showToast('Customer updated successfully!', 'success');
            });

            // Function to handle Loan Product selection in Add Customer Modal
            $('#loanProduct').on('change', function () {
                var selectedId = parseInt($(this).val());
                var selectedProduct = loanProducts.find(function (p) { return p.id === selectedId; });

                if (selectedProduct) {
                    // Auto-fill loan details
                    $('#autoInterestRate').val(selectedProduct.interestRate + '%');
                    $('#autoDuration').val(selectedProduct.loanTerm);
                    $('#autoPaymentFrequency').val(selectedProduct.paymentFrequency);

                    // Display additional fields based on category
                    var dynamicFields = $('#dynamicFields');
                    dynamicFields.empty(); // Clear previous fields

                    if (selectedProduct.category === 'Vehicle Finance') {
                        dynamicFields.append(`
                            <div class="mb-3">
                                <label for="vehicleDetails" class="form-label">Vehicle Details</label>
                                <input type="text" class="form-control" id="vehicleDetails" name="vehicleDetails" placeholder="e.g., Make, Model, Year" required>
                            </div>
                        `);
                    } else if (selectedProduct.category === 'Real Estate Finance') {
                        dynamicFields.append(`
                            <div class="mb-3">
                                <label for="homeLoanDetails" class="form-label">Home Loan Details</label>
                                <textarea class="form-control" id="homeLoanDetails" name="homeLoanDetails" rows="3" placeholder="Enter details about the property" required></textarea>
                            </div>
                        `);
                    } else if (selectedProduct.category === 'Personal Finance') {
                        dynamicFields.append(`
                            <div class="mb-3">
                                <label for="aadhaarNumber" class="form-label">Aadhaar Number</label>
                                <input type="text" class="form-control" id="aadhaarNumber" name="aadhaarNumber" pattern="\\d{12}" title="Enter a 12-digit Aadhaar number" required>
                            </div>
                        `);
                    }
                } else {
                    // Clear auto-filled fields and dynamic fields if no product is selected
                    $('#autoInterestRate').val('');
                    $('#autoDuration').val('');
                    $('#autoPaymentFrequency').val('');
                    $('#dynamicFields').empty();
                }
            });

            // Function to handle Loan Product selection in Edit Customer Modal
            $('#editLoanProduct').on('change', function () {
                var selectedId = parseInt($(this).val());
                var selectedProduct = loanProducts.find(function (p) { return p.id === selectedId; });

                if (selectedProduct) {
                    // Auto-fill loan details
                    $('#editAutoInterestRate').val(selectedProduct.interestRate + '%');
                    $('#editAutoDuration').val(selectedProduct.loanTerm);
                    $('#editAutoPaymentFrequency').val(selectedProduct.paymentFrequency);

                    // Display additional fields based on category
                    var dynamicFields = $('#editDynamicFields');
                    dynamicFields.empty(); // Clear previous fields

                    if (selectedProduct.category === 'Vehicle Finance') {
                        dynamicFields.append(`
                            <div class="mb-3">
                                <label for="editVehicleDetails" class="form-label">Vehicle Details</label>
                                <input type="text" class="form-control" id="editVehicleDetails" name="editVehicleDetails" placeholder="e.g., Make, Model, Year" required>
                            </div>
                        `);
                    } else if (selectedProduct.category === 'Real Estate Finance') {
                        dynamicFields.append(`
                            <div class="mb-3">
                                <label for="editHomeLoanDetails" class="form-label">Home Loan Details</label>
                                <textarea class="form-control" id="editHomeLoanDetails" name="editHomeLoanDetails" rows="3" placeholder="Enter details about the property" required></textarea>
                            </div>
                        `);
                    } else if (selectedProduct.category === 'Personal Finance') {
                        dynamicFields.append(`
                            <div class="mb-3">
                                <label for="editAadhaarNumber" class="form-label">Aadhaar Number</label>
                                <input type="text" class="form-control" id="editAadhaarNumber" name="editAadhaarNumber" pattern="\\d{12}" title="Enter a 12-digit Aadhaar number" required>
                            </div>
                        `);
                    }
                } else {
                    // Clear auto-filled fields and dynamic fields if no product is selected
                    $('#editAutoInterestRate').val('');
                    $('#editAutoDuration').val('');
                    $('#editAutoPaymentFrequency').val('');
                    $('#editDynamicFields').empty();
                }
            });

            // Function to view payments for a specific customer
            window.viewPayments = function(customerId) {
                // Fetch the customer data from the DataTable
                var rowData = null;
                customerTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === customerId) {
                        rowData = data;
                    }
                });

                if (rowData) {
                    // Populate the customer name in the modal title
                    $('#paymentCustomerName').text(rowData[1]);

                    // Fetch loan product details based on the customer's loan product
                    var loanProduct = loanProducts.find(function (p) { return p.name === rowData[6]; });

                    if (loanProduct) {
                        // Generate payment schedule
                        var paymentSchedule = generatePaymentSchedule(loanProduct, parseFloat(rowData[10]), parseInt(rowData[12]));

                        // Populate the payment schedule table
                        var paymentTableBody = $('#paymentTable tbody');
                        paymentTableBody.empty(); // Clear existing rows

                        paymentSchedule.forEach(function (payment, index) {
                            var statusText = payment.status;
                            var updatedAtText = payment.updatedAt ? payment.updatedAt : '-';
                            var actionBtn = '';

                            if (payment.status === 'Paid') {
                                actionBtn = '<button class="btn btn-warning btn-sm" onclick="markAsNotPaid(' + customerId + ', ' + payment.id + ')" title="Mark as Not Paid" aria-label="Mark Payment ' + payment.id + ' as Not Paid">' +
                                            '<i class="mdi mdi-undo"></i> Undo' +
                                            '</button>';
                            } else {
                                actionBtn = '<button class="btn btn-success btn-sm" onclick="markAsPaid(' + customerId + ', ' + payment.id + ')" title="Mark as Paid" aria-label="Mark Payment ' + payment.id + ' as Paid">' +
                                            '<i class="mdi mdi-check"></i> Paid' +
                                            '</button>';
                            }

                            paymentTableBody.append(`
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${payment.date}</td>
                                    <td>${payment.amount}</td>
                                    <td>${statusText}</td>
                                    <td>${updatedAtText}</td>
                                    <td>${actionBtn}</td>
                                </tr>
                            `);
                        });

                        // Show the payment calendar modal
                        $('#paymentCalendarModal').modal('show');
                    } else {
                        showToast('Loan product details not found for this customer.', 'danger');
                    }
                } else {
                    showToast('Customer data not found.', 'danger');
                }
            }

            // Function to generate payment schedule
            function generatePaymentSchedule(loanProduct, totalAmount, duration) {
                var paymentFrequency = loanProduct.paymentFrequency.toLowerCase(); // e.g., monthly, weekly
                var loanTermMonths = duration; // Assuming duration is in Months

                var numberOfPayments;
                var intervalDays;

                switch(paymentFrequency) {
                    case 'daily':
                        numberOfPayments = loanTermMonths * 30; // Approximation
                        intervalDays = 1;
                        break;
                    case 'weekly':
                        numberOfPayments = loanTermMonths * 4; // Approximation
                        intervalDays = 7;
                        break;
                    case 'monthly':
                        numberOfPayments = loanTermMonths;
                        intervalDays = 30; // Approximation
                        break;
                    case 'half-yearly':
                        numberOfPayments = loanTermMonths / 6;
                        intervalDays = 180; // Approximation
                        break;
                    case 'annually':
                        numberOfPayments = loanTermMonths / 12;
                        intervalDays = 365; // Approximation
                        break;
                    default:
                        numberOfPayments = loanTermMonths;
                        intervalDays = 30;
                }

                var paymentAmount = (totalAmount / numberOfPayments).toFixed(2);
                var paymentSchedule = [];
                var today = new Date();

                for (var i = 1; i <= numberOfPayments; i++) {
                    var paymentDate = new Date(today.getTime());
                    paymentDate.setDate(today.getDate() + (i * intervalDays));

                    var formattedDate = paymentDate.toISOString().split('T')[0]; // YYYY-MM-DD

                    paymentSchedule.push({
                        id: i,
                        date: formattedDate,
                        amount: paymentAmount,
                        status: 'Not Paid', // Default status
                        updatedAt: '' // Initially empty
                    });
                }

                return paymentSchedule;
            }

            // Function to mark a payment as paid
            window.markAsPaid = function(customerId, paymentId) {
                // Find the row in the payment table
                $('#paymentTable tbody tr').each(function() {
                    var row = $(this);
                    var currentPaymentId = parseInt(row.find('td:first').text());
                    if (currentPaymentId === paymentId) {
                        // Update the status cell
                        row.find('td:nth-child(4)').text('Paid');

                        // Update the Updated At cell
                        var currentTime = new Date();
                        var formattedTime = currentTime.toLocaleString();
                        row.find('td:nth-child(5)').text(formattedTime);

                        // Update the action button
                        row.find('td:nth-child(6)').html(`
                            <button class="btn btn-warning btn-sm" onclick="markAsNotPaid(${customerId}, ${paymentId})" title="Mark as Not Paid" aria-label="Mark Payment ${paymentId} as Not Paid">
                                <i class="mdi mdi-undo"></i> Undo
                            </button>
                        `);

                        // Show success notification
                        showToast('Payment marked as paid.', 'success');
                    }
                });
            }

            // Function to mark a payment as not paid
            window.markAsNotPaid = function(customerId, paymentId) {
                // Find the row in the payment table
                $('#paymentTable tbody tr').each(function() {
                    var row = $(this);
                    var currentPaymentId = parseInt(row.find('td:first').text());
                    if (currentPaymentId === paymentId) {
                        // Update the status cell
                        row.find('td:nth-child(4)').text('Not Paid');

                        // Clear the Updated At cell
                        row.find('td:nth-child(5)').text('-');

                        // Update the action button
                        row.find('td:nth-child(6)').html(`
                            <button class="btn btn-success btn-sm" onclick="markAsPaid(${customerId}, ${paymentId})" title="Mark as Paid" aria-label="Mark Payment ${paymentId} as Paid">
                                <i class="mdi mdi-check"></i> Paid
                            </button>
                        `);

                        // Show success notification
                        showToast('Payment marked as not paid.', 'info');
                    }
                });
            }

            // Function to show toast notifications
            function showToast(message, type) {
                var toastElement = $('#liveToast');

                // Update toast message and class based on type
                $('#toastMessage').text(message);
                toastElement.removeClass('bg-success bg-danger bg-warning bg-info');

                switch(type) {
                    case 'success':
                        toastElement.addClass('bg-success');
                        break;
                    case 'danger':
                        toastElement.addClass('bg-danger');
                        break;
                    case 'warning':
                        toastElement.addClass('bg-warning');
                        break;
                    case 'info':
                        toastElement.addClass('bg-info');
                        break;
                    default:
                        toastElement.addClass('bg-success');
                }

                var toast = new bootstrap.Toast(toastElement[0]);
                toast.show();
            }

            // Function to populate Edit Customer Modal with existing data
            window.editCustomer = function (customerId) {
                // Find the row data based on customerId
                var rowData = null;
                customerTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (parseInt(data[0]) === customerId) {
                        rowData = data;
                    }
                });

                if (rowData) {
                    // Populate the edit form with existing data
                    $('#editCustomerId').val(rowData[0]);
                    $('#editCustomerName').val(rowData[1]);
                    $('#editContactNumber').val(rowData[2]);
                    $('#editAlternateContactNumber').val(rowData[3]);
                    $('#editNomineeName').val(rowData[4]);
                    $('#editNomineeContact').val(rowData[5]);

                    // Set Loan Product selection
                    var loanProduct = loanProducts.find(function (p) { return p.name === rowData[6]; });
                    var loanProductId = loanProduct ? loanProduct.id : '';
                    $('#editLoanProduct').val(loanProductId).trigger('change');

                    // Populate dynamic fields based on loan product category
                    var selectedProduct = loanProducts.find(function (p) { return p.id === loanProductId; });

                    if (selectedProduct) {
                        if (selectedProduct.category === 'Vehicle Finance') {
                            $('#editVehicleDetails').val(rowData[7]);
                        } else if (selectedProduct.category === 'Real Estate Finance') {
                            $('#editHomeLoanDetails').val(rowData[8]);
                        } else if (selectedProduct.category === 'Personal Finance') {
                            $('#editAadhaarNumber').val(rowData[9]);
                        }
                    }

                    $('#editTotalAmount').val(rowData[10]);
                    $('#editAutoInterestRate').val(rowData[11]);
                    $('#editAutoDuration').val(rowData[12]);
                    $('#editAutoPaymentFrequency').val(rowData[13]);

                    // Show the Edit Customer Modal
                    $('#editCustomerModal').modal('show');
                }
            }

            // Function to generate payment schedule with update times
            function generatePaymentSchedule(loanProduct, totalAmount, duration) {
                var paymentFrequency = loanProduct.paymentFrequency.toLowerCase(); // e.g., monthly, weekly
                var loanTermMonths = duration; // Assuming duration is in Months

                var numberOfPayments;
                var intervalDays;

                switch(paymentFrequency) {
                    case 'daily':
                        numberOfPayments = loanTermMonths * 30; // Approximation
                        intervalDays = 1;
                        break;
                    case 'weekly':
                        numberOfPayments = loanTermMonths * 4; // Approximation
                        intervalDays = 7;
                        break;
                    case 'monthly':
                        numberOfPayments = loanTermMonths;
                        intervalDays = 30; // Approximation
                        break;
                    case 'half-yearly':
                        numberOfPayments = loanTermMonths / 6;
                        intervalDays = 180; // Approximation
                        break;
                    case 'annually':
                        numberOfPayments = loanTermMonths / 12;
                        intervalDays = 365; // Approximation
                        break;
                    default:
                        numberOfPayments = loanTermMonths;
                        intervalDays = 30;
                }

                var paymentAmount = (totalAmount / numberOfPayments).toFixed(2);
                var paymentSchedule = [];
                var today = new Date();

                for (var i = 1; i <= numberOfPayments; i++) {
                    var paymentDate = new Date(today.getTime());
                    paymentDate.setDate(today.getDate() + (i * intervalDays));

                    var formattedDate = paymentDate.toISOString().split('T')[0]; // YYYY-MM-DD

                    paymentSchedule.push({
                        id: i,
                        date: formattedDate,
                        amount: paymentAmount,
                        status: 'Not Paid', // Default status
                        updatedAt: '' // Initially empty
                    });
                }

                return paymentSchedule;
            }
        });
    </script>
</body>

</html>
