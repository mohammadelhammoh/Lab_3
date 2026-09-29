<?php
$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $databaseName = trim($_POST["database_name"] ?? "");

    $conn = new mysqli("localhost", "root", "");

    if ($conn->connect_error) {
        $message = "Connection failed: " . $conn->connect_error;
        $messageType = "danger";
    } elseif ($databaseName === "") {
        $message = "Please enter a database name.";
        $messageType = "warning";
    } elseif (!preg_match('/^[A-Za-z0-9_]+$/', $databaseName)) {
        $message = "Database name may contain only letters, numbers, and underscores.";
        $messageType = "warning";
    } else {
        $sql = "CREATE DATABASE `$databaseName`";

        if ($conn->query($sql) === TRUE) {
            $message = "Database created successfully: " . htmlspecialchars($databaseName);
            $messageType = "success";
        } else {
            $message = "Error creating database: " . $conn->error;
            $messageType = "danger";
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="mb-4">Create Database</h2>

                    <?php if ($message): ?>
                        <div class="alert alert-<?= $messageType ?>"><?= $message ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Database Name</label>
                            <input type="text" name="database_name" class="form-control"
                                   placeholder="e.g. wis_lab" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Database</button>
                    </form>

                    <div class="mt-4">
                        <a href="create_table.php" class="btn btn-secondary">Go to Create Table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
