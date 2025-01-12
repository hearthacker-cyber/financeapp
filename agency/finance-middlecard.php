<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan Tracking and EMI Management</title>

    <style>
        /* Optional: Add some custom styling for better visibility */
        .paid-emi {
            background-color: #d4edda;
        }
        .unpaid-emi {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <!-- Search and Add Loan Button -->
        <div class="d-flex justify-content-between mb-3">
            <input type="text" id="loanSearchInput" class="form-control w-50" placeholder="Search Loans...">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLoanModal">Add New Loan</button>
        </div>

        <!-- Loans Table -->
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Loan List</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th onclick="sortLoans(0)" style="cursor: pointer;">#</th>
                                <th onclick="sortLoans(1)" style="cursor: pointer;">Borrower Name</th>
                                <th onclick="sortLoans(2)" style="cursor: pointer;">Loan Product</th>
                                <th onclick="sortLoans(3)" style="cursor: pointer;">Loan Amount (₹)</th>
                                <th onclick="sortLoans(4)" style="cursor: pointer;">Interest Rate (%)</th>
                                <th onclick="sortLoans(5)" style="cursor: pointer;">EMI (₹)</th>
                                <th onclick="sortLoans(6)" style="cursor: pointer;">Status</th>
                                <th onclick="sortLoans(7)" style="cursor: pointer;">Outstanding EMIs</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="loanTableBody">
                            <!-- Loan rows will be dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Loan Modal -->
    <div class="modal fade" id="addLoanModal" tabindex="-1" aria-labelledby="addLoanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add/Edit Loan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="loanForm">
                    <div class="modal-body">
                        <input type="hidden" id="loanIndex"> <!-- Hidden field to track loan index for editing -->
                        <div class="mb-3">
                            <label for="loanProduct" class="form-label">Loan Product</label>
                            <select class="form-select" id="loanProduct" required>
                                <option value="">Select Loan Product</option>
                                <!-- Loan products will be dynamically populated -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="borrowerName" class="form-label">Borrower Name</label>
                            <input type="text" class="form-control" id="borrowerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="loanAmount" class="form-label">Loan Amount (₹)</label>
                            <input type="number" class="form-control" id="loanAmount" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="interestRate" class="form-label">Interest Rate (%)</label>
                            <input type="number" class="form-control" id="interestRate" min="0" step="0.01" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="loanTerm" class="form-label">Loan Term (Months)</label>
                            <input type="number" class="form-control" id="loanTerm" min="1" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="emi" class="form-label">EMI (₹)</label>
                            <input type="number" class="form-control" id="emi" min="1" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="loanStatus" class="form-label">Status</label>
                            <select class="form-select" id="loanStatus" required>
                                <option value="Active">Active</option>
                                <option value="Completed">Completed</option>
                                <option value="Overdue">Overdue</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                            <select class="form-select" id="paymentFrequency" required disabled>
                                <option value="">Select Frequency</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Bi-Weekly">Bi-Weekly</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Loan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EMI Schedule Modal -->
    <div class="modal fade" id="emiScheduleModal" tabindex="-1" aria-labelledby="emiScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EMI Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 id="emiBorrowerName"></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Due Date</th>
                                    <th>EMI Amount (₹)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="emiTableBody">
                                <!-- EMI rows will be dynamically populated -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample Loan Products
        const sampleLoanProducts = [
            {
                id: 1,
                name: "Personal Loan Standard",
                category: "Personal Finance",
                interestRate: 12, // Annual Interest Rate in %
                interestType: "Fixed",
                loanTerm: 12, // in months
                paymentFrequency: "Monthly"
            },
            {
                id: 2,
                name: "Vehicle Loan Standard",
                category: "Vehicle Finance",
                interestRate: 10,
                interestType: "Variable",
                loanTerm: 24,
                paymentFrequency: "Monthly"
            },
            {
                id: 3,
                name: "Business Loan Standard",
                category: "Business Loans",
                interestRate: 15,
                interestType: "Fixed",
                loanTerm: 36,
                paymentFrequency: "Monthly"
            }
            // Add more sample loan products as needed
        ];

        // Initialize loan products in localStorage if not present
        if (!localStorage.getItem('loanProducts')) {
            localStorage.setItem('loanProducts', JSON.stringify(sampleLoanProducts));
        }

        // Retrieve loan products from localStorage
        let loanProducts = JSON.parse(localStorage.getItem('loanProducts')) || [];

        // Retrieve loans from localStorage or initialize empty array
        let loans = JSON.parse(localStorage.getItem('loans')) || [];

        // Function to populate loan products dropdown
        function populateLoanProductsDropdown() {
            const loanProductSelect = document.getElementById('loanProduct');
            loanProductSelect.innerHTML = '<option value="">Select Loan Product</option>';
            loanProducts.forEach(product => {
                loanProductSelect.innerHTML += `<option value="${product.id}">${product.name}</option>`;
            });
        }

        // Call the function to populate dropdown on page load
        populateLoanProductsDropdown();

        // Function to generate EMI Schedule
        function generateEmiSchedule(loanAmount, interestRate, loanTerm, emiAmount) {
            const emiSchedule = [];
            const monthlyInterestRate = (interestRate / 100) / 12;
            let remainingAmount = loanAmount;
            let currentDate = new Date();

            for (let i = 1; i <= loanTerm; i++) {
                // Calculate interest for the current month
                const interest = remainingAmount * monthlyInterestRate;
                // Calculate principal component
                const principal = emiAmount - interest;
                // Update remaining amount
                remainingAmount -= principal;

                // Format due date (assuming EMI due on the same date each month)
                const dueDate = new Date(currentDate.setMonth(currentDate.getMonth() + 1));
                const formattedDate = dueDate.toLocaleDateString('en-GB');

                emiSchedule.push({
                    emiNumber: i,
                    dueDate: formattedDate,
                    amount: emiAmount.toFixed(2),
                    status: 'Unpaid' // Possible values: 'Paid', 'Unpaid'
                });
            }

            return emiSchedule;
        }

        // Function to render loans in the table
        function renderLoans() {
            const tbody = document.getElementById('loanTableBody');
            tbody.innerHTML = '';
            loans.forEach((loan, index) => {
                const loanProduct = loanProducts.find(product => product.id === loan.loanProductId);
                const loanProductName = loanProduct ? loanProduct.name : 'N/A';
                const outstandingEmis = loan.emiSchedule.filter(emi => emi.status === 'Unpaid').length;
                tbody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${loan.borrowerName}</td>
                        <td>${loanProductName}</td>
                        <td>${parseFloat(loan.loanAmount).toLocaleString('en-IN')}</td>
                        <td>${loan.interestRate}</td>
                        <td>${parseFloat(loan.emi).toLocaleString('en-IN')}</td>
                        <td>${loan.status}</td>
                        <td>${outstandingEmis}</td>
                        <td>
                            <button class="btn btn-info btn-sm me-1" onclick="viewEmiSchedule(${index})">View EMI</button>
                            <button class="btn btn-success btn-sm me-1" onclick="editLoan(${index})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteLoan(${index})">Delete</button>
                        </td>
                    </tr>`;
            });
        }

        // Handle loan product selection to auto-fill interest rate and loan term
        document.getElementById('loanProduct').addEventListener('change', function() {
            const selectedProductId = parseInt(this.value);
            const selectedProduct = loanProducts.find(product => product.id === selectedProductId);
            if (selectedProduct) {
                document.getElementById('interestRate').value = selectedProduct.interestRate;
                document.getElementById('loanTerm').value = selectedProduct.loanTerm;
                document.getElementById('paymentFrequency').value = selectedProduct.paymentFrequency;
                calculateEMI();
            } else {
                document.getElementById('interestRate').value = '';
                document.getElementById('loanTerm').value = '';
                document.getElementById('paymentFrequency').value = '';
                document.getElementById('emi').value = '';
            }
        });

        // Function to calculate EMI based on loan amount, interest rate, and loan term
        function calculateEMI() {
            const loanAmount = parseFloat(document.getElementById('loanAmount').value);
            const interestRate = parseFloat(document.getElementById('interestRate').value);
            const loanTerm = parseInt(document.getElementById('loanTerm').value);

            if (loanAmount && interestRate && loanTerm) {
                const monthlyInterestRate = (interestRate / 100) / 12;
                const emi = (loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, loanTerm)) / (Math.pow(1 + monthlyInterestRate, loanTerm) - 1);
                document.getElementById('emi').value = emi.toFixed(2);
            } else {
                document.getElementById('emi').value = '';
            }
        }

        // Recalculate EMI when loan amount changes
        document.getElementById('loanAmount').addEventListener('input', calculateEMI);

        // Function to handle loan form submission (Add/Edit)
        document.getElementById('loanForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const loanIndex = document.getElementById('loanIndex').value;
            const loanProductId = parseInt(document.getElementById('loanProduct').value);
            const borrowerName = document.getElementById('borrowerName').value.trim();
            const loanAmount = parseFloat(document.getElementById('loanAmount').value);
            const interestRate = parseFloat(document.getElementById('interestRate').value);
            const loanTerm = parseInt(document.getElementById('loanTerm').value);
            const emi = parseFloat(document.getElementById('emi').value);
            const status = document.getElementById('loanStatus').value;

            if (!loanProductId) {
                alert('Please select a loan product.');
                return;
            }

            if (loanIndex === "") {
                // Add New Loan
                const emiSchedule = generateEmiSchedule(loanAmount, interestRate, loanTerm, emi);
                const newLoan = {
                    loanProductId,
                    borrowerName,
                    loanAmount,
                    interestRate,
                    loanTerm,
                    emi,
                    status,
                    emiSchedule
                };
                loans.push(newLoan);
                alert(`Loan for "${borrowerName}" added successfully!`);
            } else {
                // Edit Existing Loan
                const loan = loans[loanIndex];
                loan.loanProductId = loanProductId;
                loan.borrowerName = borrowerName;
                loan.loanAmount = loanAmount;
                loan.interestRate = interestRate;
                loan.loanTerm = loanTerm;
                loan.emi = emi;
                loan.status = status;

                // Regenerate EMI Schedule if loan term or amount has changed
                // Preserve paid EMIs
                const paidEmis = loan.emiSchedule.filter(emi => emi.status === 'Paid');
                const newEmiSchedule = generateEmiSchedule(loanAmount, interestRate, loanTerm, emi);
                // Update the status of existing paid EMIs in the new schedule
                newEmiSchedule.forEach(newEmi => {
                    const alreadyPaid = paidEmis.find(paidEmi => paidEmi.emiNumber === newEmi.emiNumber);
                    if (alreadyPaid) {
                        newEmi.status = 'Paid';
                    }
                });
                loan.emiSchedule = newEmiSchedule;

                alert(`Loan for "${borrowerName}" updated successfully!`);
            }

            // Save to localStorage and re-render
            localStorage.setItem('loans', JSON.stringify(loans));
            renderLoans();

            // Reset and close the form
            document.getElementById('loanForm').reset();
            document.getElementById('loanIndex').value = '';
            document.getElementById('interestRate').value = '';
            document.getElementById('loanTerm').value = '';
            document.getElementById('emi').value = '';
            document.getElementById('paymentFrequency').value = '';
            const addEditModal = bootstrap.Modal.getInstance(document.getElementById('addLoanModal'));
            addEditModal.hide();
        });

        // Function to open the Add Loan Modal
        function openAddLoanModal() {
            document.getElementById('loanForm').reset();
            document.getElementById('loanIndex').value = '';
            document.querySelector('#addLoanModal .modal-title').innerText = 'Add New Loan';
            document.getElementById('interestRate').value = '';
            document.getElementById('loanTerm').value = '';
            document.getElementById('emi').value = '';
            document.getElementById('paymentFrequency').value = '';
        }

        // Function to edit a loan
        function editLoan(index) {
            const loan = loans[index];
            document.getElementById('loanIndex').value = index;
            document.getElementById('loanProduct').value = loan.loanProductId;
            document.getElementById('borrowerName').value = loan.borrowerName;
            document.getElementById('loanAmount').value = loan.loanAmount;
            document.getElementById('interestRate').value = loan.interestRate;
            document.getElementById('loanTerm').value = loan.loanTerm;
            document.getElementById('emi').value = loan.emi;
            document.getElementById('loanStatus').value = loan.status;
            document.getElementById('paymentFrequency').value = loan.paymentFrequency;

            calculateEMI();

            document.querySelector('#addLoanModal .modal-title').innerText = 'Edit Loan';
            const addEditModal = new bootstrap.Modal(document.getElementById('addLoanModal'));
            addEditModal.show();
        }

        // Function to delete a loan
        function deleteLoan(index) {
            if (confirm(`Are you sure you want to delete the loan for "${loans[index].borrowerName}"?`)) {
                loans.splice(index, 1);
                localStorage.setItem('loans', JSON.stringify(loans));
                renderLoans();
                alert('Loan deleted successfully!');
            }
        }

        // Function to view EMI Schedule
        function viewEmiSchedule(index) {
            const loan = loans[index];
            const loanProduct = loanProducts.find(product => product.id === loan.loanProductId);
            const loanProductName = loanProduct ? loanProduct.name : 'N/A';
            document.getElementById('emiBorrowerName').innerText = `Borrower Name: ${loan.borrowerName} | Loan Product: ${loanProductName}`;
            const emiTbody = document.getElementById('emiTableBody');
            emiTbody.innerHTML = '';

            loan.emiSchedule.forEach((emi, emiIndex) => {
                const emiClass = emi.status === 'Paid' ? 'paid-emi' : 'unpaid-emi';
                emiTbody.innerHTML += `
                    <tr class="${emiClass}">
                        <td>${emi.emiNumber}</td>
                        <td>${emi.dueDate}</td>
                        <td>${parseFloat(emi.amount).toLocaleString('en-IN')}</td>
                        <td>${emi.status}</td>
                        <td>
                            ${emi.status === 'Unpaid' ? `<button class="btn btn-success btn-sm" onclick="markAsPaid(${index}, ${emiIndex})">Mark as Paid</button>` : ''}
                        </td>
                    </tr>`;
            });

            const emiScheduleModal = new bootstrap.Modal(document.getElementById('emiScheduleModal'));
            emiScheduleModal.show();
        }

        // Function to mark an EMI as paid
        function markAsPaid(loanIndex, emiIndex) {
            const loan = loans[loanIndex];
            const emi = loan.emiSchedule[emiIndex];

            if (emi.status === 'Paid') {
                alert('This EMI is already marked as paid.');
                return;
            }

            emi.status = 'Paid';
            localStorage.setItem('loans', JSON.stringify(loans));
            renderLoans();
            viewEmiSchedule(loanIndex);
            alert(`EMI #${emi.emiNumber} marked as paid.`);
        }

        // Function to sort loans based on column index
        function sortLoans(columnIndex) {
            loans.sort((a, b) => {
                let valA, valB;
                switch(columnIndex) {
                    case 0: // #
                        return 0; // No sorting on index
                    case 1: // Borrower Name
                        valA = a.borrowerName.toLowerCase();
                        valB = b.borrowerName.toLowerCase();
                        return valA.localeCompare(valB);
                    case 2: // Loan Product
                        const productA = loanProducts.find(product => product.id === a.loanProductId);
                        const productB = loanProducts.find(product => product.id === b.loanProductId);
                        valA = productA ? productA.name.toLowerCase() : '';
                        valB = productB ? productB.name.toLowerCase() : '';
                        return valA.localeCompare(valB);
                    case 3: // Loan Amount
                        return parseFloat(a.loanAmount) - parseFloat(b.loanAmount);
                    case 4: // Interest Rate
                        return parseFloat(a.interestRate) - parseFloat(b.interestRate);
                    case 5: // EMI
                        return parseFloat(a.emi) - parseFloat(b.emi);
                    case 6: // Status
                        valA = a.status.toLowerCase();
                        valB = b.status.toLowerCase();
                        return valA.localeCompare(valB);
                    case 7: // Outstanding EMIs
                        return a.emiSchedule.filter(emi => emi.status === 'Unpaid').length - b.emiSchedule.filter(emi => emi.status === 'Unpaid').length;
                    default:
                        return 0;
                }
            });
            renderLoans();
        }

        // Function to search loans
        document.getElementById('loanSearchInput').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#loanTableBody tr');
            rows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchValue) ? '' : 'none';
            });
        });

        // Initial render
        renderLoans();
    </script>
</body>
</html>
