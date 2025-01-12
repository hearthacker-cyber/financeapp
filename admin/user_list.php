<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Field Agents - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CRM Dashboard for Managing Field Agents" name="description" />
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

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Start Page Title -->
                    <?php include 'includes/title.php'; ?>
                    <!-- End Page Title -->

                    <!-- Field Agents Management -->
                    <div class="mb-4">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAgentModal">
                            <i class="mdi mdi-plus-circle-outline me-1"></i> Add New Agent
                        </button>
                    </div>

                    <!-- DataTables -->
                    <div class="table-responsive">
                        <table id="agentTable" class="table table-bordered table-hover table-striped table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Agent Name</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Assigned Area</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Data Rows -->
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>9876543210</td>
                                    <td>john.doe@example.com</td>
                                    <td>Mumbai West</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAgent(1)" title="Edit Agent" aria-label="Edit Agent">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deactivateAgent(1)" title="Deactivate Agent" aria-label="Deactivate Agent">
                                            <i class="mdi mdi-account-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>9123456789</td>
                                    <td>jane.smith@example.com</td>
                                    <td>Delhi South</td>
                                    <td>Inactive</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="editAgent(2)" title="Edit Agent" aria-label="Edit Agent">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm" onclick="activateAgent(2)" title="Activate Agent" aria-label="Activate Agent">
                                            <i class="mdi mdi-account-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'includes/footer.php'; ?>
            <!-- End Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include 'includes/rightbar.php'; ?>
    <div class="rightbar-overlay"></div>

    <!-- Add Agent Modal -->
    <div class="modal fade" id="addAgentModal" tabindex="-1" aria-labelledby="addAgentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addAgentForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAgentModalLabel">Add New Field Agent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Basic Agent Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="agentName" class="form-label">Agent Name</label>
                                <input type="text" class="form-control" id="agentName" name="agentName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" pattern="\d{10}" title="Enter a 10-digit contact number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="agentEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="agentEmail" name="agentEmail" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="assignedArea" class="form-label">Assigned Area</label>
                                <input type="text" class="form-control" id="assignedArea" name="assignedArea" required>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="agentStatus" class="form-label">Status</label>
                            <select class="form-select" id="agentStatus" name="agentStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Agent</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Agent Modal -->
    <div class="modal fade" id="editAgentModal" tabindex="-1" aria-labelledby="editAgentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editAgentForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAgentModalLabel">Edit Field Agent Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for Agent ID -->
                        <input type="hidden" id="editAgentId" name="agentId">

                        <!-- Basic Agent Details -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editAgentName" class="form-label">Agent Name</label>
                                <input type="text" class="form-control" id="editAgentName" name="agentName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editContactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="editContactNumber" name="contactNumber" pattern="\d{10}" title="Enter a 10-digit contact number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editAgentEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editAgentEmail" name="agentEmail" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editAssignedArea" class="form-label">Assigned Area</label>
                                <input type="text" class="form-control" id="editAssignedArea" name="assignedArea" required>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="editAgentStatus" class="form-label">Status</label>
                            <select class="form-select" id="editAgentStatus" name="agentStatus" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Agent</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
            // Initialize DataTable for Field Agents
            var agentTable = $('#agentTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": -1 } // Make Actions column non-orderable
                ],
                "language": {
                    "search": "Search Agents:",
                    "lengthMenu": "Show _MENU_ agents",
                    "info": "Showing _START_ to _END_ of _TOTAL_ agents"
                }
            });

            // Handle Add Agent Form Submission
            $('#addAgentForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serialize();

                // AJAX request to add new agent
                $.ajax({
                    url: 'backend/add_agent.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Parse the JSON response
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            // Add new row to DataTable
                            agentTable.row.add([
                                res.agent.id,
                                res.agent.name,
                                res.agent.contactNumber,
                                res.agent.email,
                                res.agent.assignedArea,
                                res.agent.status,
                                '<button class="btn btn-primary btn-sm" onclick="editAgent(' + res.agent.id + ')" title="Edit Agent" aria-label="Edit Agent">' +
                                '<i class="mdi mdi-pencil"></i></button> ' +
                                (res.agent.status === 'Active' ?
                                    '<button class="btn btn-danger btn-sm" onclick="deactivateAgent(' + res.agent.id + ')" title="Deactivate Agent" aria-label="Deactivate Agent">' +
                                    '<i class="mdi mdi-account-remove"></i></button>' :
                                    '<button class="btn btn-success btn-sm" onclick="activateAgent(' + res.agent.id + ')" title="Activate Agent" aria-label="Activate Agent">' +
                                    '<i class="mdi mdi-account-plus"></i></button>')
                            ]).draw(false);

                            // Reset the form and hide the modal
                            $('#addAgentForm')[0].reset();
                            $('#addAgentModal').modal('hide');

                            // Show success toast
                            showToast('Field Agent added successfully.');
                        } else {
                            // Show error toast with message
                            showToast(res.message);
                        }
                    },
                    error: function () {
                        // Show generic error toast
                        showToast('Failed to add Field Agent.');
                    }
                });
            });

            // Handle Edit Agent Form Submission
            $('#editAgentForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = $(this).serialize();

                // AJAX request to update agent details
                $.ajax({
                    url: 'backend/update_agent.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Parse the JSON response
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            // Find the row in DataTable and update it
                            agentTable.rows().every(function () {
                                var data = this.data();
                                if (data[0] == res.agent.id) {
                                    this.data([
                                        res.agent.id,
                                        res.agent.name,
                                        res.agent.contactNumber,
                                        res.agent.email,
                                        res.agent.assignedArea,
                                        res.agent.status,
                                        '<button class="btn btn-primary btn-sm" onclick="editAgent(' + res.agent.id + ')" title="Edit Agent" aria-label="Edit Agent">' +
                                        '<i class="mdi mdi-pencil"></i></button> ' +
                                        (res.agent.status === 'Active' ?
                                            '<button class="btn btn-danger btn-sm" onclick="deactivateAgent(' + res.agent.id + ')" title="Deactivate Agent" aria-label="Deactivate Agent">' +
                                            '<i class="mdi mdi-account-remove"></i></button>' :
                                            '<button class="btn btn-success btn-sm" onclick="activateAgent(' + res.agent.id + ')" title="Activate Agent" aria-label="Activate Agent">' +
                                            '<i class="mdi mdi-account-plus"></i></button>')
                                    ]).draw(false);
                                }
                            });

                            // Reset the form and hide the modal
                            $('#editAgentForm')[0].reset();
                            $('#editAgentModal').modal('hide');

                            // Show success toast
                            showToast('Field Agent updated successfully.');
                        } else {
                            // Show error toast with message
                            showToast(res.message);
                        }
                    },
                    error: function () {
                        // Show generic error toast
                        showToast('Failed to update Field Agent.');
                    }
                });
            });
        });

        // Function to handle Edit Agent
        function editAgent(agentId) {
            // Fetch agent details via AJAX
            $.ajax({
                url: 'backend/get_agent.php',
                type: 'GET',
                data: { id: agentId },
                success: function (response) {
                    // Parse the JSON response
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        // Populate the edit form with existing data
                        $('#editAgentId').val(res.agent.id);
                        $('#editAgentName').val(res.agent.name);
                        $('#editContactNumber').val(res.agent.contactNumber);
                        $('#editAgentEmail').val(res.agent.email);
                        $('#editAssignedArea').val(res.agent.assignedArea);
                        $('#editAgentStatus').val(res.agent.status);

                        // Show the Edit Agent Modal
                        $('#editAgentModal').modal('show');
                    } else {
                        // Show error toast with message
                        showToast(res.message);
                    }
                },
                error: function () {
                    // Show generic error toast
                    showToast('Failed to fetch agent details.');
                }
            });
        }

        // Function to deactivate Agent
        function deactivateAgent(agentId) {
            if (confirm('Are you sure you want to deactivate this agent?')) {
                // AJAX request to deactivate agent
                $.ajax({
                    url: 'backend/deactivate_agent.php',
                    type: 'POST',
                    data: { id: agentId },
                    success: function (response) {
                        // Parse the JSON response
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            // Update the agent's status in DataTable
                            agentTable.rows().every(function () {
                                var data = this.data();
                                if (data[0] == res.agent.id) {
                                    this.data([
                                        res.agent.id,
                                        res.agent.name,
                                        res.agent.contactNumber,
                                        res.agent.email,
                                        res.agent.assignedArea,
                                        res.agent.status,
                                        '<button class="btn btn-primary btn-sm" onclick="editAgent(' + res.agent.id + ')" title="Edit Agent" aria-label="Edit Agent">' +
                                        '<i class="mdi mdi-pencil"></i></button> ' +
                                        '<button class="btn btn-danger btn-sm" onclick="deactivateAgent(' + res.agent.id + ')" title="Deactivate Agent" aria-label="Deactivate Agent">' +
                                        '<i class="mdi mdi-account-remove"></i></button>'
                                    ]).draw(false);
                                }
                            });

                            // Show success toast
                            showToast('Field Agent deactivated successfully.');
                        } else {
                            // Show error toast with message
                            showToast(res.message);
                        }
                    },
                    error: function () {
                        // Show generic error toast
                        showToast('Failed to deactivate Field Agent.');
                    }
                });
            }
        }

        // Function to activate Agent
        function activateAgent(agentId) {
            if (confirm('Are you sure you want to activate this agent?')) {
                // AJAX request to activate agent
                $.ajax({
                    url: 'backend/activate_agent.php',
                    type: 'POST',
                    data: { id: agentId },
                    success: function (response) {
                        // Parse the JSON response
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            // Update the agent's status in DataTable
                            agentTable.rows().every(function () {
                                var data = this.data();
                                if (data[0] == res.agent.id) {
                                    this.data([
                                        res.agent.id,
                                        res.agent.name,
                                        res.agent.contactNumber,
                                        res.agent.email,
                                        res.agent.assignedArea,
                                        res.agent.status,
                                        '<button class="btn btn-primary btn-sm" onclick="editAgent(' + res.agent.id + ')" title="Edit Agent" aria-label="Edit Agent">' +
                                        '<i class="mdi mdi-pencil"></i></button> ' +
                                        '<button class="btn btn-success btn-sm" onclick="activateAgent(' + res.agent.id + ')" title="Activate Agent" aria-label="Activate Agent">' +
                                        '<i class="mdi mdi-account-plus"></i></button>'
                                    ]).draw(false);
                                }
                            });

                            // Show success toast
                            showToast('Field Agent activated successfully.');
                        } else {
                            // Show error toast with message
                            showToast(res.message);
                        }
                    },
                    error: function () {
                        // Show generic error toast
                        showToast('Failed to activate Field Agent.');
                    }
                });
            }
        }

        // Function to show toast notifications
        function showToast(message) {
            $('#liveToast .toast-body').text(message);
            var toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }
    </script>
</body>

</html>
