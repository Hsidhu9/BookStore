<?php
require_once 'Models/cart.php';
session_start();
//get the product id from the button (form) that was clicked.

if(isset($_GET["id"]))
{
   
    $id = $_GET["id"];
    
}   
else {
    echo  "not set";
}
    

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
    
}
else {
    
    if(isset($_SESSION['userid']))
    {
        $c = new Cart($_SESSION['userid']);
       
    }
    else {
        echo "Please login first<br>";
        exit;
    }
}

$c->addItem($id);

$c->calculate_total();

// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";

$_SESSION['cart'] = $c;
header("Location: Views/ShowCart.php");
