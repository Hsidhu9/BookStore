<?php
require_once 'Models/cart.php';
require_once 'dbconnection.php';
require_once 'Models/order.php';
session_start();

$userid = 0;
if(isset($_SESSION["userid"])){
    
    $userid = $_SESSION["userid"];
    
}
else{
    echo "You are not logged in yet.<br>";
    exit;
}
$bookService = new BookService();
$cart = new Cart($userid);
if(isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
}
else{
    echo "Nothing in the cart yet.<br>";
    exit;
}

$dbConnection = new dbconnection();
$conn = $dbConnection->createConn();

// Set autocommit to off
mysqli_autocommit($conn,FALSE);

//pull the address id from address table
$addressQuery = "select id from address where users_id = '$userid'";
$result = mysqli_query($conn, $addressQuery);
if($result != null && $result->num_rows > 0){
    while($row = $result->fetch_assoc())
    {
        $address_id = $row["id"];
    }
}
else{
    mysqli_rollback($conn);
    echo "address could not be found";
    return;
}
$today = date("Y/m/d");
$order_number = uniqid();
$orderQuery = "insert into orders(order_date, address_id, users_id,order_number)
                    values('$today', '$address_id', '$userid', '$order_number')";
if($conn->query($orderQuery) === true)
{
    $order_id = $conn->insert_id;
    foreach($cart->getItems() as $bookId=>$qty)
    {
        
        $book = $bookService->getBookById($bookId);
        $total_cost = $book->getCost() * $qty;
        $book_description = $book->getTitle(). " By: ".$book->getAuthorFirstName()." ".$book->getAuthorLastName();
        
        $orderDetailsQuery = "insert into orderdetails(quantity, current_price, current_description, orders_id, books_id1)
                            values('$qty', '$total_cost', '$book_description', '$order_id', '$bookId')";
        if($conn->query($orderDetailsQuery) === false)
        {
            mysqli_rollback($conn);
            echo "order details could not be inserted";
            return;
        }
        
    }
}
else{
    mysqli_rollback($conn);
    echo "order could not be inserted";
    return;
}

mysqli_commit($conn);
$conn->close();
unset($_SESSION['cart']);
//echo "orders inserted";
header("Location: Views/checkout2.php");

