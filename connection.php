<?php 
    
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";  
    $database = "hkartdata";
    $port = 3307;  
    
    $conn = mysqli_connect($host, $user, $pass, $database, $port);

    $sql = "SELECT * FROM hkartproducts";
        $result = $conn->query($sql);

        $products= array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
              }
}
$sql = "SELECT * FROM auth WHERE role='customer' ";
        $result = $conn->query($sql);

        $email= array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $email[] = $row;
              }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
    header("location: ./auth.php");
    session_unset();
    session_destroy();
    exit();
}
 
      ?>
