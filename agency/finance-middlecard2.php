<div class="container mt-3">
    <!-- Add Loan Button -->
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
                            <th onclick="sortLoans(2)" style="cursor: pointer;">Loan Amount (₹)</th>
                            <th onclick="sortLoans(3)" style="cursor: pointer;">Interest Rate (%)</th>
                            <th onclick="sortLoans(4)" style="cursor: pointer;">EMI (₹)</th>
                            <th onclick="sortLoans(5)" style="cursor: pointer;">Status</th>
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

<!-- Add Loan Modal -->
<div class="modal fade" id="addLoanModal" tabindex="-1" aria-labelledby="addLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLoanModalLabel">Add New Loan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addLoanForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="borrowerName" class="form-label">Borrower Name</label>
                        <input type="text" class="form-control" id="borrowerName" required>
                    </div>
                    <div class="mb-3">
                        <label for="loanAmount" class="form-label">Loan Amount (₹)</label>
                        <input type="number" class="form-control" id="loanAmount" required>
                    </div>
                    <div class="mb-3">
                        <label for="interestRate" class="form-label">Interest Rate (%)</label>
                        <input type="number" class="form-control" id="interestRate" required>
                    </div>
                    <div class="mb-3">
                        <label for="emi" class="form-label">EMI (₹)</label>
                        <input type="number" class="form-control" id="emi" required>
                    </div>
                    <div class="mb-3">
                        <label for="loanStatus" class="form-label">Status</label>
                        <select class="form-select" id="loanStatus" required>
                            <option value="Active">Active</option>
                            <option value="Completed">Completed</option>
                            <option value="Overdue">Overdue</option>
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

<script>
    // Loan Data
    let loans = JSON.parse(localStorage.getItem('loans')) || [];

    function renderLoans() {
        const tbody = document.getElementById('loanTableBody');
        tbody.innerHTML = '';
        loans.forEach((loan, index) => {
            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${loan.borrowerName}</td>
                    <td>${loan.loanAmount}</td>
                    <td>${loan.interestRate}</td>
                    <td>${loan.emi}</td>
                    <td>${loan.status}</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="editLoan(${index})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteLoan(${index})">Delete</button>
                    </td>
                </tr>`;
        });
    }

    document.getElementById('addLoanForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const newLoan = {
            borrowerName: document.getElementById('borrowerName').value,
            loanAmount: document.getElementById('loanAmount').value,
            interestRate: document.getElementById('interestRate').value,
            emi: document.getElementById('emi').value,
            status: document.getElementById('loanStatus').value,
        };
        loans.push(newLoan);
        localStorage.setItem('loans', JSON.stringify(loans));
        renderLoans();
        document.getElementById('addLoanForm').reset();
        document.querySelector('#addLoanModal .btn-close').click();
    });

    function editLoan(index) {
        const loan = loans[index];
        document.getElementById('borrowerName').value = loan.borrowerName;
        document.getElementById('loanAmount').value = loan.loanAmount;
        document.getElementById('interestRate').value = loan.interestRate;
        document.getElementById('emi').value = loan.emi;
        document.getElementById('loanStatus').value = loan.status;

        document.getElementById('addLoanForm').onsubmit = function (e) {
            e.preventDefault();
            loan.borrowerName = document.getElementById('borrowerName').value;
            loan.loanAmount = document.getElementById('loanAmount').value;
            loan.interestRate = document.getElementById('interestRate').value;
            loan.emi = document.getElementById('emi').value;
            loan.status = document.getElementById('loanStatus').value;
            localStorage.setItem('loans', JSON.stringify(loans));
            renderLoans();
            document.getElementById('addLoanForm').reset();
            document.querySelector('#addLoanModal .btn-close').click();
            document.getElementById('addLoanForm').onsubmit = addLoan; // Reset form submission behavior
        };
    }

    function deleteLoan(index) {
        loans.splice(index, 1);
        localStorage.setItem('loans', JSON.stringify(loans));
        renderLoans();
    }

    document.getElementById('loanSearchInput').addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#loanTableBody tr');
        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });

    function sortLoans(columnIndex) {
        const tbody = document.getElementById('loanTableBody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const isNumeric = !isNaN(rows[0].cells[columnIndex].textContent.trim());
        rows.sort((a, b) => {
            const cellA = a.cells[columnIndex].textContent.trim();
            const cellB = b.cells[columnIndex].textContent.trim();
            return isNumeric
                ? parseFloat(cellA) - parseFloat(cellB)
                : cellA.localeCompare(cellB);
        });
        rows.forEach(row => tbody.appendChild(row));
    }

    renderLoans();
</script>
