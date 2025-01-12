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

            <!-- Dashboard Overview -->
            <li class="side-nav-item">
                <a href="admin_dashboard.php" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard Overview </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Management</li>

            <!-- User Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUserManagement" aria-expanded="false" aria-controls="sidebarUserManagement" class="side-nav-link">
                    <i class="uil-user-circle"></i>
                    <span> User Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUserManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="manage_agency_admins.php">Manage Users</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Field Agent Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarFieldAgentManagement" aria-expanded="false" aria-controls="sidebarFieldAgentManagement" class="side-nav-link">
                    <i class="uil-user-plus"></i>
                    <span> Field Agent Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarFieldAgentManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="user_list.php">Manage Field Agents</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- System Settings -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSystemSettings" aria-expanded="false" aria-controls="sidebarSystemSettings" class="side-nav-link">
                    <i class="uil-cog"></i>
                    <span> System Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSystemSettings">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="general_settings.php">General Settings</a>
                        </li>
                        <li>
                            <a href="email_settings.php">Email Settings</a>
                        </li>
                        <li>
                            <a href="payment_settings.php">Payment Settings</a>
                        </li>
                        <li>
                            <a href="api_integrations.php">API Integrations</a>
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
                            <a href="user_activity_reports.php">User Activity Reports</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Analytics -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAnalytics" aria-expanded="false" aria-controls="sidebarAnalytics" class="side-nav-link">
                    <i class="uil-chart-bar"></i>
                    <span> Analytics </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAnalytics">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="sales_analytics.php">Sales Analytics</a>
                        </li>
                        <li>
                            <a href="user_engagement.php">User Engagement</a>
                        </li>
                        <li>
                            <a href="financial_overview.php">Financial Overview</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Notifications -->
            <li class="side-nav-item">
                <a href="notifications.php" class="side-nav-link">
                    <i class="uil-bell"></i>
                    <span> Notifications </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Settings</li>

            <!-- Subscription Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSubscriptionManagement" aria-expanded="false" aria-controls="sidebarSubscriptionManagement" class="side-nav-link">
                    <i class="uil-box"></i>
                    <span> Subscription Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSubscriptionManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="manage_subscriptions.php">Manage Subscriptions</a>
                        </li>
                        <li>
                            <a href="subscription_packages.php">Subscription Packages</a>
                        </li>
                        <li>
                            <a href="billing_settings.php">Billing Settings</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Audit Logs -->
            <li class="side-nav-item">
                <a href="audit_logs.php" class="side-nav-link">
                    <i class="uil-file-alt"></i>
                    <span> Audit Logs </span>
                </a>
            </li>

            <!-- Help Center -->
            <li class="side-nav-item">
                <a href="help_center.php" class="side-nav-link">
                    <i class="uil-question-circle"></i>
                    <span> Help Center </span>
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
