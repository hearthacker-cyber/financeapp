<?php
// download_report.php


// Check if 'report_id' is provided
if (!isset($_GET['report_id']) || empty($_GET['report_id'])) {
    die("Invalid request.");
}

$report_id = $_GET['report_id'];

// Sanitize the report_id to prevent directory traversal
$report_id = preg_replace('/[^A-Za-z0-9_\-]/', '', $report_id);

// Define the path to the reports directory
$reports_dir = __DIR__ . '/reports/';

// Define the file extension (assuming PDF reports)
$file_extension = '.pdf';

// Construct the full file path
$file_path = $reports_dir . $report_id . $file_extension;

// Check if the file exists
if (!file_exists($file_path)) {
    die("Report not found.");
}

// Set headers to initiate file download
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file_path));

// Clear output buffering
ob_clean();
flush();

// Read the file and send it to the user
readfile($file_path);
exit();
?>
