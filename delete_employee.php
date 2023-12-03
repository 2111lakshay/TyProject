<?php
session_start();
require_once "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete employee record from empdetails table
    $deleteSql = "DELETE FROM `empdetails` WHERE id = $id";
    
    if ($conn->query($deleteSql) === TRUE) {
        // Deletion successful, redirect back to the employee registration data page
        header("Location: EmpDetails.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
