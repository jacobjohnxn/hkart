<?php
include "./connection.php";
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "DELETE FROM auth WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "Product deleted successfully";
        header("Location: admin.php");
        exit(); 
        echo "Error deleting product: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
