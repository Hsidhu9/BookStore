<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../navbar.php';
require_once '../Services/UserService.php';
require_once '../Models/User.php';



?>

<!DOCTYPE html>
<html>
<head>
	<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="crossorigin="anonymous">
  </script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <title>Admin</title>
   <style>
    #tablesearch {
    fornt-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    with: 100%;
    }
    
    #tablesearch td, #tablesearch th {
    border: 2px solid #ddd;
    border-radius: 4px;
    padding: 8px;
    }
    
    #tablesearch tr:nth-child(even){background-color: #f2f2f2;}
    
    #tablesearch tr:hover {background-color: #ddd;}
    
    #tablesearch th {
    padding-top: 8px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #339;
    color: white;
    }
    </style>
  </head>
<body>
<h2 align="center">All the Users available.</h2> 
	<br>
	<table id="tablesearch" class="display">
  <thead>
    <tr>
      
      <th>First Name</th>
      <th>Last Name</th>
      <th>User Name</th>
      <th>Password</th>
      <th>Role</th>
      <th></th> 
      <th></th> 
      
    </tr>
  </thead>
  <tbody>
  <?php 
    
    $UserService = new UserService();
    $userArray = $UserService->ViewUsers();
    foreach ($userArray as $users) {
    
?>
    <tr>
      
      <td><?php echo $users->getFirstname()?></td>
      <td><?php echo $users->getLastname()?></td>
      <td><?php echo $users->getUsername()?></td>
      <td><?php echo $users->getPassword()?></td>
      <td><?php if ($users->getRole() == 1){
          echo "Admin";
      }
      else{
          echo "User";
      }
      ?></td>
     
      <td>
          <form action="UpdateBook.php" class="input-group" method = "get">
          	<input type="hidden"  value="<?php echo $book->getId() ?>" name="id"/>
          	<button type="submit" class="btn btn-success" name="update">Update</button>
      	  </form>
  	  </td>
      <td><form action="../DeletebookHandler.php" class="input-group" method = "get">
      <input type="hidden"  value="<?php echo $book->getId() ?>" name="id"/>
      <button type="submit" class="btn btn-primary " name="Delete">Delete</button></form></td>
      
    </tr>
    <?php } ?>
  </tbody>
</table>
<script>
$(document).ready( function () {
    $('#tablesearch').DataTable();
} );
</script>
	</body>
</html>
