<?php
include "./connection.php";
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}

$product_id = $_GET['id'];
$productupdate = [];

$sql = "SELECT * FROM hkartproducts WHERE id=$product_id";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $productupdate = $result->fetch_assoc();
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
        $sql = "UPDATE hkartproducts SET product_name='$product_name', product_contents='$product_contents',product_price='$product_price' ,product_img='$file_name',active='$active' WHERE id='$product_id'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Product updated successfully";
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
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="bg-white text-black pb-44">
    <h1 class="text-3xl">Edit Product</h1>
    <a href="admin.php" class="btn btn-primary">Back</a>

    <div class=" flex items-center justify-center p-16">
    <form method="POST" action="" enctype="multipart/form-data">

        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

        <div class="form-group">
            <strong>Product Name:</strong>
            <input type="text" name="product_name" required class="form-control bg-white border border-black" value="<?php echo ($productupdate['product_name']); ?>">
        </div>
        <div class="form-group">
            <strong>Product Detail:</strong>
            <textarea class="form-control bg-white border border-black" name="product_contents" required><?php echo ($productupdate['product_contents']); ?></textarea>
        </div>
        <div class="form-group">
            <strong>Product price:</strong>
            <textarea class="form-control bg-white border border-black" name="product_price" required><?php echo ($productupdate['product_price']); ?></textarea>
        </div>
        <div class="form-group">
            <strong>Product Image:</strong>
            <input class="form-control p-2" type="file" name="product_img" required>
        </div>
        <div class="form-group">
            <strong>Active Status:</strong>
            <input type="text" name="active" required class="form-control bg-white border border-black" value="<?php echo ($productupdate['active']); ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success ">Submit</button>
        </div>
    </form>
    </div>
    
</div>

</body>
</html>
