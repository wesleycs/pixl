<html>
<head>
<title>👁️ Pixl-Gallery </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'users_online.php';?>
<?php require_once('./config.php');?>
<style>
<?php include 'css/main.css'; ?>
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/main.js"></script>

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

    <div class="test">
     <!--  <img src="http://portra.wpshower.com/wp-content/uploads/2014/03/martin-schoeller-barack-obama-portrait-up-close-and-personal.jpg">-->
	<img src="picture.jpg">
      </img>
    </div>

    <div class="container" onclick="void(0)">
        <div class="overlay">
          <h1 class="dismiss">X</h3>
	    <div class="info">
                <h2 class="title">
		<?php
		$infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
		echo $info['title'];
		?></h2>
		<h3 class="artist">by </br><br/></br><span><a style="text-decoration: underline;" href=
		"<?php $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
		echo $info['site'];
		?>">
	        <?php
		$infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
		echo $info['artist'];
		?>
		</a></span></h3>
                <h4 class="description">
		<?php $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
		echo $info['description'];
		?>
		</br>
		<span class="price">
                <?php $infotxt = file_get_contents('/var/www/test/uploads/info.txt');
		$info = unserialize($infotxt);
		$cost = $info['price'];
		$price = ((int) ($cost/100));
		echo '$'. $price.'.00';
	         ?></span> </h4>	
	 
	 <!-- The Stripe API form for purchasing -->     
	     <form class="checkout" action="charge.php" method="post">
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
		  data-panel-label="Continue to checkout"
		  data-description="Supporting artists"
		  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
		  data-locale="auto"
		  data-zip-code="true"
		  data-billing-address="true",
		  data-shipping-address="false",
		  data-allow-remember-me="false">
		</script>
	     </form>
	
         </div>
        </div>
    </div>

    <div class="counter">
    <p class="count"><?php echo $count_user_online; ?> 👁️</p>
    </div>

<div class="footer">
<div class="menu">
<ul>
 <li><a href="/about">about</a></li>
 <li><a href="/archive">archive</a></li>
 <li><a href="/contact">contact</a></li>
</ul>
</div>

<div class="icons">
<ul>
 <li><a href="https://www.twitter.com/pixlartgallery"><img class="twitter" src="images/icons/twitter_logo.svg"></a></li>
 <li><a href="https://www.instagram.com/pixlartgallery"><img class="instagram" src="images/icons/insta_logo.svg"></a></li>
</ul>
</div>
</div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/main.js"></script>
</html>
