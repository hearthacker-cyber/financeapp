<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve selected customer IDs from query parameters
$customerIds = isset($_GET['customers']) ? explode(',', $_GET['customers']) : [];

// Check if customer IDs are provided
if (empty($customerIds)) {
    echo "<h2>No customers selected!</h2>";
    exit;
}

// Placeholder: Fetch customer details based on IDs (replace this with database logic)
$customers = [
    1 => ["name" => "John Doe", "contact" => "9876543210", "loanProduct" => "Personal Loan"],
    2 => ["name" => "Mary Smith", "contact" => "9123456789", "loanProduct" => "Vehicle Loan"],
    3 => ["name" => "Robert Brown", "contact" => "9988776655", "loanProduct" => "Home Loan"],
];

// Filter selected customers
$selectedCustomers = array_filter($customers, function ($key) use ($customerIds) {
    return in_array($key, $customerIds);
}, ARRAY_FILTER_USE_KEY);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Send Reminder - CRM Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid">

    <!-- Begin page -->
    <div class="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <h2 class="mt-4 mb-4">Send Reminders</h2>

                    <form id="reminderForm" method="POST">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Contact Number</th>
                                        <th>Loan Product</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($selectedCustomers as $id => $customer) {
                                        echo "<tr>
                                                <td>{$count}</td>
                                                <td>{$customer['name']}</td>
                                                <td>{$customer['contact']}</td>
                                                <td>{$customer['loanProduct']}</td>
                                                <td>
                                                    <textarea class='form-control' name='message[{$id}]' rows='2'>Dear {$customer['name']}, your payment is overdue. Please pay immediately.</textarea>
                                                </td>
                                            </tr>";
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Send Reminders</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Submit reminder form via AJAX
            $('#reminderForm').on('submit', function (e) {
                e.preventDefault();

                // Gather form data
                var formData = $(this).serializeArray();
                console.log(formData); // For debugging

                // Placeholder for sending AJAX request to backend API
                alert("Reminders sent successfully!");

                // Example AJAX (replace with actual endpoint)
                // $.post('/api/send-reminders', formData, function(response) {
                //     alert(response.message);
                // }).fail(function() {
                //     alert("Failed to send reminders. Please try again.");
                // });
            });
        });
    </script>
</body>

</html>
