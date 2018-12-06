<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'SecurityServic.php';

// save our Form data

$username = $_POST["username"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$confirmpass = $_POST["confirmpass"];


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

if ($email == NULL || trim($email) == "")
{
    exit("Email is a required field");
}

if ($confirmpass == NULL || trim($confirmpass) == "")
{
    exit("password is a required field");
}

if ($firstname == NULL || trim($firstname) == "")
{
    exit("Firstname is a required field");
}

if ($lastname == NULL || trim($lastname) == "")
{
    exit("Lastname is a required field");
}
if($password != $confirmpass)
{
    exit("Passwords are not same");
}

// call our security service and authenticate the credentials

$service = new SecurityServic("","");
$ok = $service->register($firstname, $lastname, $email, $username, $password);

if ($ok)
    echo "Thanks for registering. Please <a href=login.php>login</a>!";
   
     
    
else
    echo ("Your account could not be created");
        
        ?> 