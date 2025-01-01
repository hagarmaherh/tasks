<?php
include 'config.php'; // Include database connection

// Fetch all records from the 'users' table
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
        /* Custom table styles */
        .table th {
            background-color:rgb(117, 180, 150);
            color: white;
        }
        .table td {
            background-color: #f8f9fa;
        }
        .table tbody tr:nth-child(even) td {
            background-color: #e9ecef;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table .yes {
            color: green;
            font-weight: bold;
        }
        .table .no {
            color: red;
            font-weight: bold;
        }
        .alert {
            background-color:rgb(56, 114, 67);
        }
        /* Icon size */
        .action-icons i {
            font-size: 20px;
            margin: 0 10px;
            cursor: pointer;
        }
        .action-icons .view {
            color:rgb(33, 68, 129);
        }
        .action-icons .edit {
            color: #28a745;
        }
        .action-icons .delete {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">View All Records</h1>

        <!-- Table to display all records -->
        <?php if ($result && $result->num_rows == 0): ?>
            <div class="alert alert-danger">No records found.</div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Receive Emails</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . ($row['gender']) . "</td>";
                        echo "<td class='" . ($row['receive_emails'] ? 'yes' : 'no') . "'>" . ($row['receive_emails'] ? 'Yes' : 'No') . "</td>";
                        echo "<td class='action-icons'>";
                        echo "<a href='view.php?id=" . htmlspecialchars($row['id']) . "'><i class='bi bi-eye view' title='View'></i></a>";
                        echo "<a href='edit.php?id=" . htmlspecialchars($row['id']) . "'><i class='bi bi-pencil-square edit' title='Edit'></i></a>";
                        echo "<a href='delete.php?delete_id=" . htmlspecialchars($row['id']) . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'><i class='bi bi-trash delete' title='Delete'></i></a>";echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" style="background: #28a745;" class="btn btn-primary">Back</a>
    </div>
</body>
</html>
