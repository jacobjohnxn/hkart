
<?php 
if (isset($_GET['logout'])) {
  header("location: ./auth.php");
  session_unset();
  session_destroy();
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<div class="navbar bg-white border border-b-gray-200 text-black ">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">H-KART</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
    <li><a href="./contents.php">home</a></li> 
    <li><a href="#products">products</a></li> 
    <li><a href="./orders.php">cart</a></li>           
    <li><a href="./customer_order_status.php">Order status</a></li>      
     
    <li>
        <details>
          <summary>Action</summary>
          <ul class="bg-white text-black rounded-t-none p-2">
          <li>
          <a href="?logout=true" class="btn w-16 bg-red-500 text-white rounded mt-4">logout</a>
          </li>
          <li>
            <a href="./gd.php">test</a>
          </li>            
        </li>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</div>
</body>
</html>