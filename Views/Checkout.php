<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Services/AddressService.php';
require_once '../Models/Address.php';
require_once '../navbar.php';

$userid = 0;
if(isset($_SESSION["userid"])){
    
    $userid = $_SESSION["userid"];
    
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

	<div>
	<p><?php echo $address->getAddress1()?></p>
	<p><?php echo $address->getAddress2()?></p>
	<p><?php echo $address->getCity()?> </p>
	<p><?php echo $address->getState()?></p>
	<p><?php echo $address->getZip()?></p>
	<p><?php echo $address->getCountry()?></p>
	</div>
</body>
</html>
