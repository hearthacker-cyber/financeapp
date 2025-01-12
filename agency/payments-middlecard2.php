<div class="container mt-4">
    <!-- Overdue Customers Table -->
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Overdue Customers</h4>
            <table class="table table-striped table-hover" id="overdueTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Vehicle Number</th>
                        <th>Pending Amount</th>
                        <th>Overdue Duration (Days)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Data for Overdue Customers -->
                    <tr>
                        <td>1</td>
                        <td>Raja Muthiah</td>
                        <td>9876543210</td>
                        <td>TN10AB1234</td>
                        <td>₹30,000</td>
                        <td>15 Days</td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="makeIVRCall('9876543210')">Send IVR Call</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kumarasamy</td>
                        <td>9988776655</td>
                        <td>TN22XY5678</td>
                        <td>₹10,000</td>
                        <td>7 Days</td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="makeIVRCall('9988776655')">Send IVR Call</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Meenakshi Sundaram</td>
                        <td>9098765432</td>
                        <td>TN07CD8901</td>
                        <td>₹20,000</td>
                        <td>30 Days</td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="makeIVRCall('9098765432')">Send IVR Call</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script for IVR Call -->
<script>
    function makeIVRCall(contact) {
        alert(`Initiating IVR call to ${contact}`);
        // Example API integration with Twilio or Exotel can be added here
        console.log(`Calling ${contact} via IVR...`);
    }
</script>
