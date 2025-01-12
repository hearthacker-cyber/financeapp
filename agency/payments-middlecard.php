<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Payment Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .badge-paid {
            background-color: #28a745;
            color: white;
        }
        .badge-pending {
            background-color: #ffc107;
            color: black;
        }
        .badge-overdue {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Payment Tracker</h2>

        <!-- Dashboard Summary -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Amount Received</h5>
                        <h3 id="totalReceived">₹0</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Pending Dues</h5>
                        <h3 id="totalPending">₹0</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Overdue Payments</h5>
                        <h3 id="totalOverdue">₹0</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Customer Button -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Add New Payment</button>

        <!-- Payments Table -->
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Customer Payments</h4>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Vehicle Number</th>
                            <th>Total Amount</th>
                            <th>Amount Received</th>
                            <th>Pending Dues</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="paymentTableBody">
                        <!-- Example Data Rows -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Payment Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addPaymentForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="tel" class="form-control" id="contact" required>
                        </div>
                        <div class="mb-3">
                            <label for="vehicleNumber" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicleNumber">
                        </div>
                        <div class="mb-3">
                            <label for="totalAmount" class="form-label">Total Amount (₹)</label>
                            <input type="number" class="form-control" id="totalAmount" required>
                        </div>
                        <div class="mb-3">
                            <label for="amountReceived" class="form-label">Amount Received (₹)</label>
                            <input type="number" class="form-control" id="amountReceived" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        let totalReceived = 0;
        let totalPending = 0;
        let totalOverdue = 0;

        document.getElementById('addPaymentForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const customerData = {
                customerName: document.getElementById('customerName').value,
                contact: document.getElementById('contact').value,
                vehicleNumber: document.getElementById('vehicleNumber').value,
                totalAmount: parseFloat(document.getElementById('totalAmount').value),
                amountReceived: parseFloat(document.getElementById('amountReceived').value),
            };

            const pendingDues = customerData.totalAmount - customerData.amountReceived;
            const status = pendingDues === 0 ? 'Paid' : (pendingDues > 0 ? 'Pending' : 'Overdue');
            const badgeClass = pendingDues === 0 ? 'badge-paid' : (pendingDues > 0 ? 'badge-pending' : 'badge-overdue');

            // Update Dashboard
            totalReceived += customerData.amountReceived;
            totalPending += pendingDues > 0 ? pendingDues : 0;
            totalOverdue += pendingDues < 0 ? Math.abs(pendingDues) : 0;

            updateDashboard();

            // Add Payment Row
            const tableBody = document.getElementById('paymentTableBody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>#</td>
                <td>${customerData.customerName}</td>
                <td>${customerData.contact}</td>
                <td>${customerData.vehicleNumber}</td>
                <td>₹${customerData.totalAmount.toLocaleString()}</td>
                <td>₹${customerData.amountReceived.toLocaleString()}</td>
                <td>₹${Math.abs(pendingDues).toLocaleString()}</td>
                <td><span class="badge ${badgeClass}">${status}</span></td>
                <td>
                    <button class="btn btn-info btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteRow(this, ${pendingDues}, ${customerData.amountReceived})">Delete</button>
                </td>
            `;
            tableBody.appendChild(newRow);

            document.getElementById('addPaymentForm').reset();
            const addCustomerModal = bootstrap.Modal.getInstance(document.getElementById('addCustomerModal'));
            addCustomerModal.hide();
        });

        function updateDashboard() {
            document.getElementById('totalReceived').textContent = `₹${totalReceived.toLocaleString()}`;
            document.getElementById('totalPending').textContent = `₹${totalPending.toLocaleString()}`;
            document.getElementById('totalOverdue').textContent = `₹${totalOverdue.toLocaleString()}`;
        }

        function deleteRow(button, pendingDues, amountReceived) {
            const row = button.closest('tr');
            totalPending -= pendingDues > 0 ? pendingDues : 0;
            totalReceived -= amountReceived;
            totalOverdue -= pendingDues < 0 ? Math.abs(pendingDues) : 0;
            updateDashboard();
            row.remove();
        }
    </script>
</body>
</html>
