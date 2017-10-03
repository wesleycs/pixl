<?php 
  require_once('config.php');  
  
  //get the price from the object that holds current pictures data
 
  $infotxt1 = file_get_contents('/var/www/test/uploads/info.txt');
  $info1 = unserialize($infotxt1);
  $price1 = $info1['price'];

  //normalize the price by dividing by 100 to account for how stripe
  //makes you enter a price
  //and add .00 for presentation
	
  $price2 = ((int) ($price1/100));

  //Stripes token gained from submission used to charge a customer

  $token = $_POST['stripeToken'];

  //grab their email and the token and create an array with those values
  

   $customer = \Stripe\Customer::create(array(
	'email' => $_POST['stripeEmail'],
	'source' => $token
  ));
 


  //create a charge array with credentials
  //use original int in stripe format not reformatted version
  // price1 is original
  //price2 is the user friendly version ie 1500 vs 15.00


$order = \Stripe\Order::create(array(
	'currency' => 'usd',
	'email' => $_POST['stripeEmail'],
	'items' => array(
	  array(
	    'type' => 'sku',
	     'parent' => 'sku_BTk4yyfQe4ybFd',
	     'quantity' => 1,
	 )
	),
	'shipping' => array(
	 'name' => 'Jenny Rosen',
	 'address' => array(
	   'line1' => '1234 Main Street',	 
	   'city' => 'San Francisco',
	   'country' => 'US',
	   'postal_code' => '94110'
	  )
	),
));
 
$ordid= $order['id'];
$order = \Stripe\Order::retrieve($ordid);

$num = $order['shipping_methods'][2]['id'];
$order['selected_shipping_method'] = $num; 

$order->save();

echo $order;

/**
 $charge = \Stripe\Charge::create(array(
	'customer' => $customer->id,
	'amount' => $price1,
	'currency' => 'usd',
        'receipt_email' => $_POST['stripeEmail'],
	'description' => 'Artwork from Pixl Gallery' 
 ));
 **/

  echo '<h1>Successfully charged</h1>';
 // print $charge->amount;
  echo '$'.$price2.'.00';
  echo $_POST['stripeBillingAddressZip'];
  echo $_POST['stripeBillingAddressLine1'];
?>

<script type="text/javascript" src="js/checkout.js"></script>
