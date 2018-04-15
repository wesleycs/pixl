<?php
    require_once('config.php');
    include('header.php');   
 
    try {
    $charge = \Stripe\Charge::create(array(
		'customer' => $_POST['customer_id'],
		'amount' => $_POST['order_total_stripe'],
		'currency' => 'usd',
		'receipt_email' => $_POST['email'],
		'description' => 'Artwork from Pixl Gallery'
    ));
    
    } catch (Stripe\Error\Charge $e) {
    	//Code to do something with the $e exception object when an error occurs	
    
    header("Location:https://pixl-gallery.com/error.php");
    exit;
} 
    //print_r($charge);

    //update product quantity to 0 after purhcase to avoid race conditions

    $infotxt1 = file_get_contents('/var/www/test/uploads/info.txt');
    $info1 = unserialize($infotxt1);
    $sku = $info1['sku'];

    $product = \Stripe\SKU::retrieve("sku_BTk4yyfQe4ybFd");
    $product->inventory["quantity"] = "0";
    $product->save();
   

?>

<head>
    <title>Pixl-Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.o">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

<div class="logo-1">

<ul> 
    <table>
       <tr>
          <th><span><a href="/">PIXL</a></span></th>
       <tr>
    </table>
</ul>
</div>

<div class="shipping">
 <h1> 🎉 Congratulation - You just bought a rare and  original artwork from Pixl Gallery! Thank you for supporting artists. Check your email for your tracking number and order information. Please email pixlartgallery@gmail.com if you have any further questions or comments - and check back shortly for a new exhibit! 
 </h1>
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

</html>
