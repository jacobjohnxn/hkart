<?php
include "./connection.php";
session_start();

$user_email = $_SESSION['email'];
$sql = "SELECT * FROM cart WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();


$productupdate = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productupdate[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ADDED Products</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="bg-white text-black h-[600px]">
    <h1 class="text-3xl">ORDERS:</h1>
    <a href="contents.php" class="btn btn-primary">Back</a>

    <table class="table table-bordered text-black ml-4">  
        <tr>  
            <th>Product</th>
            <th>Price</th>
            <th>Order status</th>     
            <th>Action</th>
        </tr>  
        <?php  
        // Display the products inserted into the cart
        foreach ($productupdate as $product) {  
            echo "<tr>";  
            echo "<td>".$product['product_name']."</td>";  
            echo "<td>".$product['product_price']."</td>";  
            echo "<td>".$product['order_status']."</td>";  
            echo "<td>";  
            if ($product['order_status'] != 'cancelled') {
            echo "<a href='deleteorder.php?id=".$product['id']."' class='btn bg-red-500 text-black hover:bg-red-800 hover:text-white'>cancel</a>";  
            }
            echo "</td>";
            echo "</tr>";  
        }  
        ?>  
    </table>
</div>

</body>
</html>
