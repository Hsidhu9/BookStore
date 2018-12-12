<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../Services/BookService.php';
require_once '../Models/cart.php';
require_once '../navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Show Cart</title>
</head>

<body>
<div style="margin:1rem">
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
      <td><?php echo $book->getAuthorFirstName(). " " . $book->getAuthorLastName()?></td>
      <td>
      <form method="get" action="../updateQty.php">
      	<input type ="hidden" name="id" value="<?php echo $book->getId()?>"/>
      	<input type = "number" name = "qty" value="<?php echo $qty?>"/>
      	<button type= "submit">Update</button>
      </form>
      
      <td><?php echo "$".$book->getCost()?></td>
      <td><?php echo "$".$book->getCost() * $qty?></td>
      
    </tr>
    <?php }?>
  </tbody>
</table>
<form action = "Checkout.php">
<button type = "submit" class = "button button-primary">Proceed to checkout</button>
</form>

</div>
	
</body>
</html>
