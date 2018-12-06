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
require_once 'C:\MAMP\htdocs\Milestone1\Models\order.php';
session_start();

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li ><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li class="active"><a href="#">Admin</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="../logout.php" style="background: #101010">
      
      <button type="submit" class="btn btn-default">Logout</button>
    </form>
    
    </div>
</nav>
<div style="margin:1rem; display: inline-flex">


<form action="AddBook.php" class="input-group">
<label>All the books in database.</label>
  	  <button type="submit" class="btn" name="reg_book">Add New Book</button>
  	</form>
	<br>
	<table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Book Title</th>
      <th scope="col">ISBN</th>
      <th scope="col">Cost</th>
      <th scope="col">Author Name</th>
      <th scope="col">Publisher Name</th>
      <th scope="col"></th> 
      <th scope="col"></th> 
      
    </tr>
  </thead>
  <tbody>
  <?php
    $bookService = new BookService();
    $array = $bookService->getAllBooks();
    foreach ($array as $book) {
?>
    <tr>
      
      <td><?php echo $book->getTitle()?></td>
      <td><?php echo $book->getISBN()?></td>
      <td><?php echo "$".$book->getCost()?></td>
      <td><?php echo $book->getAuthorFirstName(). " " . $book->getAuthorLastName()?></td>
      <td><?php echo $book->getPublisherFirstName(). " " . $book->getPublisherLastName()?></td>
      <?php 
      if(isset($_SESSION["book"]))
      {
          $_SESSION["book"] = "";
      }
        $_SESSION["book"] = $book;
      ?>
      <td><form action="UpdateBook.php" class="input-group">
      <input type="hidden"  value="<?php echo $book->getId() ?>" name="id"/>
      <button type="submit" class="btn" name="update">Update</button></form></td>
      <td><form action="" class="input-group">
      <input type="hidden"  value="<?php echo $book->getId() ?>" name="id"/>
      <button type="submit" class="btn" name="Delete">Delete</button></form></td>
      
      
      
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
	
</body>
</html>
