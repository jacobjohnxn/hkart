<?php
include "./connection.php";
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $order_status = $_POST['order_status'];

    // Update the order status in the cart table
    $sql_update = "UPDATE cart SET order_status = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $order_status, $product_id);

    if ($stmt_update->execute()) {
        $_SESSION['success'] = "Order status updated successfully";
        header("Location: order_status_admin.php");
    } else {
        $_SESSION['error'] = "Error updating order status: " . $conn->error;
    }

    $stmt_update->close();
    exit();
}



$conn->close();
?>
