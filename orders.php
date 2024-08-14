<?php
session_start(); // This line is crucial and should come before any output
include "./connection.php";

if ($_SESSION['role'] !== 'customer' && $_SESSION['role'] !== 'admin') {
    header("location: ./auth.php");
    exit();
}

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

<div class="bg-white text-black  h-[600px]">
    <h1 class="text-3xl">ORDERS:</h1>
    <a href="contents.php" class="btn btn-primary">Back</a>

    <table class="table table-bordered text-black ml-4">  
        <tr>  
            <th>Product</th>
            <th>Price</th>   
            <th>Action</th>
        </tr>  
        <?php  
        foreach ($productupdate as $product) { 
            if ($product['order_status'] != 'cancelled') {
                echo "<tr>";  
                echo "<td>".$product['product_name']."</td>";  
                echo "<td>".$product['product_price']."</td>";  
                echo "<td>"; 
                if ($product['order_status'] != 'ordered') { 
                echo "<a href='orderconfirm.php?id=".$product['id']."' class='btn bg-green-500 text-black hover:bg-green-800 hover:text-white'>Buy</a> ";  
                }
                echo "<a href='deleteorder.php?id=".$product['id']."' class='btn bg-red-500 text-black hover:bg-red-800 hover:text-white'>Delete</a>";  
                echo "</td>";
                echo "</tr>";  
            }
        }
        ?>

    </table>
</div>

</body>
</html>
