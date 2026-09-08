<?php
$message = "";
$messageType = "";

$fullName = "";
$email = "";
$department = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST["full_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $department = trim($_POST["department"] ?? "");

    if ($fullName === "" || $email === "" || $department === "") {
        $message = "All fields are required.";
        $messageType = "warning";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
        $messageType = "warning";
    } else {
        $conn = new mysqli("localhost", "root", "", "wis_lab");

        if ($conn->connect_error) {
            $message = "Connection failed: " . $conn->connect_error;
            $messageType = "danger";
        } else {
            $stmt = $conn->prepare(
                "INSERT INTO students (full_name, email, department) VALUES (?, ?, ?)"
            );

            if ($stmt) {
                $stmt->bind_param("sss", $fullName, $email, $department);

                if ($stmt->execute()) {
                    $message = "Student added successfully.";
                    $messageType = "success";
                    $fullName = "";
                    $email = "";
                    $department = "";
                } else {
                    $message = "Error inserting student: " . $stmt->error;
                    $messageType = "danger";
                }

                $stmt->close();
            } else {
                $message = "Error preparing statement: " . $conn->error;
                $messageType = "danger";
            }

            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="mb-4">Add Student</h2>

                    <?php if ($message): ?>
                        <div class="alert alert-<?= $messageType ?>"><?= htmlspecialchars($message) ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control"
                                   value="<?= htmlspecialchars($fullName) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($email) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <input type="text" name="department" class="form-control"
                                   value="<?= htmlspecialchars($department) ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Student</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                    </form>

                    <hr class="my-4">

                    <div class="d-flex gap-2">
                        <a href="create_database.php" class="btn btn-outline-secondary">Create Database</a>
                        <a href="create_table.php" class="btn btn-outline-secondary">Create Table</a>
                    </div>

                    <div class="mt-4">
                        <h5>Test Data</h5>
                        <ul class="mb-0">
                            <li>Ahmad Rahimi — ahmad@example.com — Information Systems</li>
                            <li>Laila Noori — laila@example.com — Computer Science</li>
                            <li>Farid Hamidi — farid@example.com — Software Engineering</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
