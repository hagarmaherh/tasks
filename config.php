<?php
$servername = "localhost";
$username = "hagar";
$password = "123";
$dbname = "cms_alex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql ="CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender enum('Male', 'Female') NOT NULL,
    receive_emails TINYINT(1) DEFAULT 0
);";
// $sql ="ALTER TABLE `users` CHANGE `gender` `gender` VARCHAR('Male','Female') 
// CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'male';";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $gender = $_POST['gender'] ?? ''; 
    $receive_emails = isset($_POST['receive_emails']) ? 1 : 0;

    // Validate data
    if ($name && $email && $gender) {
        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO users (name, email, gender, receive_emails) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $email, $gender, $receive_emails);
       
        $stmt->close();
    
    }
}
?>
