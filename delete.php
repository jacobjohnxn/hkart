<?php
include "./connection.php";
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "DELETE FROM hkartproducts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    
    if ($stmt->execute()) {
        echo "Product deleted successfully";
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
    $stmt->close();
}



$conn->close();
?>