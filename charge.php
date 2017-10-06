<?php
  require_once('config.php');

  //get the price from the object that holds current pictures data

  $infotxt1 = file_get_contents('/var/www/test/uploads/info.txt');
  $info1 = unserialize($infotxt1);
  $price1 = $info1['price'];

  //normalize the price by dividing by 100 to account for how stripe

  $price2 = ((int) ($price1/100));

  //Stripes token gained from submission used to charge a customer

  $token = $_POST['stripeToken'];

  //grab customer email and the token and create an array with those values

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
	 'name' => $_POST['stripeBillingName'],
	 'address' => array(
	   'line1' => $_POST['stripeBillingAddressLine1'],
	   'city' => $_POST['stripeBillingAddressCity'],
	   'postal_code' => $_POST['stripeBillingAddressZip'],
	   'state' => $_POST['stripeBillingAddressState'],
	   'country' => $_POST['stripeBillingAddressCountryCode']
	  )
	),
));

$ordid= $order['id'];
$order = \Stripe\Order::retrieve($ordid);

$num = $order['shipping_methods'][2]['id'];
$shipping_amount = $order['shipping_methods'][2]['amount'];
$estimated_delivery = $order['shipping_methods'][2]['delivery_estimate']['date'];

  //updating order with num selects the cheapest shipping method and plugs it in

$order['selected_shipping_method'] = $num;

$order->save();

  //have to store order total after updating order with shipping

$order_total = $order['amount'];

echo $order;

echo '<h2>'.$shipping_amount.'<h2>';
echo '<h3>'.$order_total.'</h3>';
echo '<h2>'.$estimated_delivery.'</h2>';

/**
 $charge = \Stripe\Charge::create(array(
	'customer' => $customer->id,
	'amount' => $order_total,
	'currency' => 'usd',
        'receipt_email' => $_POST['stripeEmail'],
	'description' => 'Artwork from Pixl Gallery'
 ));
 **/

  echo '<h1>Successfully charged</h1>';
 // print $charge->amount;
  echo '$'.$price2.'.00';
?>
<head>
<link rel="stylesheet" type="text/css" href="css/charge.css">
</head>

<body>
<div class="logo">

<ul>
    <table>
       <tr>
	  <th><span><a href="/about">PIXL</a></span></th>
       </tr>
    </table>
</ul>
</div>

<script type="text/javascript" src="js/checkout.js"></script>
