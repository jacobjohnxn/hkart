<?php
include "./connection.php";
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "DELETE FROM cart WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    
    if ($stmt->execute()) {
        echo "Product deleted successfully";
        header("Location: order_status_admin.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
    $stmt->close();
}



$conn->close();
?>