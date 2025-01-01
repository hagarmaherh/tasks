<?php
include 'config.php'; 


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // delete from the data base
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        
        header("Location: table.php"); 
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

}
?>
