<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Services/BookService.php';
require_once 'Models/order.php';
session_start();
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <form class="navbar-form navbar-left" action="home.php" style="background: #333">
      	<input type="submit" class="btn btn-default" value="Home" style="background: #333"/>
	  </form>
      <form class="navbar-form navbar-left" action="" style="background: #333">
      	<input type="submit" class="btn btn-default" value="About" style="background: #333"/>
	  </form>
      <form class="navbar-form navbar-left" action="Views/admin.php" style="background: #333" >
      	<input type="submit" class="btn btn-default" value="Admin" style="background: #333"/>
	  </form>
    </ul>
    <form class="navbar-form navbar-right" action="logout.php" style="background: #333">
      
      <button type="submit" class="btn btn-default">Logout</button>
    </form>
    
    </div>
</nav>
<div style="margin:1rem; display: inline-flex">
<?php
$bookService = new BookService();
$array = $bookService->getAllBooks();

?>
<?php
foreach ($array as $book)
{
    //echo "title :" .$book->getTitle(). "Cost $". $book->getCost()." ISBN ". $book->getISBN()
?>

<div class="card" style="width: 18rem; margin:5rem">
  <!-- <img class="card-img-top" src=".../100px180/" alt="Card image cap">  -->
  <div class="card-body">
    <h5 class="card-title"><?php echo $book->getTitle() ?></h5>
    <p class="card-text" style="margin:1rem">
    	 <?php echo $book->getCost() ?> <br>
    	ISBN : <?php echo $book->getISBN()?> <br>
    	
    	Author Name : <?php  echo $book->getAuthorFirstName(). " ". $book->getAuthorLastName()?>
    </p>

    <form method="get" action="addToCart.php">
    	<input type="hidden"  value="<?php echo $book->getId() ?>" name="id"/>
    	
    	<input type="submit" name="add_to_cart" value="Add to Cart" /><br/>
	</form>
	
  </div>
</div>
<?php 
    
}?>


</div>

 
</body>
</html>

