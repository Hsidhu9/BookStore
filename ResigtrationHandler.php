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
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$country =  $_POST["country"];


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
if ($address1 == NULL || trim($address1) == "")
{
    exit("Street Address is a required field");
}
if ($city == NULL || trim($city) == "")
{
    exit("City is a required field");
}
if ($state == NULL || trim($state) == "")
{
    exit("State is a required field");
}
if ($zip == NULL || trim($zip) == "")
{
    exit("Zip Code is a required field");
}
if ($country == NULL || trim($country) == "")
{
    exit("Country is a required field");
}
if($password != $confirmpass)
{
    exit("Passwords are not same");
}


// call our security service and authenticate the credentials

$service = new SecurityServic("","");
$ok = $service->register($firstname, $lastname, $email, $username, $password, $address1, $address2,$city, $state, $zip, $country );

if ($ok)
    echo "Thanks for registering. Please <a href=login.php>login</a>!";  
else
    echo ("Your account could not be created");
        
        ?> 