<?php
require_once '../Models/Address.php';
require_once '../dbconnection.php';

class AddressService{
    
    function getAddressByUserId($userId)
    {
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        $query = "select * from address where users_id = '$userId'";
        $result = mysqli_query($conn, $query);
        $address = null;
        if($result != null && $result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $address = new Address($row["address1"], $row["address2"], $row["city"], $row["state"], $row["zipcode"], $row["country"], $row["users_id"]);
            }
        }
        else {
            echo "No Result or multiple records found";
            
        }
        $conn-> close();
        return $address;
        
    }
}