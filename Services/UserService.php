<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../Models/User.php';
require_once '../dbconnection.php';

class UserService {
    function __construct(){
        
    }
    
    function ViewUsers() {
        $usersA = array();
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "select * from users";
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
               
                $user = new User();
                $user->setUserId($row["id"]);
                $user->setFirstname($row["firstname"]);
                $user->setLastname($row["lastname"]);
                $user->setUsername($row["username"]);
                $user->setPassword($row["password"]);
                $user->setRole($row["role"]);
                
                $usersA[$i] = $user;
                $i++;
                
            }
        }
        else {
            echo"No User Found";
        }
        
        return $usersA;
    }
    
    function getUserById(int $id)
    {
        
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "select * from users where id = '$id'";
        $result = mysqli_query($conn, $query);
        $user = new User();
        if($result != null && $result->num_rows== 1)
        {
           
            while($row = $result->fetch_assoc())
            {
                
                $user->setFirstname($row["firstname"]);
                $user->setLastname($row["lastname"]);
                $user->setUsername($row["username"]);
                $user->setPassword($row["password"]);
                $user->setRole($row["role"]);
                
                
                
                
            }
        }
        else {
            echo"No User Found";
        }
        return $user;
    }
    
   
}