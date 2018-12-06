
<!DOCTYPE html>
<html>
<head>
  <title>Add New Book</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="header">
  	<h2>Add New Book</h2>
  </div>
	
  <form method="post" action="">
  	<?php include('errors.php'); ?>
  	
  	<div class="input-group">
  	  <label>Book Title</label>
  	  <input type="text" name="title" maxlength="100" required/>
  	</div>
  	<div class="input-group">
  	  <label>Book Cost</label>
  	  <input type="text" name="cost" maxlength="25" required/>
  	</div>
  	<div class="input-group">
  	  <label>Book ISBN</label>
  	  <input type="text" name="isbn" required/>
  	</div>
  	<div class="input-group">
  	  <label>Author First Name</label>
  	  <input type="text" name="author_firstname" required/>
  	</div>
  	<div class="input-group">
  	  <label>Author Last Name</label>
  	  <input type="text" name="author_lastname" required/>
  	</div>
  	<div class="input-group">
  	  <label>Publishers First Name</label>
  	  <input type="text" name="publisher_firstname" required/>
  	</div>
  	<div class="input-group">
  	  <label>Publishers Last Name</label>
  	  <input type="text" name="publisher_lastname" required/>
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
