<?php 
session_start();

if(isset($_POST["submit"])){
	$name = $_FILES['file']['name'];
	$temp_name = $_FILES['file']['tmp_name'];
	$location = '/var/www/test/uploads/';

	$title = $_POST["title"];
	$artist = $_POST["artist"];
	$site	= $_POST["site"];
	$description = $_POST["description"];
	$price = $_POST["price"];

	$store = array(
		'title' => $title,
		'artist' => $artist,
		'site' => $site,
		'description' => $description,			
		'price' => $price
	);
	
	$fp = fopen('/var/www/test/uploads/info.txt', 'w');
	
	fwrite($fp, serialize($store));
	
	$infotxt = file_get_contents('/var/www/test/uploads/info.txt');	
	$info = unserialize($infotxt);

	echo $info['title'];

	if(move_uploaded_file($temp_name, $location.$name)){
	echo "success";
	}
	else {
	echo "fail"; }
	
}


?>