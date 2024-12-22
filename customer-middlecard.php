
    <div class="container mt-2">
        <!-- Customer List Table -->
        <div class="row g-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Customer List</h4>
                        <button class="btn btn-primary mb-3" onclick="openAddCustomerModal()">Add New Customer</button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Contact</th>
                                        <th>Loan Product</th>
                                        <th>Total Loan Amount</th>
                                        <th>Interest Rate</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="customerTable">
                                    <!-- Example Row -->
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>9876543210</td>
                                        <td>Personal Loan</td>
                                        <td>₹50,000</td>
                                        <td>12%</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onclick="viewProfile(1)">View Profile</button>
                                            <button class="btn btn-success btn-sm" onclick="editCustomer(1)">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteCustomer(1)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Add/Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="customerForm">
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" placeholder="Enter customer name" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" placeholder="Enter contact number" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomineeContact" class="form-label">Nominee Contact Number</label>
                            <input type="text" class="form-control" id="nomineeContact" placeholder="Enter nominee contact number" required>
                        </div>
                        <div class="mb-3">
                            <label for="loanProduct" class="form-label">Loan Product</label>
                            <select class="form-select" id="loanProduct" required onchange="fetchLoanDetails()">
                                <option value="" selected disabled>Select Loan Product</option>
                                <option value="Personal Loan">Personal Loan</option>
                                <option value="Vehicle Loan">Vehicle Loan</option>
                            </select>
                        </div>
                        <div id="loanSpecificFields"></div>
                        <div class="mb-3">
                            <label for="totalAmount" class="form-label">Total Loan Amount</label>
                            <input type="number" class="form-control" id="totalAmount" placeholder="Enter total loan amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="interestRate" class="form-label">Interest Rate</label>
                            <input type="text" class="form-control" id="interestRate" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="repaymentMode" class="form-label">Repayment Mode</label>
                            <select class="form-select" id="repaymentMode" required>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="calculatedRepayment" class="form-label">Calculated Repayment Amount</label>
                            <input type="text" class="form-control" id="calculatedRepayment" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Customer Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="profileContent">
                    <!-- Customer details will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const customerData = {
            1: {
                name: "John Doe",
                contact: "9876543210",
                nomineeContact: "9123456780",
                loanProduct: "Personal Loan",
                totalAmount: "₹50,000",
                interestRate: "12%",
                repaymentMode: "Monthly",
                additionalDetails: "N/A",
            },
        };

        function viewProfile(id) {
            const customer = customerData[id];
            const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
            const profileContent = document.getElementById('profileContent');
            profileContent.innerHTML = `
                <h5>Customer Name: ${customer.name}</h5>
                <p><strong>Contact:</strong> ${customer.contact}</p>
                <p><strong>Nominee Contact:</strong> ${customer.nomineeContact}</p>
                <p><strong>Loan Product:</strong> ${customer.loanProduct}</p>
                <p><strong>Total Loan Amount:</strong> ${customer.totalAmount}</p>
                <p><strong>Interest Rate:</strong> ${customer.interestRate}</p>
                <p><strong>Repayment Mode:</strong> ${customer.repaymentMode}</p>
                <p><strong>Additional Details:</strong> ${customer.additionalDetails}</p>
            `;
            profileModal.show();
        }

        function deleteCustomer(id) {
            if (confirm('Are you sure you want to delete this customer?')) {
                alert('Customer deleted successfully!');
            }
        }
    </script>

