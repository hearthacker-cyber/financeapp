
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Financial Overview | CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Analyze financial data and trends" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Bootstrap Icons for Badges -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Custom styles for Financial Overview charts */
        .compact-chart {
            height: 300px !important; /* Adjust the height as needed */
        }
    </style>
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

                <!-- Start Content-->
                <div class="container-fluid">
                    
                    <!-- start page title -->
                    <?php include 'includes/title.php'; ?>
                    <!-- end page title --> 

                    <!-- Financial Overview Charts -->
                    <div class="row">
                        <!-- Revenue vs Expenses -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Revenue vs Expenses</h4>
                                    <canvas id="revenueExpensesChart" height="280"></canvas>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <!-- Profit Margins -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Profit Margins</h4>
                                    <canvas id="profitMarginsChart" height="280"></canvas>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                    <!-- Cash Flow Overview -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Cash Flow Overview</h4>
                                    <canvas id="cashFlowChart" class="compact-chart"></canvas>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <!-- Financial Ratios -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Financial Ratios</h4>
                                    <canvas id="financialRatiosChart" class="compact-chart"></canvas>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                    <!-- Detailed Financial Data -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">Detailed Financial Data</h4>
                                        <p class="card-title-desc">View and analyze detailed financial data below.</p>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" id="exportFinancialData">
                                            <i class="mdi mdi-download me-1"></i> Export Data
                                        </button>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="financialDataTable" class="table table-bordered table-hover table-striped table-sm">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Account</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Balance</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Example Data Rows -->
                                                <tr>
                                                    <td>1</td>
                                                    <td>2023-01-15</td>
                                                    <td>Sales Revenue</td>
                                                    <td>Credit</td>
                                                    <td>₹150,000</td>
                                                    <td>₹150,000</td>
                                                    <td>January Sales</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>2023-01-16</td>
                                                    <td>Office Supplies</td>
                                                    <td>Debit</td>
                                                    <td>₹10,000</td>
                                                    <td>₹140,000</td>
                                                    <td>Purchased office supplies</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>2023-01-17</td>
                                                    <td>Utilities Expense</td>
                                                    <td>Debit</td>
                                                    <td>₹5,000</td>
                                                    <td>₹135,000</td>
                                                    <td>Electricity bill</td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'includes/footer.php'; ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <?php include 'includes/rightbar.php'; ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- Apex js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart.js Initialization -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Revenue vs Expenses Chart
            const ctxRevenueExpenses = document.getElementById('revenueExpensesChart').getContext('2d');
            new Chart(ctxRevenueExpenses, {
                type: 'bar',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                    datasets: [
                        {
                            label: 'Revenue',
                            data: [500000, 600000, 550000, 700000],
                            backgroundColor: 'rgba(40, 167, 69, 0.6)',
                            borderColor: 'rgba(40, 167, 69, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Expenses',
                            data: [300000, 350000, 320000, 400000],
                            backgroundColor: 'rgba(220, 53, 69, 0.6)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '₹' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // Profit Margins Chart
            const ctxProfitMargins = document.getElementById('profitMarginsChart').getContext('2d');
            new Chart(ctxProfitMargins, {
                type: 'pie',
                data: {
                    labels: ['Gross Profit', 'Net Profit'],
                    datasets: [{
                        data: [400000, 300000],
                        backgroundColor: [
                            'rgba(23, 162, 184, 0.6)',
                            'rgba(255, 193, 7, 0.6)'
                        ],
                        borderColor: [
                            'rgba(23, 162, 184, 1)',
                            'rgba(255, 193, 7, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += '₹' + context.parsed.toLocaleString();
                                    }
                                    return label;
                                }
                            }
                        },
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });

            // Cash Flow Overview Chart
            const ctxCashFlow = document.getElementById('cashFlowChart').getContext('2d');
            new Chart(ctxCashFlow, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Cash Inflow',
                        data: [200000, 220000, 210000, 230000, 240000, 250000],
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3
                    },
                    {
                        label: 'Cash Outflow',
                        data: [150000, 160000, 155000, 165000, 170000, 175000],
                        backgroundColor: 'rgba(220, 53, 69, 0.2)',
                        borderColor: 'rgba(220, 53, 69, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '₹' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // Financial Ratios Chart
            const ctxFinancialRatios = document.getElementById('financialRatiosChart').getContext('2d');
            new Chart(ctxFinancialRatios, {
                type: 'radar',
                data: {
                    labels: ['Current Ratio', 'Debt to Equity', 'Net Profit Margin', 'Return on Assets', 'Return on Equity'],
                    datasets: [{
                        label: 'Financial Ratios',
                        data: [1.5, 0.8, 25, 12, 18],
                        backgroundColor: 'rgba(23, 162, 184, 0.2)',
                        borderColor: 'rgba(23, 162, 184, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(23, 162, 184, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(23, 162, 184, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += context.parsed;
                                    }
                                    return label;
                                }
                            }
                        },
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 3
                        }
                    }
                }
            });
        </script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function () {
            // Initialize DataTable with buttons
            var table = $('#financialDataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "order": [[ 1, "desc" ]], // Order by Date descending
                "language": {
                    "search": "Search Financial Data:",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries"
                }
            });

            // Export Financial Data Button Click
            $('#exportFinancialData').on('click', function () {
                table.button('.buttons-csv, .buttons-excel, .buttons-pdf').trigger();
            });
        });
    </script>

    <!-- demo app -->
    <script src="assets/js/pages/demo.financial-overview.js"></script>
    <!-- end demo js-->
</body>

</html>
