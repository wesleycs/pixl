<html>

<head>
<title>👁️ Pixl-Gallery </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
<?php require_once('./config.php');?>

<?php
$infotxt = file_get_contents('/var/www/test/uploads/info.txt');
$info = unserialize($infotxt);
$orientation = $info['orientation'];
?>

<style>
<?php include 'css/main.css'; ?>
</style>

</head>

<a class="menu" href="/about">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</a>

<div class="logo">

<ul>
    <table>
        <tr>
            <th><span><a href="/about">PIXL</a></span></th>
        </tr>
        </table>
    </ul>
</div>
	
</div>


<body>
  <div class="<?php echo $orientation;?>">
	<img class="art" src="picture.jpg">
  </div>
   <div class="description">
	 <h1 class="title">
		<?php
		$infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
	        $title =$info['title'];
		?>
	        <p class="title"><?php echo $title; ?></p>
		 <?php
	        $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
       	        $info = unserialize($infotxt); 
   		$site = $info['site'];
    		?>			
                
		<?php
                $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
                $info = unserialize($infotxt); 
       	        $artist = $info['artist'];
     	        ?>
	        <a class="site" href="<?php echo $site;?>">
		<p class="artist"><?php echo $artist; ?></p></a> 

		<?php $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
		$description = $info['description'];
		?>
		<p class="info"><?php echo $description; ?></p>


                <?php $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
		$cost = $info['price'];
		$price = ((int) ($cost/100));
	 	$price = '$'. $price.'.00 USD';
	        ?>
		<p class="price"><?php echo $price ?></p>

		 <!-- The Stripe API form for purchasing -->     
	     <form id="buy_button" class="checkout" action="shipping.php" method="post">
		<script
		  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		  data-key="<?php echo $stripe['publishable_key']; ?>"
		  data-amount=<?php 
   	  	  $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		  $info = unserialize($infotxt);
		  $cost = $info['price'];
		  echo $cost; ?>
		  data-label="Buy"
		  data-name="Pixl Gallery"
		  data-panel-label="Continue to Checkout"
		  data-description="Supporting artists"
		  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
		  data-locale="auto"
		  data-zip-code="true"
		  data-billing-address="true",
		  data-shipping-address="false",
		  data-allow-remember-me="false">
		</script>
	     </form>

		<h1 class="sold">SOLD OUT</h1>
 		<p class="sold">Check back shortly..we're hanging up a new piece</p>


 </div>
</body>

<div class="icons">
<ul>
 <li><a href="https://www.twitter.com/pixlartgallery"><img class="twitter" src="images/icons/twitter_logo.svg"></a></li>
 <li><a href="https://www.instagram.com/pixlartgallery"><img class="instagram" src="images/icons/insta_logo.svg"></a></li>
</ul>
</div>


</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/main.js"></script>
