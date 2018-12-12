<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../Services/BookService.php';
require_once '../navbar.php';


if(isset($_GET['search']))
{
    $search = $_GET['search'];
}
else{
    echo "book not found";
}


?>

<!DOCTYPE html>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="crossorigin="anonymous">
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <title>Search</title>
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
    
    .button {
  background-color: #555555;
  border: none;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
    
    </style>
  </head>
 		<input type="button" class="button" value="Go Back" onclick="history.back(-1)" />
  
<h2 align="center">Search Results.</h2>  
	
	<table id="tablesearch" class="display">
  <thead>
    <tr>
      
      <th>Book Title</th>
      <th>ISBN</th>
      <th>Cost</th>
      <th>Author Name</th>
      <th>Publisher Name</th> 
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
    $bookService = new BookService();
    $arrayS = $bookService->findByTitle($search);
    foreach ($arrayS as $kitab) {
?>
    <tr>
      
      <td><?php echo $kitab->getTitle()?></td>
      <td><?php echo $kitab->getISBN()?></td>
      <td><?php echo "$".$kitab->getCost()?></td>
      <td><?php echo $kitab->getAuthorFirstName(). " " . $kitab->getAuthorLastName()?></td>
      <td><?php echo $kitab->getPublisherFirstName(). " " . $kitab->getPublisherLastName()?></td>
      <td><form action="../addToCart.php" class="input-group" method = "get">
      <input type="hidden"  value="<?php echo $kitab->getId() ?>" name="id"/>
      <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button></form></td>
      
      
    </tr>
    <?php } ?>
  </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#tablesearch').DataTable();
} );
</script>
</html>


