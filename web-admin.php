<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "it_solutions_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to update the title
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['title'])) {
    $newTitle = $conn->real_escape_string($_POST['title']);
    $updateSql = "UPDATE settings SET title = '$newTitle' WHERE id = 1";

    if ($conn->query($updateSql) === TRUE) {
        $message = "Title updated successfully!";
    } else {
        $message = "Error updating title: " . $conn->error;
    }
}

// Fetch the current title from the database
$sql = "SELECT title FROM settings WHERE id = 1";
$result = $conn->query($sql);
$currentTitle = "";

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentTitle = $row['title'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Update Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin Panel</h1>
        <?php if (isset($message)): ?>
            <div class="alert alert-info text-center"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="title" class="form-label">Current Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($currentTitle); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Title</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
