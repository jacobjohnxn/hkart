<?php
include "./connection.php";
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    $sql = "SELECT * FROM hkartproducts WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $productactive = $result->fetch_assoc();
    $stmt->close();
    
    if ($productactive) {
        $new_status = $productactive['active'] == 1 ? 0 : 1;
        $sql = "UPDATE hkartproducts SET active=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $new_status, $product_id);
        
        if ($stmt->execute()) {
            echo "Product status updated successfully";
            header("Location: admin.php");
            exit();
        } else {
            echo "Error updating product: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
