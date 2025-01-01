<?php
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ??'' ; 
    $receive_emails = isset($_POST['receive_emails']) ? 1 : 0;

    
    if (!empty($name) && !empty($email) && !empty($gender)) {
        
        // inserting
        $stmt = $conn->prepare("INSERT INTO users (name, email, gender, receive_emails) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $email, $gender, $receive_emails);


        if ($stmt->execute()) {
            // Redirect to success page or view page
            header("Location: view.php?id=" . $stmt->insert_id);
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
    <title>User Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">User Registration Form</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Gender</label><br>
            <input type="radio" name="gender" value="male" required> Male
            <input type="radio" name="gender" value="female" required> Female

            </div>

            <div class="form-group">
                <input type="checkbox" name="receive_emails" id="receive_emails">
                <label for="receive_emails">Receive Emails from us</label>
            </div>
            <button type="submit" class ="btn btn-primary"  style="background: #28a745; ">Submit</button>
        </form>
    </div>
</body>
</html>
