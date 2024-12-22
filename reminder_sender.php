<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Reminder Sender - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Reminder Sender Page" name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Additional Custom CSS -->
    <style>
        body {
            padding-top: 60px; /* Adjust based on your topbar height */
        }
        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .customer-card {
            margin-bottom: 20px;
        }
        .logs-table {
            max-height: 600px;
            overflow-y: auto;
        }
        /* Toast Positioning */
        #reminderToast {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1055;
        }
        #reminderErrorToast {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1055;
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
                    <?php include 'title.php'; ?>
                    <!-- End Page Title -->

                    <!-- Reminder Form and Customer Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card form-section">
                                <div class="card-header">
                                    Send SMS Reminders
                                </div>
                                <div class="card-body">
                                    <?php
                                    // Handle single or bulk customer IDs
                                    $customerIds = isset($_GET['customerId']) ? htmlspecialchars($_GET['customerId']) : '';
                                    $customerIdsArray = array_filter(array_map('trim', explode(',', $customerIds)));

                                    // Example customer data (replace this with database query)
                                    $customersData = [
                                        101 => ['name' => 'Arun Kumar', 'amount' => 5000, 'overdue' => 5250, 'due' => 1000, 'phone' => '9876543210'],
                                        102 => ['name' => 'Priya Raj', 'amount' => 2000, 'overdue' => 2500, 'due' => 500, 'phone' => '9123456789'],
                                        103 => ['name' => 'Karthik Subramanian', 'amount' => 10000, 'overdue' => 11500, 'due' => 1500, 'phone' => '9988776655']
                                    ];
                                    ?>

                                    <form id="reminderForm">
                                        <div class="mb-3">
                                            <label for="customerId" class="form-label">Customer IDs</label>
                                            <input type="text" class="form-control" id="customerId" value="<?php echo implode(', ', $customerIdsArray); ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Customer Details</label>
                                            <div class="row">
                                                <?php foreach ($customerIdsArray as $id) : 
                                                    if (isset($customersData[$id])) : 
                                                        $customer = $customersData[$id];
                                                ?>
                                                        <div class="col-md-4">
                                                            <div class="card customer-card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $customer['name']; ?></h5>
                                                                    <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($customer['phone']); ?></p>
                                                                    <p class="card-text"><strong>Amount:</strong> ₹<?php echo number_format($customer['amount'], 2); ?></p>
                                                                    <p class="card-text"><strong>Overdue:</strong> ₹<?php echo number_format($customer['overdue'], 2); ?></p>
                                                                    <p class="card-text"><strong>Due Now:</strong> ₹<?php echo number_format($customer['due'], 2); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php 
                                                    else : 
                                                ?>
                                                        <div class="col-md-4">
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>ID: <?php echo htmlspecialchars($id); ?></strong> - No data available.
                                                            </div>
                                                        </div>
                                                <?php 
                                                    endif; 
                                                endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="reminderMessage" class="form-label">Reminder Message</label>
                                            <textarea class="form-control" id="reminderMessage" rows="5" placeholder="Type your reminder message here..." required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="mdi mdi-send"></i> Send Reminder
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reminder Logs Table with DataTables -->
                    <div class="card">
                        <div class="card-header">
                            SMS Reminder Logs
                        </div>
                        <div class="card-body logs-table">
                            <table class="table table-bordered table-hover" id="reminderLogsTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Status</th>
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

    <!-- Reminder Success Toast -->
    <div class="toast align-items-center text-bg-success border-0" id="reminderToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Reminder sent successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <!-- Reminder Failure Toast -->
    <div class="toast align-items-center text-bg-danger border-0" id="reminderErrorToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Failed to send reminder. Please try again.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <!-- Scripts -->
    <!-- Ensure jQuery is loaded before DataTables -->
    <!-- Check if vendor.min.js includes jQuery. If it does, remove the jQuery CDN below. -->
    <!-- If unsure, try removing the jQuery CDN first and see if it works. -->
    
    <!-- Remove the following jQuery CDN if vendor.min.js includes jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    
    <!-- If vendor.min.js does NOT include jQuery, uncomment the following line -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- App JS (Your custom scripts) -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- Reminder Script -->
    <script>
        // Initialize Toasts
        const reminderToast = new bootstrap.Toast(document.getElementById('reminderToast'));
        const reminderErrorToast = new bootstrap.Toast(document.getElementById('reminderErrorToast'));

        // Initialize DataTables
        $(document).ready(function() {
            // Check if DataTable is already initialized
            if (!$.fn.DataTable.isDataTable('#reminderLogsTable')) {
                $('#reminderLogsTable').DataTable({
                    "order": [[ 6, "desc" ]], // Order by Timestamp descending
                    "language": {
                        "decimal": "",
                        "emptyTable": "No reminder logs available",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "lengthMenu": "Show _MENU_ entries",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "Search:",
                        "zeroRecords": "No matching records found",
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "next": "Next",
                            "previous": "Previous"
                        },
                    },
                    "responsive": true
                });
            }

            // Load Logs from LocalStorage after DataTables initialization
            loadLogsFromLocalStorage();
        });

        // Utility Function to Sanitize HTML
        function sanitizeHTML(str) {
            const temp = document.createElement('div');
            temp.textContent = str;
            return temp.innerHTML;
        }

        // Format Number with Indian Numbering System
        function formatNumberIndian(num) {
            return num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
        }

        // Process Reminder (Simulated Response)
        function processReminder() {
            // In a real application, integrate with backend APIs to send SMS reminders
            // Here, we'll simulate success or failure randomly for demonstration
            return Math.random() < 0.95; // 95% chance of success
        }

        // Log Reminder Interaction
        function logReminderInteraction(log) {
            const table = $('#reminderLogsTable').DataTable();
            const rowCount = table.rows().count() + 1;

            table.row.add([
                rowCount,
                sanitizeHTML(log.customerId),
                sanitizeHTML(log.customerName),
                sanitizeHTML(log.phone),
                sanitizeHTML(log.message),
                sanitizeHTML(log.status),
                sanitizeHTML(log.timestamp)
            ]).draw(false);

            // Save to LocalStorage
            saveLogToLocalStorage(log);
        }

        // Save Log to LocalStorage
        function saveLogToLocalStorage(log) {
            let logs = JSON.parse(localStorage.getItem('reminderLogs')) || [];
            logs.unshift(log); // Add new log at the beginning
            localStorage.setItem('reminderLogs', JSON.stringify(logs));
        }

        // Load Logs from LocalStorage
        function loadLogsFromLocalStorage() {
            let logs = JSON.parse(localStorage.getItem('reminderLogs')) || [];
            logs.forEach(log => logReminderInteraction(log));
        }

        // Form Submission Handler
        document.getElementById('reminderForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const customerId = document.getElementById('customerId').value.trim();
            const reminderMessage = document.getElementById('reminderMessage').value.trim();

            if (!customerId || !reminderMessage) {
                // Show error toast
                reminderErrorToast.show();
                return;
            }

            // Split customer IDs and send reminders
            const customerIdsArray = customerId.split(',').map(id => id.trim()).filter(id => id !== '');
            const timestamp = new Date().toLocaleString('en-IN'); // Indian date format

            customerIdsArray.forEach(id => {
                // Example customer data (replace this with database query)
                const customersData = {
                    101: { name: 'Arun Kumar', phone: '9876543210' },
                    102: { name: 'Priya Raj', phone: '9123456789' },
                    103: { name: 'Karthik Subramanian', phone: '9988776655' }
                };

                const customer = customersData[id];
                if (customer) {
                    const isSuccess = processReminder();

                    const logEntry = {
                        customerId: id,
                        customerName: customer.name,
                        phone: customer.phone,
                        message: reminderMessage,
                        status: isSuccess ? 'Success' : 'Failure',
                        timestamp: timestamp
                    };

                    // Log Interaction
                    logReminderInteraction(logEntry);

                    // Show appropriate toast
                    if (isSuccess) {
                        reminderToast.show();
                    } else {
                        reminderErrorToast.show();
                    }
                } else {
                    // Customer data not found
                    const logEntry = {
                        customerId: id,
                        customerName: 'Unknown',
                        phone: 'N/A',
                        message: reminderMessage,
                        status: 'Failure',
                        timestamp: timestamp
                    };

                    // Log Interaction
                    logReminderInteraction(logEntry);

                    // Show error toast
                    reminderErrorToast.show();
                }
            });

            // Reset Form
            document.getElementById('reminderForm').reset();
        });
    </script>
</body>
</html>
