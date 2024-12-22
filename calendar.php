<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Payment Collection Calendar - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Payment Collection Calendar" name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- FullCalendar CSS (v5) -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />

    

    <!-- Custom Calendar Style -->
    <style>
        #calendar {
            max-width: 900px;
        }
        .fc-event-title {
            font-size: 14px !important;
            color: #ffffff !important; /* White text */
        }
        .fc-event {
            background-color: #007bff !important; /* Blue background */
            border: none !important;
        }
    </style>
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">

    <!-- Begin page -->
    <div class="wrapper">
        <!-- Include Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Start Page Content -->
        <div class="content-page">
            <div class="content">
                <!-- Include Topbar -->
                <?php include 'topbar.php'; ?>

                <!-- Start Content -->
                <div class="container-fluid">
                    <!-- Page Title -->
                    <?php include 'title.php'; ?>

                    <!-- Calendar Section -->
                    <div id="calendar"></div>
                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Include Footer -->
            <?php include 'footer.php'; ?>
        </div>
        <!-- End Page content -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include 'rightbar.php'; ?>
    <div class="rightbar-overlay"></div>

    <!-- Payment Details Modal -->
    <div class="modal fade" id="eventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventDetailsModalLabel">Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="eventDetailsBody">
                    <!-- Payment details will be dynamically added here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- FullCalendar JS (v5) -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <!-- Bootstrap JS for Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sample payment data
            var paymentData = [
                {
                    customerId: 1,
                    customerName: "John Doe",
                    contactNumber: "9876543210",
                    loanProduct: "Personal Loan",
                    paymentDate: "2024-10-01",
                    amount: 5000.00,
                    overdueDays: 5,
                    overdueAmount: 5250.00
                },
                {
                    customerId: 2,
                    customerName: "Mary Smith",
                    contactNumber: "9123456789",
                    loanProduct: "Vehicle Loan",
                    paymentDate: "2024-09-28",
                    amount: 2000.00,
                    overdueDays: 10,
                    overdueAmount: 2500.00
                }
            ];

            // Map payment data to FullCalendar events
            var events = paymentData.map(function(payment) {
                return {
                    title: payment.customerName + " - ₹" + payment.amount.toFixed(2),
                    start: payment.paymentDate,
                    extendedProps: {
                        customerName: payment.customerName,
                        contactNumber: payment.contactNumber,
                        loanProduct: payment.loanProduct,
                        overdueDays: payment.overdueDays,
                        overdueAmount: payment.overdueAmount
                    }
                };
            });

            // Initialize FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: events,
                eventClick: function(info) {
                    // Display payment details in Bootstrap modal
                    var props = info.event.extendedProps;
                    var modalBody = `
                        <p><strong>Customer Name:</strong> ${props.customerName}</p>
                        <p><strong>Contact:</strong> ${props.contactNumber}</p>
                        <p><strong>Loan Product:</strong> ${props.loanProduct}</p>
                        <p><strong>Overdue Days:</strong> ${props.overdueDays}</p>
                        <p><strong>Overdue Amount:</strong> ₹${props.overdueAmount.toFixed(2)}</p>
                    `;
                    document.getElementById('eventDetailsBody').innerHTML = modalBody;
                    $('#eventDetailsModal').modal('show');
                }
            });

            // Render the calendar
            calendar.render();
        });
    </script>
</body>
</html>
