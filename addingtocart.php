<?php
include "./connection.php";
session_start();
$user_email = $_SESSION['email'];

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT product_name, product_price FROM hkartproducts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    
    if ($stmt->execute()) {
        $stmt->store_result();
        
        $stmt->bind_result($product_name, $product_price);
        $stmt->fetch();

        $sql = "INSERT INTO cart (product_name, product_price,email) VALUES (?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $product_name, $product_price,$user_email);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Product inserted successfully into cart";
            header("Location: orders.php");
            exit();
        } else {
            echo "Error inserting product into cart: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error fetching product details: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
