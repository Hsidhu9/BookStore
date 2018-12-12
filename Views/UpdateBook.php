<?php
require_once '../navbar.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once '../Services/BookService.php';
  
  $bookService = new BookService();
  if(isset($_GET['id']))
  {
      $book = $bookService->getBookById($_GET['id']);
  }
    
  else 
  {
      echo "we could not find the book to be updated";
      exit;
  }
  
  ?>
<div class="container">
  	<h2>Update Book</h2>
	
  <form method="post" action="../UpdateBookHandler.php">
  	<input type="hidden"  value="<?php echo $book->getId() ?>" name="id"/>
  	<div class="form-group">
  	  <label>Title</label>
  	  <input type="text" class="form-control" name="title" maxlength="100" value ="<?php echo $book->getTitle()?>" />
  	</div>
  	<div class="form-group">
  	  <label>Book Cost</label>
  	  <input type="text" class="form-control" name="cost" maxlength="25" value ="<?php echo $book->getCost()?>" required/>
  	</div>
  	<div class="form-group">
  	  <label>Book ISBN</label>
  	  <input type="text" class="form-control" name="isbn" value ="<?php echo $book->getISBN()?>" 
  	   required/>
  	</div>
  	<div class="form-group">
  	  <label>Author First Name</label>
  	  <input type="text" class="form-control" name="author_firstname" value ="<?php echo $book->getAuthorFirstName()?>"required/>
  	</div>
  	<div class="form-group">
  	  <label>Author Last Name</label>
  	  <input type="text" class="form-control" name="author_lastname" value="<?php echo $book->getAuthorLastName()?>" required/>
  	</div>
  	<div class="form-group">
  	  <label>Publishers First Name</label>
  	  <input type="text" class="form-control" name="publisher_firstname" value="<?php echo $book->getPublisherFirstName()?>" required/>
  	</div>
  	<div class="form-group">
  	  <label>Publishers Last Name</label>
  	  <input type="text" class="form-control" name="publisher_lastname" value ="<?php echo $book->getPublisherLastName()?>" required/>
  	</div>

  	<div class="form-group">
  	  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
  	</div>
  	
  </form>
  </div>
  
    
 


