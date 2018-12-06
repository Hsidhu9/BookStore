<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'SecurityServic.php';

// save our Form data

$username = $_POST["username"];
$password = $_POST["password"];


/* echo "Post data<br>";
print_r( $_POST);
echo "After testing, remove this output for obvious reasons. <br>"; */

// make sure posted From data is valid

if ($username == NULL || trim($username) == "")
{
    exit("User Name is a required field");
}

if ($password == NULL || trim($password) == "")
{
    exit("password is a required field");
}




// call our security service and authenticate the credentials

$service = new SecurityServic($username, $password);
$ok = $service->authenticate();



if ($ok)
{
    header("Location: home.php");
}
else
     echo ("Login failed");
        
        ?> 