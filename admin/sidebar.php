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
                <a href="admin_dashboard.php" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard Overview </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Management</li>

            <!-- User Role Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUserRole" aria-expanded="false" aria-controls="sidebarUserRole" class="side-nav-link">
                    <i class="uil-user-circle"></i>
                    <span>Agency Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUserRole">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="manage_agency_admins.php">Manage Agencies</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Package Management -->


            <!-- System Monitoring -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSystemMonitoring" aria-expanded="false" aria-controls="sidebarSystemMonitoring" class="side-nav-link">
                    <i class="uil-chart-line"></i>
                    <span> System Monitoring </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSystemMonitoring">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="system_usage.php">System Usage</a>
                        </li>
                        <li>
                            <a href="performance_metrics.php">Performance Metrics</a>
                        </li>
                        <li>
                            <a href="user_activities.php">User Activities</a>
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
                            <a href="loan_reports.php">Loan Reports</a>
                        </li>
                        <li>
                            <a href="payment_reports.php">Payment Reports</a>
                        </li>
                        <li>
                            <a href="overdue_reports.php">Overdue Reports</a>
                        </li>
                        <li>
                            <a href="subscription_reports.php">Subscription Reports</a>
                        </li>
                        <li>
                            <a href="system_reports.php">System Reports</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item">Settings</li>

            <!-- Subscription Package -->
            <li class="side-nav-item">
                <a href="subscription_packages.php" class="side-nav-link">
                    <i class="uil-box"></i>
                    <span> Subscription Packages </span>
                </a>
            </li>

            <!-- System Settings -->
            <li class="side-nav-item">
                <a href="system_settings.php" class="side-nav-link">
                    <i class="uil-cog"></i>
                    <span> System Settings </span>
                </a>
            </li>

            <!-- User Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUserManagement" aria-expanded="false" aria-controls="sidebarUserManagement" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Decconz Agent Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUserManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="user_list.php">User List</a>
                        </li>
                    </ul>
                </div>
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
