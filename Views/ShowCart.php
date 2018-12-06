<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'C:\MAMP\htdocs\Milestone1\Services\BookService.php';
require_once 'C:\MAMP\htdocs\Milestone1\Models\cart.php';
session_start();

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Admin</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="../logout.php" style="background: #101010">
      
      <button type="submit" class="btn btn-default">Logout</button>
    </form>
    
    </div>
</nav>
<div style="margin:1rem; display: inline-flex">
<?php 

$bookService = new BookService();
if(isset($_SESSION["cart"])){
    
    $c = $_SESSION["cart"];
    
}
else{
    echo "Nothing in the cart yet.<br>";
    exit;
}

if(isset($_SESSION["userid"])){
    
    $userid = $_SESSION["userid"];
    
}
else{
    echo "You are not logged in yet.<br>";
    exit;
}

if(isset($_SESSION["username"])){
    
    $username = $_SESSION["username"];
    
}
else{
    echo "You are not logged in yet.<br>";
    exit;
}
if($c->getUserid() != $userid){
    echo "It Appears that the cart doesnot belong to you";
    exit;
}



?>	
	<div style="margin:5px">
	 View Cart <br>
	 Cart for user : <?php echo $username?>
	</div>
	<br>
	<table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Book Title</th>
      <th scope="col">Author Name</th>
     
      <th scope="col">Quantity</th>
      <th scope="col">Price Each</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  foreach ($c->getItems() as $bookId => $qty){
      $book = $bookService->getBookById($bookId);
  ?>
    <tr>
      
      <td><?php echo $book->getTitle()?></td>
      <td><?php echo $book->getAuthorId()?></td>
      <td><?php echo $qty?></td>
      <td><?php echo "$".$book->getCost()?></td>
      <td><?php echo "$".$book->getCost() * $qty?></td>
      
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
	
</body>
</html>
