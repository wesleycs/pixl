<html>
<head>
<title>Pixl-Gallery </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'form_processor.php';?>
<style>
</style>
</head>

<body>


<div>

<ul>
    <table>
        <tr>
            <th><span><a href="../">PIXL</a></span></th>
        </tr>
        </table>
    </ul>
</div>

<body>

<div class="submit">
<form action="" method="post" enctype="multipart/form-data">
	Select image to upload:
	<input type="file" name="file" id="file"><br><br>	
	Title of Artwork: <input type="text" name="title" value=""><br><br>
	Name of Artist (First, Last): <input type="text" name="artist" value=""><br><br>
	Link to artist site or profile (https://www.site.com) : <input type="text" name="site" value=""><br><br>
	Description of Artwork (dimensions, medium, description) : <input type="text" name="description" value=""><br><br>
	Price (ex. $15.00): <input type="text" name="price" value=""><br><br>
	<input type="submit" value="Upload" name="submit">
</form>

<?php
/*
if(isset($_POST["submit"])){
	$name = $_FILES['file']['name'];
	$temp_name = $_FILES['file']['tmp_name'];
	$location = '/var/www/test/uploads/';
	if(move_uploaded_file($temp_name, $location.$name)){
	echo "success";
	}
	else { 
	echo "fail"; }
		

	echo "Debug info: ";
	print_r($_FILES);
}
*/
?>

</div>


</body>


</html>

