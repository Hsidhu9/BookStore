<?php
require_once 'Services/BookService.php';
require_once 'Models/Book.php';
require_once 'Models/cart.php';
session_start();

$book = new Book();

if(isset($_GET['id']))
{
    $book_id = $_GET['id'];
    
 
}


if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}
else{
    echo "cart not set";
}

if(isset($_GET['qty']))
{
    $qty = $_GET['qty'];
    
}else{
    echo "qty not received";
}


$cart->updateItem($book_id, $qty);
$cart->calculate_total();

$_SESSION['cart'] = $cart;
header("Location: Views/ShowCart.php");
?>

