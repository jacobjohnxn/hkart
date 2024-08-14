<?php include "./connection.php"; 
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>  
<head>  
   <title>Admin</title>
 
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>    
</head> 
<?php include"./header.php"; ?>
<body class="bg-white">  
<div class="container">  

<div class="">
<form action="./auth.php" method="post">
        <div class="flex justify-end" >
        <button type="submit"  name="logout" class="btn w-16 bg-red-500 text-white  rounded  mt-4">logout</button>
        </div>
        </form>
<a href="create.php" class="btn bg-green-500 text-black hover:bg-green-800 hover:text-white">Add Product</a>  
<a href="user.php" class="btn bg-green-500 text-black hover:bg-green-800 hover:text-white ">Add user</a> 
<a href="./order_status_admin.php" class="btn bg-green-500 text-black hover:bg-green-800 hover:text-white ">view orders</a>  
</div>        

<h1 class="text-3xl text-black font-semibold p-16">Products Data</h1>  


 
<table class="table table-bordered text-black ml-4">  
   <tr>  
      <th>Product Name</th>  
      <th>Details</th>
      <th>price</th>    
      <th>Images</th>  
      <th>Action</th> 
      <th>active</th> 
   </tr>  
   <?php  
   foreach ($products as $product) {  
         echo "<tr>";  
         echo "<td>".$product['product_name']."</td>";  
         echo "<td>".$product['product_contents']."</td>";
         echo "<td>".$product['product_price']."</td>";
         echo "<td><img src='./img/".$product['product_img']."' alt='Product Image' style='width:100px;'></td>";
         echo "<td>";  
         echo "<a href='edit.php?id=".$product['id']."' class='btn bg-green-500 text-black hover:bg-green-800 hover:text-white'>Edit</a> ";  
         echo "<a href='delete.php?id=".$product['id']."' class='btn bg-red-500 text-black hover:bg-red-800 hover:text-white'>Delete</a>";  
         echo "</td>";
       //  echo "<td>".$product['active']."</td>";
       echo "<td><a href='active.php?id=".$product['id']."' class='btn bg-blue-500 text-black hover:bg-red-800 hover:text-white'>".($product['active'] ? 'Deactivate' : 'Activate')."</a></td>";
       echo "</tr>";  
   }  
   ?>  
   <table class="table table-bordered text-black ml-4">  
   <tr>  
      <th>customer Name</th> 
      <th>Action</th>  
   </tr>  
   <h1 class="font-bold text-3xl text-black">customer data:</h1>
   <?php  
   foreach ($email as $email) {  
         echo "<tr>";  
         echo "<td>".$email['email']."</td>";  
         echo "<td>";  
         echo "<a href='deleteuser.php?email=".$email['email']."' class='btn bg-red-500 text-black hover:bg-red-800 hover:text-white'>Delete</a>";  
         echo "</td>";  
         echo "</tr>";  
   }  
   ?>  
</table>
</table>

</div>  
<?php include'./footer.php';?>

</body>  


</html>
