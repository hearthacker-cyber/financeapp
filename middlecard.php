<div class="row g-3">

    <!-- Financial Overview Chart -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Collections & Overdue Overview</h4>
                <canvas id="financialChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Loan Disbursement Chart -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Loan Disbursement Trends</h4>
                <canvas id="loanChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Pending Tasks -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Pending Tasks</h4>
                <ul class="list-group">
                    <li class="list-group-item">12 Loan Applications Awaiting Approval</li>
                    <li class="list-group-item">8 Payments Overdue</li>
                    <li class="list-group-item">5 Customer Accounts Needing Updates</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Customer & Loan Management -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Customer & Loan Management</h4>
                <ul class="list-group">
                    <li class="list-group-item">Loan Approved for John Doe - ₹5,00,000</li>
                    <li class="list-group-item">Payment Received from Jane Smith - ₹1,00,000</li>
                    <li class="list-group-item">Overdue Payment Flagged for Emily Brown</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Quick Actions</h4>
                <div class="d-flex flex-wrap gap-3">
                    <button class="btn btn-primary w-100">Add New Loan</button>
                    <button class="btn btn-success w-100">Record Payment</button>
                    <button class="btn btn-warning w-100">View Overdue Cases</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Financial Overview Chart
    const ctx1 = document.getElementById('financialChart').getContext('2d');
    const financialChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Collections', 'Pending', 'Overdue'],
            datasets: [{
                label: 'Amount (₹)',
                data: [5000000, 1250000, 250000],
                backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: { beginAtZero: true },
            }
        }
    });

    // Loan Disbursement Trends Chart
    const ctx2 = document.getElementById('loanChart').getContext('2d');
    const loanChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Loan Disbursement (₹)',
                data: [1000000, 1500000, 1800000, 2000000, 2300000, 2500000],
                borderColor: '#007bff',
                fill: false,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: { beginAtZero: true },
            }
        }
    });
</script>
