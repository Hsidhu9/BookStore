<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../dbconnection.php';
require_once '../Services/UserService.php';
require_once '../navbar.php';




        
?>


<!DOCTYPE html>
<html>
<head>
	<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="crossorigin="anonymous">
  </script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <title>Orders</title>
   <style>
    #tablesearch {
    fornt-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    with: 100%;
    }
    
    #tablesearch td, #tablesearch th {
    border: 2px solid #ddd;
    border-radius: 4px;
    padding: 8px;
    }
    
    #tablesearch tr:nth-child(even){background-color: #f2f2f2;}
    
    #tablesearch tr:hover {background-color: #ddd;}
    
    #tablesearch th {
    padding-top: 8px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #339;
    color: white;
    }
    </style>
  </head>
<body>
	<h2 align="center"> Thanks for order from BOOKIE JOINT! </h2>
	<h3 align="center">Here are your order details. </h3>
	
	<table id="tablesearch" class="display">
  <thead>
    <tr>
      
      <th>User Name</th>
      <th>Book Description</th>
      <th>OrderNumber</th>
      <th>Date</th>
      <th>Quantity</th>
      <th>Cost</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  
  $userService = new UserService();
  $dbConnection = new dbconnection();
  $conn = $dbConnection->createConn();
  if ($conn->connect_error)
  {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $query = "select orders.id, orders.order_number, orders.users_id, orders.order_date, orderdetails.current_description, orderdetails.current_price, orderdetails.quantity 
from orders join orderdetails on orders.id = orderdetails.orders_id;";
  $result = mysqli_query($conn, $query);
  
  if($result->num_rows > 0)
  {
     // echo $result->num_rows;
      $i = 0;
      while($row = $result->fetch_assoc())
      {
          
          $user = $userService->getUserById($row["users_id"]);
          /* echo "id: " . $row["idUsers"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";*/
      
  ?>
    <tr>   
      <td><?php echo $user->getFirstname(). " ". $user->getLastname()?></td>
      <td><?php echo $row["current_description"]?></td>
      <td><?php echo $row["order_number"]?></td>
      <td><?php echo $row["order_date"]?></td>
      <td><?php echo $row["quantity"]?></td>
      <td><?php echo $row["current_price"]?></td>
      <td><form action="../Services/orderDeleteServices.php" class="input-group" method = "get">
      <input type="hidden"  value="<?php echo $row["id"]?>" name="id"/>
      <button type="submit" class="btn btn-primary " name="Delete">Delete</button></form></td>
    </tr>
    <?php 
        $i++;
          }
        }
    else{
        echo "something went wrong!";
    }
    //echo "<b>".$cart->getSubtotals() ."</b>"
    ?>
  </tbody>
</table>
</body>
<script>
$(document).ready( function () {
    $('#tablesearch').DataTable();
} );
</script>
	
</html>


