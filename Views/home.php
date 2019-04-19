<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../navbar.php';
require_once '../Services/BookService.php';
require_once '../Models/order.php';


?>

<!DOCTYPE html>
<html>
<head>
<style>
</style>
<title>Home</title>
</head>
<body>


<?php
$bookService = new BookService();
$array = $bookService->getAllBooks();
?>
<div class="container">
<div class="row">
<?php

for ($i=0; $i<=11; $i++)
{
    //echo "title :" .$book->getTitle(). "Cost $". $book->getCost()." ISBN ". $book->getISBN()
?>


 
<div class="card-group col-12 col-sm-6 col-md-4 col-lg-3">
  <!-- <img class="card-img-top" src=".../100px180/" alt="Card image cap">  -->

  	<div class="card card-inverse card-primary">
  	<div class="card-block">
  		<div class="card-body">
  		<h5 class="card-title"><?php echo $array[$i]->getTitle() ?></h5>
    	<p class="card-text" style="margin:1rem">
    	 Cost : $ <?php echo $array[$i]->getCost() ?> <br>
    	ISBN : <?php echo $array[$i]->getISBN()?> <br>
    	Author Name : <?php  echo $array[$i]->getAuthorFirstName(). " ". $array[$i]->getAuthorLastName()?>
    </p>
    <form method="get" action="../addToCart.php">
    	<input type="hidden"  value="<?php echo $array[$i]->getId() ?>" name="id"/>
    	<input type="submit" name="add_to_cart" value="Add to Cart" /><br/>
	</form>
	</div>
	 </div>
  	</div> <!-- card -->
  </div> <!--  card group -->



<?php     
}
?>
  </div> <!-- row -->
</div> <!-- container -->
</body>
</html>

