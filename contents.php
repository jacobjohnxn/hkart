<?php
session_start(); 
include "./connection.php";

if ($_SESSION['role'] !== 'customer' && $_SESSION['role'] !== 'admin') {
    header("location: ./auth.php");
    exit();
}

$user_email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT user_name FROM auth WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$stmt->bind_result($user_name);
$stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hkart</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body>
    <?php include'./header.php';?>
    <div >      
          
                <?php 
                include('./components/land1.php');
                include('./components/about.php');
                ?>


        <div>
            <div class="carousel w-full h-[400px]">
                <div id="slide1" class="carousel-item relative w-full">
                    <img src="./img/c2.jpg" class="w-full opacity-75" />
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a href="#slide3" class="btn btn-circle">❮</a>
                    <p class="text-2xl text-white ">order 3 items and get 10% off</p>
                    <a href="#slide2" class="btn btn-circle">❯</a>
                    
                    </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full">
                    <img
                    src="./img/c1.png"
                    class="w-full opacity-75" />
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a href="#slide1" class="btn btn-circle">❮</a>
                    <p class="text-2xl text-white font-semibold ">Reebook shoes coming soon</p>
                    <a href="#slide3" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full">
                    <img
                    src="./img/c3.jpg"
                    class="w-full" />
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a href="#slide2" class="btn btn-circle">❮</a>
                    <a href="#slide1" class="btn btn-circle">❯</a>
                    </div>
                </div>
                
        </div>
        <div class="bg-white text-black">
            <h1 class="font-semibold flex items-center justify-center text-orange-500 text-5xl mb-4 ml-2 pt-4">our products:</h1>
            <div class="flex flex-wrap" id="products">
                <?php foreach ($products as $index => $products): 
                    if($products['active']==1):
                    ?>
                    
                    <div class="w-full md:w-1/3 lg:w-1/3 p-4">
                        <div class="bg-white border border-black-300 shadow-md shadow-green-200 overflow-hidden p-6 transition-transform duration-300 transform hover:scale-105 h-full">
                            <div class="flex justify-center mb-4">
                                <img src="./img/<?php echo $products['product_img'];?>" alt="<?php echo $products['product_img'];?>" class="h-32 w-32 rounded-full object-cover">                            
                            </div>
                            <h2 class="text-center text-3xl text-black font-bold mb-2"><?php echo $products['product_name']; ?></h2>
                            <p class="text-center text-lg text-gray-700 mb-6 text-justify">
                                <br>
                                <?php echo $products['product_contents']; ?>
                            </p>
                            <p class="text-center text-gray-700 mb-6 font-semibold text-justify">
                                RS:
                                <?php echo $products['product_price']; ?>
                            </p>
                            <div class="flex justify-center">
                                <a href="./addingtocart.php?id=<?php echo $products['id']; ?>" class="bg-blue-500 hover:bg-blue-700 text-white rounded-full px-4 py-2">
                                    add to cart
                                </a>
                            </div>

                        </div>
                    </div>
                <?php endif; endforeach; ?>
            </div>
        </div>
    </div>
    <?php include'./footer.php';?>
</body>
</html>