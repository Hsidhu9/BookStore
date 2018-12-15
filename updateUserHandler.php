<?php
require_once 'dbconnection.php';



$id = $_GET["user_id"];
$role = $_GET["role"];
$r = null;
if(strcasecmp($role, "admin") == 0){
    $r = 1;
}
else{
    $r = 2;
}

$dbConnection = new dbconnection();
$conn = $dbConnection->createConn();
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$query = "update users set role = '$r' where id = '$id'";

if($conn->query($query) === true)
{
    echo "updated";
   
}
else{
    echo "something went wrong";
}
header("Location: Views/ShowUsers.php");


?>