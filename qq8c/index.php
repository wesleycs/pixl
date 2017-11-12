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
	Price (ex. 1500 is $15.00): <input type="text" name="price" value=""><br><br>
	Product sku (from stripe API): <input type="text" name="sku" value=""><br><br>
	<input type="submit" value="Upload" name="submit">
</form>

</div>


</body>


</html>

