<?php include "./connection.php"; 
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ./auth.php"); 
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['add_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'customer';
    

    $sql = "INSERT INTO auth (role,email,password) VALUES (?,?, ?)";
    $stmti = $conn->prepare($sql);
    $stmti->bind_param("sss",$role,$email,$password );
   
    if ($stmti->execute()) {
        header("Location: admin.php");
        exit();
        } else {
        echo "<p class='text-red-500 text-center mb-4'>Error inserting record: " . $conn->error . "</p>";
    }
    $stmti->close();
}
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
<body class="bg-white">
<a href="admin.php" class="btn btn-primary mt-8">Back</a>

    <div class="p-44">
    <form action="" method="post" class="flex flex-col text-black">
        <label for="">user email</label>
        <input type="text" class="bg-white text-black border border-black" name="email" id="">
        <label for="">user password</label>
        <input type="password" class="bg-white text-black border border-black" name="password" id="">
        <button type="submit" name="add_user" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300 mt-4">
                    Add user
                </button>
    </form>
    </div>
   
</body>
</html>