<?php 
require_once '../navbar.php';
?>


  <div class="container">
  	<h2>Add New Book</h2>
	
  <form method="post" action="../AddBookHandler.php">
  	<?php include('errors.php'); ?>
  	
  	<div class="form-group">
  	  <label>Book Title</label>
  	  <input type="text" class="form-control" name="title" maxlength="100" required/>
  	</div>
  	<div class="form-group">
  	  <label>Book Cost</label>
  	  <input type="text" class="form-control" name="cost" maxlength="25" required/>
  	</div>
  	<div class="form-group">
  	  <label>Book ISBN</label>
  	  <input type="text" class="form-control" name="isbn" required/>
  	</div>
  	<div class="form-group">
  	  <label>Author First Name</label>
  	  <input type="text" class="form-control" name="author_firstname" required/>
  	</div>
  	<div class="form-group">
  	  <label>Author Last Name</label>
  	  <input type="text" class="form-control" name="author_lastname" required/>
  	</div>
  	<div class="form-group">
  	  <label>Publishers First Name</label>
  	  <input type="text" class="form-control" name="publisher_firstname" required/>
  	</div>
  	<div class="form-group">
  	  <label>Publishers Last Name</label>
  	  <input type="text" class="form-control" name="publisher_lastname" required/>
  	</div>

  	<div class="form-group">
  	  <button type="submit" class="btn btn-primary" name="reg_book">Submit</button>
  	</div>
  	
  </form>
  </div>

