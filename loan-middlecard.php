<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan Product Management</title>
    <!-- Bootstrap CSS -->
    <!-- DataTables CSS -->
   
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Optional: Custom styling for better visibility */
        .modal-lg {
            max-width: 80% !important;
        }
        .edit-icon {
            color: #0d6efd;
            cursor: pointer;
        }
        .edit-icon:hover {
            color: #084298;
        }
    </style>
</head>
<body>
    <div class="container mt-2">
        <!-- Loan Product List Table -->
        <div class="row g-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Loan Product List</h4>
                        <button class="btn btn-primary mb-3" onclick="openAddLoanProductModal()">Add New Loan Product</button>
                        <div class="table-responsive">
                            <table id="loanProductTable" class="table table-striped table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Loan Product Name</th>
                                        <th>Category</th>
                                        <th>Interest Rate</th>
                                        <th>Interest Type</th>
                                        <th>Loan Term</th>
                                        <th>Payment Frequency</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="loanProductTableBody">
                                    <!-- Example Rows -->
                                    <tr>
                                        <td>1</td>
                                        <td>Personal Loan</td>
                                        <td>Personal Finance</td>
                                        <td>12%</td>
                                        <td>Fixed</td>
                                        <td>12 Months</td>
                                        <td>Monthly</td>
                                        <td>
                                            <i class="fas fa-edit edit-icon" onclick="editLoanProduct(1)" title="Edit"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Vehicle Loan</td>
                                        <td>Vehicle Finance</td>
                                        <td>10%</td>
                                        <td>Variable</td>
                                        <td>24 Months</td>
                                        <td>Monthly</td>
                                        <td>
                                            <i class="fas fa-edit edit-icon" onclick="editLoanProduct(2)" title="Edit"></i>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loan Product Details Modal -->
    <div class="modal fade" id="loanProductModal" tabindex="-1" aria-labelledby="loanProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Loan Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loanProductContent">
                    <!-- Loan product details will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Loan Product Modal -->
    <div class="modal fade" id="addEditLoanProductModal" tabindex="-1" aria-labelledby="addEditLoanProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEditLoanProductModalLabel">Add/Edit Loan Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="loanProductForm">
                    <div class="modal-body">
                        <input type="hidden" id="loanProductId">
                        <div class="mb-3">
                            <label for="loanProductName" class="form-label">Loan Product Name</label>
                            <input type="text" class="form-control" id="loanProductName" required>
                        </div>
                        <div class="mb-3">
                            <label for="loanCategory" class="form-label">Category</label>
                            <select class="form-select" id="loanCategory" required>
                                <option value="">Select Category</option>
                                <option value="Personal Finance">Personal Finance</option>
                                <option value="Vehicle Finance">Vehicle Finance</option>
                                <option value="Business Loans">Business Loans</option>
                                <!-- Add more categories as needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="interestRate" class="form-label">Interest Rate (%)</label>
                            <input type="number" class="form-control" id="interestRate" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="interestType" class="form-label">Interest Type</label>
                            <select class="form-select" id="interestType" required>
                                <option value="">Select Interest Type</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Variable">Variable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="loanTerm" class="form-label">Loan Term</label>
                            <input type="text" class="form-control" id="loanTerm" placeholder="e.g., 12 Months" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                            <select class="form-select" id="paymentFrequency" required>
                                <option value="">Select Frequency</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Bi-Weekly">Bi-Weekly</option>
                            </select>
                        </div>
                        <!-- Add more fields as necessary -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Loan Product</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Font Awesome JS for Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
        // Sample Loan Product Data (could be fetched from a server in real applications)
        const loanProductData = {
            1: {
                name: "Personal Loan",
                category: "Personal Finance",
                interestRate: "12%",
                interestType: "Fixed",
                loanTerm: "12 Months",
                paymentFrequency: "Monthly",
                additionalDetails: "Suitable for personal expenses."
            },
            2: {
                name: "Vehicle Loan",
                category: "Vehicle Finance",
                interestRate: "10%",
                interestType: "Variable",
                loanTerm: "24 Months",
                paymentFrequency: "Monthly",
                additionalDetails: "For purchasing vehicles."
            },
            // Add more loan products as needed
        };

        // Function to Open Add Loan Product Modal
        function openAddLoanProductModal() {
            document.getElementById('loanProductForm').reset();
            document.getElementById('loanProductId').value = '';
            document.getElementById('addEditLoanProductModalLabel').innerText = 'Add New Loan Product';
            const addEditModal = new bootstrap.Modal(document.getElementById('addEditLoanProductModal'));
            addEditModal.show();
        }

        // Function to Open Edit Loan Product Modal
        function editLoanProduct(id) {
            const loanProduct = loanProductData[id];
            if (!loanProduct) {
                alert('Loan product not found!');
                return;
            }
            document.getElementById('loanProductId').value = id;
            document.getElementById('loanProductName').value = loanProduct.name;
            document.getElementById('loanCategory').value = loanProduct.category;
            document.getElementById('interestRate').value = parseFloat(loanProduct.interestRate);
            document.getElementById('interestType').value = loanProduct.interestType;
            document.getElementById('loanTerm').value = loanProduct.loanTerm;
            document.getElementById('paymentFrequency').value = loanProduct.paymentFrequency;
            document.getElementById('addEditLoanProductModalLabel').innerText = 'Edit Loan Product';
            const addEditModal = new bootstrap.Modal(document.getElementById('addEditLoanProductModal'));
            addEditModal.show();
        }

        // Function to Delete Loan Product
        function deleteLoanProduct(id) {
            if (confirm('Are you sure you want to delete this loan product?')) {
                alert(`Loan Product "${loanProductData[id].name}" deleted successfully!`);
                delete loanProductData[id];
                // Remove the row from the table
                const table = $('#loanProductTable').DataTable();
                table.row(function(idx, data, node) {
                    return data[0] == id;
                }).remove().draw();
            }
        }

        // Function to View Loan Product Details
        function viewLoanProduct(id) {
            const loanProduct = loanProductData[id];
            if (!loanProduct) {
                alert('Loan product not found!');
                return;
            }
            const loanProductModal = new bootstrap.Modal(document.getElementById('loanProductModal'));
            const loanProductContent = document.getElementById('loanProductContent');
            loanProductContent.innerHTML = `
                <h5>Loan Product Name: ${loanProduct.name}</h5>
                <p><strong>Category:</strong> ${loanProduct.category}</p>
                <p><strong>Interest Rate:</strong> ${loanProduct.interestRate}</p>
                <p><strong>Interest Type:</strong> ${loanProduct.interestType}</p>
                <p><strong>Loan Term:</strong> ${loanProduct.loanTerm}</p>
                <p><strong>Payment Frequency:</strong> ${loanProduct.paymentFrequency}</p>
                <p><strong>Additional Details:</strong> ${loanProduct.additionalDetails}</p>
            `;
            loanProductModal.show();
        }

        // Handle Add/Edit Loan Product Form Submission
        document.getElementById('loanProductForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const id = document.getElementById('loanProductId').value;
            const name = document.getElementById('loanProductName').value.trim();
            const category = document.getElementById('loanCategory').value;
            const interestRate = document.getElementById('interestRate').value.trim() + '%';
            const interestType = document.getElementById('interestType').value;
            const loanTerm = document.getElementById('loanTerm').value.trim();
            const paymentFrequency = document.getElementById('paymentFrequency').value;
            const additionalDetails = "No additional details provided."; // Modify as needed

            if (!name || !category || !interestRate || !interestType || !loanTerm || !paymentFrequency) {
                alert('Please fill in all required fields.');
                return;
            }

            if (id) {
                // Edit Existing Loan Product
                loanProductData[id] = {
                    name,
                    category,
                    interestRate,
                    interestType,
                    loanTerm,
                    paymentFrequency,
                    additionalDetails
                };
                alert(`Loan Product "${name}" updated successfully!`);
                // Update the table row in DataTable
                const table = $('#loanProductTable').DataTable();
                table.rows().every(function(rowIdx, tableLoop, rowLoop){
                    const data = this.data();
                    if(data[0] == id){
                        this.data([
                            id,
                            name,
                            category,
                            interestRate,
                            interestType,
                            loanTerm,
                            paymentFrequency,
                            `<i class="fas fa-edit edit-icon" onclick="editLoanProduct(${id})" title="Edit"></i>`
                        ]).draw(false);
                    }
                });
            } else {
                // Add New Loan Product
                const newId = Object.keys(loanProductData).length + 1;
                loanProductData[newId] = {
                    name,
                    category,
                    interestRate,
                    interestType,
                    loanTerm,
                    paymentFrequency,
                    additionalDetails
                };
                alert(`Loan Product "${name}" added successfully!`);
                // Add the new row to DataTable
                const table = $('#loanProductTable').DataTable();
                table.row.add([
                    newId,
                    name,
                    category,
                    interestRate,
                    interestType,
                    loanTerm,
                    paymentFrequency,
                    `<i class="fas fa-edit edit-icon" onclick="editLoanProduct(${newId})" title="Edit"></i>`
                ]).draw(false);
            }

            // Close the modal
            const addEditModal = bootstrap.Modal.getInstance(document.getElementById('addEditLoanProductModal'));
            addEditModal.hide();
        });

        // Initialize DataTable
        $(document).ready(function() {
            $('#loanProductTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": 7 } // Make the Actions column not orderable
                ]
            });
        });
    </script>
</body>
</html>
