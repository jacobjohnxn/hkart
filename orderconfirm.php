<?php
include "./connection.php";
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Prepare SQL statement for updating order status in cart table
    $sql_update_cart = "UPDATE cart SET order_status = 'ordered' WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update_cart);
    $stmt_update->bind_param("i", $product_id);

    if ($stmt_update->execute()) {
        $_SESSION['success'] = "Order status updated successfully";
        header("Location: customer_order_status.php");
        exit();
    } else {
        echo "Error updating order status: " . $conn->error;
    }
    $stmt_update->close();
}

$conn->close();
?>