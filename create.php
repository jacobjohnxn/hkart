<?php
include "./connection.php";
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_name = $_POST["product_name"];
    $product_contents = $_POST["product_contents"];
    $product_price = $_POST["product_price"];
    $active = $_POST["active"];
    
    $target_dir = "img/";
    $file_name = basename($_FILES["product_img"]["name"]);
    $target_file = $target_dir . $file_name;
    
    if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO hkartproducts (product_name, product_contents, product_img,product_price,active) 
                VALUES ('$product_name', '$product_contents', '$file_name','$product_price','$active')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black h-[650px] " >

<div class="container">
    <h1 class="text-3xl font-semibold">Add Product</h1>
    <a href="admin.php" class="btn btn-primary">Back</a>
    
    <div class="flex justify-center pt-8">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group ">
            <strong>Product Name:</strong>
            <input type="text" name="product_name" required class="form-control bg-white text-black border border-black" placeholder="Name">
        </div>
        <div class="form-group">
            <strong>Product Detail:</strong>
            <textarea class="form-control bg-white text-black border border-black" name="product_contents" placeholder="Detail"></textarea>
        </div>
        <div class="form-group">
            <strong>Product Image:</strong>
            <input class="form-control p-2" type="file" name="product_img" >
        </div>
        <div class="form-group">
            <strong>Price:</strong>
            <input type="text" name="product_price" required class="form-control bg-white border border-black">
        </div>
        <div class="form-group">
            <strong>Active Status:</strong>
            <input type="text" name="active" required class="form-control bg-white border border-black">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
    
</div>

</body>
</html>