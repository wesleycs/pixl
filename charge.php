<?php 
  require_once('config.php');
 
  $infotxt1 = file_get_contents('/var/www/test/uploads/info.txt');
  $info1 = unserialize($infotxt1);
  $price1 = $info1['price'];	
  $price2 = ((int) ($price1/100));
  print '$'.$price2.'.00';

  $token = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
	'email' => $_POST['stripeEmail'],
	'source' => $token
  ));

  $charge = \Stripe\Charge::create(array(
	'customer' => $customer->id,
	'amount' => $price2,
	'currency' => 'usd'
  ));
 
  echo '<h1>Successfully charged</h1>';
  print $charge->amount;
?>
