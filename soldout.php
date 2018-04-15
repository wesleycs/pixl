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

<a href="/about">
<div class="menu">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>
</a>

<div class="logo">

<ul>
    <table>
        <tr>
            <th><span><a href="index.php">PIXL</a></span></th>
        </tr>
        </table>
    </ul>
</div>
	
</div>


<body>
 <div class="description">
   <h1> We're sorry - this picture has just sold out. Your card has not been charged. We're hanging up a new piece. Please check back shortly.. </h1>
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
