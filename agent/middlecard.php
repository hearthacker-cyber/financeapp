<div class="row g-3">
    
    <!-- Subscription Growth Over Time Chart (Bar Chart) -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Subscription Growth Over Time</h4>
                <canvas id="subscriptionGrowthChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Revenue Trends Chart (Area Chart) -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Revenue Trends</h4>
                <canvas id="revenueTrendsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Quick Actions</h4>
                <div class="d-flex flex-wrap gap-3">
                    <button class="btn btn-primary w-100">Add New Subscription</button>
                    <button class="btn btn-success w-100">Manage Subscriptions</button>
                    <button class="btn btn-warning w-100">View Reports</button>
                    <button class="btn btn-info w-100">System Settings</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Subscription Growth Over Time Chart (Bar Chart)
    const ctx4 = document.getElementById('subscriptionGrowthChart').getContext('2d');
    const subscriptionGrowthChart = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Subscriptions',
                data: [50, 75, 100, 150, 200, 250],
                backgroundColor: '#007bff',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            let value = context.parsed.y;
                            return `${label}: ${value}`;
                        }
                    }
                }
            },
            scales: {
                y: { 
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of New Subscriptions'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            }
        }
    });

    // Revenue Trends Chart (Area Chart)
    const ctx5 = document.getElementById('revenueTrendsChart').getContext('2d');
    const revenueTrendsChart = new Chart(ctx5, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Monthly Recurring Revenue (MRR)',
                data: [400000, 420000, 450000, 480000, 500000, 550000],
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.2)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#28a745',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#28a745',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            let value = context.parsed.y;
                            return `${label}: ₹${value.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                y: { 
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Revenue (₹)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            }
        }
    });
</script>

<style>
    /* Custom styles for dashboard cards */
    .dashboard-card {
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa; /* Light background for visibility */
        border: none; /* Remove border if desired */
        box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Subtle shadow for depth */
        transition: transform 0.2s;
    }

    .dashboard-card:hover {
        transform: scale(1.05);
    }

    .dashboard-card h3 {
        font-size: 2rem;
        font-weight: bold;
    }

    /* Hover effect for quick actions buttons */
    .d-flex .btn:hover {
        opacity: 0.9;
    }

    /* Style for error and success messages */
    .message {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
    }

    .error {
        background-color: #f8d7da;
        color: #842029;
    }

    .success {
        background-color: #d1e7dd;
        color: #0f5132;
    }
</style>
