<?php
include 'config.php'; // Include database connection

$id = $_GET['id'] ?? null;
$row = null;

if ($id) {
    // Fetch data for the given ID
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $error = "No record found for ID $id.";
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated data from the form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? ''; 
    $receive_emails = isset($_POST['receive_emails']) ? 1 : 0;

    if ($name && $email && $gender) {
        // Update the data in the database
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, gender = ?, receive_emails = ? WHERE id = ?");
        $stmt->bind_param("sssii", $name, $email, $gender, $receive_emails, $id);

        if ($stmt->execute()) {
            // Redirect to the view page after update
            header("Location: view.php?id=" . $id);
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit User</h1>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php elseif ($row): ?>
            <!-- Edit Form -->
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Gender</label><br>
                    <input type="radio" name="gender" value="Male" <?= ($row['gender'] === 'Male') ? 'checked' : '' ?> required> Male
                    <input type="radio" name="gender" value="Female" <?= ($row['gender'] === 'Female') ? 'checked' : '' ?> required> Female
                </div>
                <div class="form-group">
                    <input type="checkbox" name="receive_emails" id="receive_emails" <?= ($row['receive_emails'] == 1) ? 'checked' : '' ?>>
                    <label for="receive_emails">Receive Emails from us</label>
                </div>
                <button type="submit" style="background: #28a745;" class="btn btn-primary">Update</button><BR>
            </form>
        <?php else: ?>
            <div class="alert alert-warning">No data available.</div>
        <?php endif; ?>

        <a href="index.php" style="background: #28a745;" class="btn btn-primary">Back</a>
    </div>
</body>
</html>
