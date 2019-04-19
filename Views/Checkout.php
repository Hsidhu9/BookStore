<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Services/AddressService.php';
require_once '../Services/BookService.php';
require_once '../Models/Address.php';
require_once '../Models/Book.php';
require_once '../Models/cart.php';
require_once '../navbar.php';

$userid = 0;
if(isset($_SESSION["userid"])){
    
    $userid = $_SESSION["userid"];
    
}
else{
    echo "You are not logged in yet.<br>";
    exit;
}
$bookService = new BookService();
$cart = new Cart($userid);
if(isset($_SESSION["cart"])){   
    $cart = $_SESSION["cart"]; 
}
else{
    echo "Nothing in the cart yet.<br>";
    exit;
}

if(isset($_SESSION["username"])){
    
    $username = $_SESSION["username"];
    
}
else{
    echo "You are not logged in yet.<br>";
    exit;
}

        $addressService = new AddressService();
        $address = $addressService->getAddressByUserId($userid);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
</head>

<body>
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
  foreach ($cart->getItems() as $bookId => $qty){
      $book = $bookService->getBookById($bookId);
  ?>
    <tr>
      
      <td><?php echo $book->getTitle()?></td>
      <td><?php echo $book->getAuthorFirstName(). " " . $book->getAuthorLastName()?></td>
      <td><?php echo $qty?></td>
      <td><?php echo "$".$book->getCost()?></td>
      <td><?php echo "$".$book->getCost() * $qty?></td>
      
    </tr>
    <?php }
    
    
    //echo "<b>".$cart->getSubtotals() ."</b>"
    ?>
  </tbody>
</table>
<?php 
$total_price =  $cart->calculate_total();
$_SESSION['cart'] = $cart;
 ?>
<label><b>Total Cost is </b></label><?php echo " $ ".  $total_price?>

	

	<div style="margin: 5rem 8rem 0rem 13rem">
	
	
    	<?php echo $address->getAddress1()?><br>
    	<?php echo $address->getAddress2()?><br>
    	<?php echo $address->getCity().", "?>
    	<?php echo $address->getState(). ", "?>
    	<?php echo $address->getZip()?><br>
    	<?php echo $address->getCountry()?>
	
	
	</div>
	
	<div class="container">
  	<form class="form-horizontal" role="form" method="post" action="../CheckoutHandler.php">
    <fieldset>
      <legend>Payment</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row" style="margin-left:0px">
            <div class="col-xs-3">
              <select class="form-control" name="expiry-month" id="expiry-month">
                <option>Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="13">2013</option>
                <option value="14">2014</option>
                <option value="15">2015</option>
                <option value="16">2016</option>
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success">Pay Now</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>
</body>
</html>
