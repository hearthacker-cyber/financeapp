<?php
// Database Configuration

// Database credentials
$servername = "srv1124.hstgr.io";
$username   = "u632480160_finance";
$password   = "@Babahelp13";
$dbname     = "u632480160_finance";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set the character set to UTF-8
mysqli_set_charset($conn, "utf8mb4");

// You can now use the $conn variable to interact with your database

?>
