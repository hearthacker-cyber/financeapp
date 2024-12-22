<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.php" class="logo text-center logo-light">
        <span class="logo-lg">
            <h2 style="color: white;">Decconz</h2>
        </span>
        <span class="logo-sm">
            <h4 style="color: black;">D</h4>
        </span>
    </a>

    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <h2 style="color: black;">Decconz</h2>
        </span>
        <span class="logo-sm">
            <h4 style="color: black;">D</h4>
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!-- Sidebar Navigation -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="index.php" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard Overview </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Management</li>

            <!-- Loan Product Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLoanProducts" aria-expanded="false" aria-controls="sidebarLoanProducts" class="side-nav-link">
                    <i class="uil-money-withdraw"></i>
                    <span> Loan Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLoanProducts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="loan.php">Product List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Customer Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCustomerManagement" aria-expanded="false" aria-controls="sidebarCustomerManagement" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Customers </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCustomerManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="customers.php">Customer List</a>
                        </li>
                        <li>
                            <a href="customers-loans.html">Customer Loans</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Payment Schedule -->
            <li class="side-nav-item">
                <a href="loan-calender.php" class="side-nav-link">
                    <i class="uil-schedule"></i>
                    <span> Payment Schedules </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="calendar.php" class="side-nav-link">
                    <i class="uil-schedule"></i>
                    <span> Payment Calendar </span>
                </a>
            </li>

            <!-- Overdue Management -->
            <li class="side-nav-item">
                <a href="overdue.php" class="side-nav-link">
                    <i class="uil-clock"></i>
                    <span> Overdue Management </span>
                </a>
            </li>

            <!-- Communication -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCommunication" aria-expanded="false" aria-controls="sidebarCommunication" class="side-nav-link">
                    <i class="uil-comment-alt-message"></i>
                    <span> Communication </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCommunication">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="ivr.php">IVR Calls</a>
                        </li>
                        <li>
                            <a href="communication-manual.html">Manual Calls</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Reports -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarReports" aria-expanded="false" aria-controls="sidebarReports" class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span> Reports </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarReports">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="report.php">Loan Reports</a>
                        </li>
                        <li>
                            <a href="reports-payments.html">Payment Reports</a>
                        </li>
                        <li>
                            <a href="reports-overdue.html">Overdue Reports</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item">Settings</li>

            <!-- Subscription Package -->
            <li class="side-nav-item">
                <a href="package-overview.html" class="side-nav-link">
                    <i class="uil-box"></i>
                    <span> Subscription Package </span>
                </a>
            </li>
        </ul>

        <!-- Help Box -->
        <div class="help-box text-white text-center">
            <h5 class="mt-3">Need Assistance?</h5>
            <p class="mb-3">Contact support for help with your dashboard.</p>
            <p><strong>Helpline:</strong> 7200314099</p>
            <p><strong>Available:</strong> 24/7</p>
        </div>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
