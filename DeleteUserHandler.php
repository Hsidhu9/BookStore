<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbconnection.php';


if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    
    $dbConnection = new dbconnection();
    $conn = $dbConnection->createConn();
    
    // Set autocommit to off
    mysqli_autocommit($conn,FALSE);
    
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $query = "delete from users where id = '$id'";
    if($conn->query($query) === true)
    {
        $addressDeleteQuery = "delete from address where users_id = '$id'";
        if($conn->query($addressDeleteQuery) === false)
        {
            mysqli_rollback($conn);
            echo "address could not be deleted";
            return;
        }
        
        
    }
    else{
        mysqli_rollback($conn);
        echo "user could not be deleted";
        return;
    }
    mysqli_commit($conn);
    $conn->close();
    
    
}
else{
    echo"could not get the id";
}
header("Location: Views/ShowUsers.php");

?>