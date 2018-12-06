<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once 'C:\MAMP\htdocs\Milestone1\Services\BookService.php';
  session_start();
  
  
  $book = new Book();
  if(isset($_SESSION[('book')]))
    $book = $_SESSION[('book')];
  else 
  {
      echo "we could not find the book to be updated";
      exit;
  }
     
  
  
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Book</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  
  
  
	<div class="header">
  	<h2>Update Book Info</h2>
  </div>
  <form method="post" action="">
  	
  	
  	<div class="input-group">
  	  <label>Book Title</label>
  	  <input type="text" name="title" maxlength="100" value="<?php echo $book->getTitle()?>"/>
  	</div>
  	<div class="input-group">
  	  <label>Book Cost</label>
  	  <input type="text" name="cost" maxlength="25" value="<?php echo $book->getCost()?>"/>
  	</div>
  	<div class="input-group">
  	  <label>Book ISBN</label>
  	  <input type="text" name="isbn" value="<?php echo $book->getISBN()?>"/>
  	</div>
  	<div class="input-group">
  	  <label>Author First Name</label>
  	  <input type="text" name="author_firstname" value="<?php echo $book->getAuthorFirstName()?>"/>
  	</div>
  	<div class="input-group">
  	  <label>Author Last Name</label>
  	  <input type="text" name="author_lastname" value="<?php echo $book->getAuthorLastName()?>"/>
  	</div>
  	<div class="input-group">
  	  <label>Publisher First Name</label>
  	  <input type="text" name="publisher_firstname" value="<?php echo $book->getPublisherFirstName()?>"/>
  	</div>
  	<div class="input-group">
  	  <label>Publisher Last Name</label>
  	  <input type="text" name="publisher_lastname" value="<?php echo $book->getPublisherLastName()?>"/>
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_book">Submit</button>
  	</div>
  	<p>
  		Already a member? <a href="../login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>



<?php 
    
    
?>