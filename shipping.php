<?php
  require_once('config.php');
  //get the price from the object that holds current pictures data

  $infotxt1 = file_get_contents('/var/www/test/uploads/info.txt');
  $info1 = unserialize($infotxt1);
  $price1 = (int) $info1['price'];
  $orientation = $info1['orientation'];
  //normalize the price by dividing by 100 to account for how stripe
  // handles price input

  $price2 = ((int) ($price1/100));

  //get the name of the piece and artist  people are buying to display on checkout

  $title = $info1['title'];
  $artist = $info1['artist'];

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

try {
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

}  catch(Stripe\Error\InvalidRequest $e) {

	header('Location: https://www.pixl-gallery.com/soldout.php');

}


$ordid= $order['id'];
$order = \Stripe\Order::retrieve($ordid);

$num = $order['shipping_methods'][2]['id'];
$shipping_amount = $order['shipping_methods'][2]['amount'];
$shipping_amount = $shipping_amount/100;
$estimated_delivery = $order['shipping_methods'][2]['delivery_estimate']['date'];

  //updating order with num selects the cheapest shipping method and plugs it in

$order['selected_shipping_method'] = $num;

$order->save();

  //have to store order total after updating order with shipping

$order_total_stripe = $order['amount'];
$order_total = $order_total_stripe/100;
//echo $order;
//echo $order_total_stripe;
//echo '<h2>'.$shipping_amount.'<h2>';
//echo '<h3>'.$order_total.'</h3>';
//echo '<h2>'.$estimated_delivery.'</h2>';

/**
 $charge = \Stripe\Charge::create(array(
	'customer' => $customer->id,
	'amount' => $order_total_stripe,
	'currency' => 'usd',
        'receipt_email' => $_POST['stripeEmail'],
	'description' => 'Artwork from Pixl Gallery'
 ));

**/

//  echo '<h1>Successfully charged</h1>';
 // print $charge->amount;
//  echo '$'.$price2.'.00';
?>
<head>
    <title>Pixl-Gallery </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<div class="logo-1">

<ul>
    <table>
       <tr>
	  <th><span><a href="/">PIXL</a></span></th>
       </tr>
    </table>
</ul>
</div>

<div class="shipping">
  <p>
<!--<?php echo $order ?>-->
<?php echo '<h3>'.htmlentities($title).'</h3>';?>
<!--<?php echo '<h4> Price: $'.$price2.'.00</h4>';?>-->
<?php echo '<p> Standard shipping: $'.$shipping_amount.'</p>';?>
<?php echo '<h5> Estimated delivery date: '.$estimated_delivery.'</h2>';?>
<?php echo '<h3> Order Total: $'.$order_total.'</h3>';?>
<br><br>
	<a href="">
	<form action="charge.php" method="post">
	<input type="hidden" name="customer_id" value="<?php echo $customer->id?>" />
	<input type="hidden" name="order_total_stripe" value="<?php echo $order_total_stripe?>" />
	<input type="hidden" name="email" value="<?php echo htmlentities($_POST['stripeEmail'])?>" />
	<input type="hidden" name="order_id" value="<?php echo $orderid?>" />
	<button href=""  class="button" type="submit" >Confirm Purchase</button>
	</form>
	</a>
  </p>
</div>

</body>

<div class="icons">
    <ul>
        <li>
            <a href="https://www.twitter.com/pixl"><img class="twitter" src="/images/icons/twitter_logo.svg"></a>
        </li>
        <li>
            <a href="https://www.instagram.com/pixl"><img class="instagram" src="/images/icons/insta_logo.svg"></a>
        </li>
    </ul>
</div>
</div>

<script type="text/javascript" src="js/checkout.js"></script>
<script>
$(document).ready(function() {
$("button").click(function(){
  $.ajax({
    url:"charge.php",
    type: "GET",
    success: function(result){
    alert(result);
    }
  });
});
})
</script>

</html>
