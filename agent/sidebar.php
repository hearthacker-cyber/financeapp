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

            <!-- Navigation Title -->
            <li class="side-nav-title side-nav-item">Navigation</li>

            <!-- Dashboard Overview -->
            <li class="side-nav-item">
                <a href="agent_dashboard.php" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard Overview </span>
                </a>
            </li>

            <!-- Management Title -->
            <li class="side-nav-title side-nav-item">Management</li>

            <!-- Agency Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAgencyManagement" aria-expanded="false" aria-controls="sidebarAgencyManagement" class="side-nav-link">
                    <i class="uil-building"></i>
                    <span> Agency Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAgencyManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="create_agency.php">Create Agency</a>
                        </li>
                        <li>
                            <a href="manage_agencies.php">Manage Agencies</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Reports Title -->
            <li class="side-nav-title side-nav-item">Reports</li>

            <!-- Reports Management -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarReports" aria-expanded="false" aria-controls="sidebarReports" class="side-nav-link">
                    <i class="mdi mdi-chart-box-outline"></i>
                    <span> Reports </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarReports">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="view_reports.php">View Reports</a>
                        </li>
                        <li>
                            <a href="generate_report.php">Generate Report</a>
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
