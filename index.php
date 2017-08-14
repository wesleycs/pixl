<html>
<head>
<title>👁️ Pixl-Gallery </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'users_online.php';?>
<style>
<?php include 'css/main.css'; ?>
</style>
</head>

<body>
<div>
<ul>
    <table>
        <tr>
            <th>PIXL</th>
        </tr>
        </table>
    </ul>
</div>

<body>
    <div class="container">
        <div class="overlay">
            <div class="info">
                <h2 class="title">Hello World</h2>
                <p class="artist">Designed by <a style="text-decoration: underline;" href="https://www.instagram.com/wcsendom/">Wesley Csendom<a></p>
                <p class="description">A set of three 11"x17" one-color Risograph prints. Signed & numbered edition of 25.
                $15.00 USD </p>
                <input type="button" class="button" value="Buy">
            </div>
        </div>
    </div>

    <div class="counter">
    <p class="count"><?php echo $count_user_online; ?> 👁️</p>
    </div>

</body>
</html>
