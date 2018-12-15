<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../dbconnection.php';
require_once '../navbar.php';
require_once '../Models/order.php';

if(isset($_SESSION["userid"])){
    
    $userid = $_SESSION["userid"];
    
}
else{
    echo "You are not logged in yet.<br>";
    exit;
}


    
    
    $dbConnection = new dbconnection();
    $conn = $dbConnection->createConn();
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $query = "select  order_number from orders where users_id = '$userid' order by id desc limit 1;";
    $result = mysqli_query($conn, $query);
    
    if($result->num_rows > 0)
    {
        $i = 0;
        while($row = $result->fetch_assoc())
        {
            
          $orderDetail =   $row["order_number"];
        }
    }
        
        else {
            echo"No Product Found";
        }
    


?>

<div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Your Order is confirmed. your Order Number is  <br><b><?php echo $orderDetail?></b></strong></p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">Continue to homepage</a>
  </p>
</div>