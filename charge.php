<?php
    require_once('config.php');
    
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
    echo "<h3>".'Your card has been declined. Please return to the Pixl homepage and try checking out with another card'."</h3>";
} 
    print_r($charge);

    //update product quantity to 0 after purhcase to avoid race conditions

    $infotxt1 = file_get_contents('/var/www/test/uploads/info.txt');
    $info1 = unserialize($infotxt1);
    $sku = $info1['sku'];

    $product = \Stripe\SKU::retrieve("sku_BTk4yyfQe4ybFd");
    $product->inventory["quantity"] = "0";
    $product->save();
   

?>
