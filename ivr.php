<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Advanced IVR Menu - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Advanced IVR Menu Page for CRM Dashboard" name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Additional Custom CSS -->
    <style>
        .dashboard-card {
            min-height: 150px;
        }
        .logs-table {
            max-height: 400px;
            overflow-y: auto;
        }
        /* Adjust padding based on your topbar height if needed */
        body {
            padding-top: 60px;
        }
    </style>
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">

    <!-- Begin page -->
    <div class="wrapper">
        <!-- Include Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Start Page Content here -->
        <div class="content-page">
            <div class="content">
                <!-- Include Topbar -->
                <?php include 'topbar.php'; ?>

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Page Title -->
                    <div class="row mb-2">
                        <div class="col-12">
                            <h4 class="page-title">Advanced IVR Menu</h4>
                        </div>
                    </div>

                    <!-- IVR Menu Form -->
                    <div class="card mb-2">
                        <div class="card-header">
                            IVR Menu Form
                        </div>
                        <div class="card-body">
                            <form id="ivrMenuForm">
                                <div class="row">
                                    <!-- Customer Details -->
                                    <div class="col-md-6 mb-3">
                                        <label for="customerId" class="form-label">Customer ID</label>
                                        <input type="text" class="form-control" id="customerId" placeholder="Enter Customer ID" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="customerName" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" id="customerName" placeholder="Enter Customer Name" required>
                                    </div>

                                    <!-- IVR Menu Options -->
                                    <div class="col-md-12 mb-3">
                                        <label for="ivrMenu" class="form-label">Select IVR Menu Option</label>
                                        <select class="form-select" id="ivrMenu" required>
                                            <option value="">Select an Option</option>
                                            <option value="1">1 - Account Balance Inquiry</option>
                                            <option value="2">2 - Loan Payment Status</option>
                                            <option value="3">3 - Recent Transactions</option>
                                            <option value="4">4 - Apply for a Loan</option>
                                            <option value="5">5 - Update Personal Information</option>
                                            <option value="6">6 - Credit Card Services</option>
                                            <option value="7">7 - Investment Options</option>
                                            <option value="8">8 - Speak to Customer Service</option>
                                            <option value="9">9 - Exit</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Process IVR Request</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Advanced Dashboard Section -->
                    <div class="row mb-4">
                        <!-- Dashboard Cards -->
                        <div class="col-md-3">
                            <div class="card text-white bg-info dashboard-card mb-3">
                                <div class="card-header">Total Customers</div>
                                <div class="card-body">
                                    <h5 class="card-title" id="totalCustomers">1,250</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-success dashboard-card mb-3">
                                <div class="card-header">Active Loans</div>
                                <div class="card-body">
                                    <h5 class="card-title" id="activeLoans">320</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-warning dashboard-card mb-3">
                                <div class="card-header">Pending Requests</div>
                                <div class="card-body">
                                    <h5 class="card-title" id="pendingRequests">45</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-danger dashboard-card mb-3">
                                <div class="card-header">New Signups</div>
                                <div class="card-body">
                                    <h5 class="card-title" id="newSignups">75</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IVR Logs Table -->
                    <div class="card">
                        <div class="card-header">
                            IVR Interaction Logs
                        </div>
                        <div class="card-body logs-table">
                            <table class="table table-bordered table-hover" id="ivrLogsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Selected Option</th>
                                        <th>Response Message</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Logs will be dynamically loaded here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Include Footer -->
            <?php include 'footer.php'; ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- IVR Menu Script -->
    <script>
        // Utility Functions
        function sanitizeHTML(str) {
            const temp = document.createElement('div');
            temp.textContent = str;
            return temp.innerHTML;
        }

        function formatNumber(num) {
            return num.toLocaleString();
        }

        // IVR Option Text Mapping
        const ivrOptions = {
            '1': 'Account Balance Inquiry',
            '2': 'Loan Payment Status',
            '3': 'Recent Transactions',
            '4': 'Apply for a Loan',
            '5': 'Update Personal Information',
            '6': 'Credit Card Services',
            '7': 'Investment Options',
            '8': 'Speak to Customer Service',
            '9': 'Exit'
        };

        // Process IVR Option
        function processIVROption(option) {
            let message = '';
            switch (option) {
                case '1':
                    message = "Your account balance is $5,000.";
                    break;
                case '2':
                    message = "Your loan payment is up-to-date.";
                    break;
                case '3':
                    message = "Here are your recent transactions: $200 at Grocery Store, $150 at Online Shopping.";
                    break;
                case '4':
                    message = "Redirecting you to the loan application process...";
                    break;
                case '5':
                    message = "Redirecting you to update your personal information...";
                    break;
                case '6':
                    message = "Connecting you to Credit Card Services...";
                    break;
                case '7':
                    message = "Here are our investment options: Mutual Funds, Stocks, Bonds.";
                    break;
                case '8':
                    message = "Connecting you to customer service...";
                    break;
                case '9':
                    message = "Thank you for contacting us. Goodbye!";
                    break;
                default:
                    message = "Invalid option selected.";
            }
            return message;
        }

        // Log IVR Interaction
        function logIVRInteraction(log) {
            const tableBody = document.querySelector('#ivrLogsTable tbody');
            const rowCount = tableBody.rows.length + 1;
            const row = tableBody.insertRow(0); // Insert at the top

            row.innerHTML = `
                <td>${rowCount}</td>
                <td>${sanitizeHTML(log.customerId)}</td>
                <td>${sanitizeHTML(log.customerName)}</td>
                <td>${ivrOptions[log.menuOption] || 'Unknown Option'}</td>
                <td>${sanitizeHTML(log.responseMessage)}</td>
                <td>${sanitizeHTML(log.timestamp)}</td>
            `;

            // Optionally, save to LocalStorage
            saveLogToLocalStorage(log);
        }

        // Update Dashboard Stats
        function updateDashboardStats() {
            const totalCustomers = document.getElementById('totalCustomers');
            const activeLoans = document.getElementById('activeLoans');
            const pendingRequests = document.getElementById('pendingRequests');
            const newSignups = document.getElementById('newSignups');

            // Increment stats (example logic)
            totalCustomers.innerText = formatNumber(parseInt(totalCustomers.innerText.replace(/,/g, '')) + 1);
            activeLoans.innerText = formatNumber(parseInt(activeLoans.innerText.replace(/,/g, '')) + 2);
            pendingRequests.innerText = formatNumber(parseInt(pendingRequests.innerText.replace(/,/g, '')) + 1);
            newSignups.innerText = formatNumber(parseInt(newSignups.innerText.replace(/,/g, '')) + 3);
        }

        // Save Log to LocalStorage
        function saveLogToLocalStorage(log) {
            let logs = JSON.parse(localStorage.getItem('ivrLogs')) || [];
            logs.unshift(log); // Add new log at the beginning
            localStorage.setItem('ivrLogs', JSON.stringify(logs));
        }

        // Load Logs from LocalStorage
        function loadLogsFromLocalStorage() {
            let logs = JSON.parse(localStorage.getItem('ivrLogs')) || [];
            logs.forEach(log => logIVRInteraction(log));
        }

        // Form Submission Handler
        document.getElementById('ivrMenuForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const customerId = document.getElementById('customerId').value.trim();
            const customerName = document.getElementById('customerName').value.trim();
            const menuOption = document.getElementById('ivrMenu').value;

            if (!customerId || !customerName || !menuOption) {
                alert('Please fill in all required fields.');
                return;
            }

            // Process IVR Option
            const responseMessage = processIVROption(menuOption);

            // Create Log Entry
            const logEntry = {
                customerId,
                customerName,
                menuOption,
                responseMessage,
                timestamp: new Date().toLocaleString()
            };

            // Log Interaction
            logIVRInteraction(logEntry);

            // Update Dashboard Stats
            updateDashboardStats();

            // Show Response to User
            alert(responseMessage);

            // Reset Form
            document.getElementById('ivrMenuForm').reset();
        });

        // Initialize Dashboard with Existing Logs
        document.addEventListener('DOMContentLoaded', function () {
            loadLogsFromLocalStorage();
        });
    </script>
</body>
</html>
