<?php
include "./connection.php";
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "UPDATE cart set order_status = 'cancelled' where id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    
    if ($stmt->execute()) {
        echo "Product deleted successfully";
        header("Location: orders.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
    $stmt->close();
}



$conn->close();
?>