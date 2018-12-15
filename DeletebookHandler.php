<?php

require_once 'Services/BookService.php';
require_once 'orderHandler.php';
$id = 0;

if(isset($_GET['id']))
{
   $id = $_GET['id']; 
}
else
{
    echo "we could not find the book to be deleted";
    exit;
}


$bookService = new BookService();

$ok = $bookService->deleteBook($id);

if($ok == true)
{
    header("Location: Views/admin.php");
}
else{
    echo "Something went wrong";
}


?>
