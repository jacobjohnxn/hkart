<?php
include "./connection.php";
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}

$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

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
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="bg-white text-black pb-44">
    <h1 class="text-3xl">ORDERS:</h1>
    <a href="admin.php" class="btn btn-primary">Back</a>

    <table class="table table-bordered text-black ml-4">  
        <tr>  
            <th>Customer Email</th>   
            <th>Product Name</th>   
            <th>Price</th>  
            <th>Order Status</th>  
            <th>Action</th>  
        </tr>  
        <?php  
        foreach ($productupdate as $product) {  
            echo "<tr>";  
            echo "<form method='POST' action='update_order_status.php'>";
            echo "<td>".$product['email']."</td>"; 
            echo "<td>".$product['product_name']."</td>";  
            echo "<td>".$product['product_price']."</td>";  
            echo "<td><textarea class='form-control bg-white border border-black' name='order_status' required>".$product['order_status']."</textarea></td>";
            echo "<td>";  
            echo "<input type='hidden' name='product_id' value='".$product['id']."'>";
            echo "<button type='submit' class='btn bg-green-500 text-black hover:bg-green-800 hover:text-white'>Save</button> ";  
            echo "<a href='delete_cancelled_order.php?id=".$product['id']."' class='btn bg-red-500 text-black hover:bg-red-800 hover:text-white'>Delete</a>";  
            echo "</td>";
            echo "</form>";
            echo "</tr>";  
        }  
        ?>  
    </table>
</div>

</body>
</html>
