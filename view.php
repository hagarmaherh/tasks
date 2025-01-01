<?php
include 'config.php'; // Include database connection

$id = $_GET['id'] ?? null;
$row = null;

if ($id) {
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">View Record</h1>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php elseif ($row): ?>
            <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
            <p><strong>Gender:</strong> <?=($row['gender'])?></p>
            <p><strong>Receive Emails:</strong> <?= $row['receive_emails'] ? 'Yes' : 'No' ?></p>
        <?php else: ?>
            <div class="alert alert-warning">No data available.</div>
        <?php endif; ?>

        <a href="index.php" style="background: #28a745;" class="btn btn-primary">Back</a>
    </div>
</body>
</html>
