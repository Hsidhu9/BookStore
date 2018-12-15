<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbconnection.php';
require_once 'Models/order.php';
require_once 'Models/orderDetails.php';

class orderHandler {
   public $order_array = array();
    
    function getOrderFromDB()
    {
        
        
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "select * from orders";
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                $order = new order();
                $order->setId($row["id"]);
                $order->setOrderNumber($row["order_number"]);
                $order->setOrderDate($row["order_date"]);
                $order->setAddress_id($row["address_id"]);
                $order->setUserId($row["users_id"]);
                
                
                $order_array[$i] = $order;
                
                $i++;
                
                /* echo "id: " . $row["idUsers"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";*/
            }
            
            
        }
        else {
            echo"No Order Found";
        }
        $conn->close();
        return $order_array;
    }
    
    
    function getOrderDetails(int $Id){
        
        $order_details_array = array();
        
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "select * from orderdetails where orders_id = '$Id';";
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                $order_details = new orderDetails();
                $order_details->setId($row["id"]);
                $order_details->setCurrentDescription($row["current_description"]);
                $order_details->setCurrentPrice($row["current_price"]);
                $order_details->setQuantity($row["quantity"]);
                $order_details->setOrderId($row["orders_id"]);
                $order_details_array[$i] = $order_details;
                
                $i++;
                
                /* echo "id: " . $row["idUsers"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";*/
            }
            
        }
        else {
            echo"No Order Details Found";
        }
        $conn->close();
        return $order_details_array;
    }

    function deleteOrder(int $Id) {
        
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        // Set autocommit to off
        mysqli_autocommit($conn,FALSE);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "delete from orderdetails where id ='$Id'";
        
        if ($conn->query($query) === true) {
            $orderDetailsDelete = "delete from orderdetails where orders_id = '$Id'";
            if($conn->query($orderDetailsDelete) === false)
            {
                mysqli_rollback($conn);
                echo "order details could not be deleted";
                return false;
            }
                
            
        } else {
            mysqli_rollback($conn);
            echo "order could not be deleted";
            return false;
        }
        mysqli_commit($conn);
        $conn->close();
        return true;
    }
    
   
    
    
}
