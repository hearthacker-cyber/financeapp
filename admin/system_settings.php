<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>System Settings - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Managing System Settings" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">

    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'topbar.php'; ?>
                <!-- end Topbar -->

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Start Page Title -->
                    <?php include 'title.php'; ?>
                    <!-- End Page Title -->

                    <!-- System Settings Tabs -->
                    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="true">
                                <i class="mdi mdi-cash-multiple me-1"></i> Payment Gateway
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab" aria-controls="email" aria-selected="false">
                                <i class="mdi mdi-email-outline me-1"></i> Email Settings
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="false">
                                <i class="mdi mdi-cog-outline me-1"></i> General Settings
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                                <i class="mdi mdi-shield-lock-outline me-1"></i> Security Settings
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab" aria-controls="notifications" aria-selected="false">
                                <i class="mdi mdi-bell-outline me-1"></i> Notification Templates
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="backup-tab" data-bs-toggle="tab" data-bs-target="#backup" type="button" role="tab" aria-controls="backup" aria-selected="false">
                                <i class="mdi mdi-backup-restore me-1"></i> Backup Settings
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="settingsTabContent">
                        <!-- Payment Gateway Tab -->
                        <div class="tab-pane fade show active p-4" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            <h5>Payment Gateway Configuration</h5>
                            <form id="paymentGatewayForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="paymentGateway" class="form-label">Payment Gateway</label>
                                        <select class="form-select" id="paymentGateway" name="paymentGateway" required>
                                            <option value="">Select Gateway</option>
                                            <option value="Stripe">Stripe</option>
                                            <option value="PayPal">PayPal</option>
                                            <option value="Razorpay">Razorpay</option>
                                            <!-- Add more gateways as needed -->
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="apiKey" class="form-label">API Key</label>
                                        <input type="text" class="form-control" id="apiKey" name="apiKey" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="apiSecret" class="form-label">API Secret</label>
                                        <input type="text" class="form-control" id="apiSecret" name="apiSecret" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="currency" class="form-label">Currency</label>
                                        <input type="text" class="form-control" id="currency" name="currency" value="INR" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Payment Settings</button>
                            </form>
                        </div>

                        <!-- Email Settings Tab -->
                        <div class="tab-pane fade p-4" id="email" role="tabpanel" aria-labelledby="email-tab">
                            <h5>Email Configuration</h5>
                            <form id="emailSettingsForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="smtpHost" class="form-label">SMTP Host</label>
                                        <input type="text" class="form-control" id="smtpHost" name="smtpHost" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="smtpPort" class="form-label">SMTP Port</label>
                                        <input type="number" class="form-control" id="smtpPort" name="smtpPort" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="smtpUser" class="form-label">SMTP Username</label>
                                        <input type="email" class="form-control" id="smtpUser" name="smtpUser" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="smtpPass" class="form-label">SMTP Password</label>
                                        <input type="password" class="form-control" id="smtpPass" name="smtpPass" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="fromEmail" class="form-label">From Email Address</label>
                                    <input type="email" class="form-control" id="fromEmail" name="fromEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fromName" class="form-label">From Name</label>
                                    <input type="text" class="form-control" id="fromName" name="fromName" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Email Settings</button>
                            </form>
                        </div>

                        <!-- General Settings Tab -->
                        <div class="tab-pane fade p-4" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <h5>General System Settings</h5>
                            <form id="generalSettingsForm" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="siteName" class="form-label">Site Name</label>
                                        <input type="text" class="form-control" id="siteName" name="siteName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="timezone" class="form-label">Timezone</label>
                                        <select class="form-select" id="timezone" name="timezone" required>
                                            <option value="">Select Timezone</option>
                                            <!-- PHP to populate timezones -->
                                            <?php
                                            date_default_timezone_set('UTC');
                                            foreach (timezone_identifiers_list() as $timezone) {
                                                echo "<option value=\"$timezone\">$timezone</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="siteDescription" class="form-label">Site Description</label>
                                    <textarea class="form-control" id="siteDescription" name="siteDescription" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="siteLogo" class="form-label">Site Logo</label>
                                    <input type="file" class="form-control" id="siteLogo" name="siteLogo" accept="image/*">
                                    <small class="form-text text-muted">Upload a PNG or JPG image. Max size 2MB.</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Save General Settings</button>
                            </form>
                        </div>

                        <!-- Security Settings Tab -->
                        <div class="tab-pane fade p-4" id="security" role="tabpanel" aria-labelledby="security-tab">
                            <h5>Security Settings</h5>
                            <form id="securitySettingsForm">
                                <div class="mb-3">
                                    <label for="passwordPolicy" class="form-label">Password Policy</label>
                                    <select class="form-select" id="passwordPolicy" name="passwordPolicy" required>
                                        <option value="">Select Policy</option>
                                        <option value="Weak">Weak (Minimum 6 characters)</option>
                                        <option value="Medium">Medium (Minimum 8 characters, includes letters and numbers)</option>
                                        <option value="Strong">Strong (Minimum 10 characters, includes letters, numbers, and special characters)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sessionTimeout" class="form-label">Session Timeout (minutes)</label>
                                    <input type="number" class="form-control" id="sessionTimeout" name="sessionTimeout" min="5" max="1440" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Security Settings</button>
                            </form>
                        </div>

                        <!-- Notification Templates Tab -->
                        <div class="tab-pane fade p-4" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                            <h5>Email Notification Templates</h5>
                            <form id="notificationTemplatesForm">
                                <div class="mb-3">
                                    <label for="registrationEmail" class="form-label">Registration Email Template</label>
                                    <textarea class="form-control" id="registrationEmail" name="registrationEmail" rows="6" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordResetEmail" class="form-label">Password Reset Email Template</label>
                                    <textarea class="form-control" id="passwordResetEmail" name="passwordResetEmail" rows="6" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Notification Templates</button>
                            </form>
                        </div>

                        <!-- Backup Settings Tab -->
                        <div class="tab-pane fade p-4" id="backup" role="tabpanel" aria-labelledby="backup-tab">
                            <h5>Backup Settings</h5>
                            <form id="backupSettingsForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="backupFrequency" class="form-label">Backup Frequency</label>
                                        <select class="form-select" id="backupFrequency" name="backupFrequency" required>
                                            <option value="">Select Frequency</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="backupStorage" class="form-label">Backup Storage Location</label>
                                        <select class="form-select" id="backupStorage" name="backupStorage" required>
                                            <option value="">Select Storage</option>
                                            <option value="Local Server">Local Server</option>
                                            <option value="AWS S3">AWS S3</option>
                                            <option value="Google Drive">Google Drive</option>
                                            <!-- Add more storage options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Backup Settings</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'footer.php'; ?>
            <!-- End Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include 'rightbar.php'; ?>
    <div class="rightbar-overlay"></div>

    <!-- Toast Notification -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <!-- Message will be inserted here via JavaScript -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- jQuery (required for DataTables and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS (Ensure Bootstrap is included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom JS -->
    <script>
        $(document).ready(function () {
            // Initialize DataTable for Agencies
            var agencyTable = $('#agencyTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": [8] } // Make Actions column non-orderable
                ],
                "language": {
                    "search": "Search Agencies:",
                    "lengthMenu": "Show _MENU_ agencies",
                    "info": "Showing _START_ to _END_ of _TOTAL_ agencies"
                }
            });

            // Handle Payment Gateway Form Submission
            $('#paymentGatewayForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serialize();

                // AJAX request to save payment settings
                $.ajax({
                    url: 'backend/save_payment_settings.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Show success toast
                        showToast('Payment Gateway settings saved successfully.');
                    },
                    error: function () {
                        // Show error toast
                        showToast('Failed to save Payment Gateway settings.');
                    }
                });
            });

            // Handle Email Settings Form Submission
            $('#emailSettingsForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serialize();

                // AJAX request to save email settings
                $.ajax({
                    url: 'backend/save_email_settings.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Show success toast
                        showToast('Email settings saved successfully.');
                    },
                    error: function () {
                        // Show error toast
                        showToast('Failed to save Email settings.');
                    }
                });
            });

            // Handle General Settings Form Submission
            $('#generalSettingsForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data including file
                var formData = new FormData(this);

                // AJAX request to save general settings
                $.ajax({
                    url: 'backend/save_general_settings.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Show success toast
                        showToast('General settings saved successfully.');
                    },
                    error: function () {
                        // Show error toast
                        showToast('Failed to save General settings.');
                    }
                });
            });

            // Handle Security Settings Form Submission
            $('#securitySettingsForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serialize();

                // AJAX request to save security settings
                $.ajax({
                    url: 'backend/save_security_settings.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Show success toast
                        showToast('Security settings saved successfully.');
                    },
                    error: function () {
                        // Show error toast
                        showToast('Failed to save Security settings.');
                    }
                });
            });

            // Handle Notification Templates Form Submission
            $('#notificationTemplatesForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serialize();

                // AJAX request to save notification templates
                $.ajax({
                    url: 'backend/save_notification_templates.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Show success toast
                        showToast('Notification templates saved successfully.');
                    },
                    error: function () {
                        // Show error toast
                        showToast('Failed to save Notification templates.');
                    }
                });
            });

            // Handle Backup Settings Form Submission
            $('#backupSettingsForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serialize();

                // AJAX request to save backup settings
                $.ajax({
                    url: 'backend/save_backup_settings.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Show success toast
                        showToast('Backup settings saved successfully.');
                    },
                    error: function () {
                        // Show error toast
                        showToast('Failed to save Backup settings.');
                    }
                });
            });
        });

        // Function to show toast notifications
        function showToast(message) {
            $('#liveToast .toast-body').text(message);
            var toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }

        // Handle Edit Agency Form Submission
        $('#editAgencyForm').on('submit', function (e) {
            e.preventDefault();
            // Collect form data
            var formData = $(this).serialize();

            // AJAX request to update agency details
            $.ajax({
                url: 'backend/update_agency.php',
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Show success toast
                    showToast('Agency details updated successfully.');
                },
                error: function () {
                    // Show error toast
                    showToast('Failed to update Agency details.');
                }
            });
        });
    </script>
</body>

</html>
