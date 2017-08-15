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

    <div class="test">
      <img src="http://portra.wpshower.com/wp-content/uploads/2014/03/martin-schoeller-barack-obama-portrait-up-close-and-personal.jpg">
      </img>
    </div>

    <div class="counter">
    <p class="count"><?php echo $count_user_online; ?> 👁️</p>
    </div>

    <div class="container" onclick="void(0)">
        <div class="overlay">
            <div class="info">
                <h2 class="title">Hello World</h2>
                <h3 class="artist">by <span><a style="text-decoration: underline;" href="https://www.instagram.com/wcsendom/">Wesley Csendom<a></span></h3>
                <h4 class="description">A set of three 11"x17" one-color Risograph prints. Signed & numbered edition of 25.<span class="price">
                $15.00 USD</span> </h4>
                <input type="button" class="button" value="Buy">
            </div>
        </div>
    </div>

    <div class="counter">
    <p class="count"><?php echo $count_user_online; ?> 👁️</p>
    </div>

</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="main.js"></script>

</html>
