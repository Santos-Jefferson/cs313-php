<?php
session_start();
//print_r($_REQUEST);
//print_r($_SESSION);

    
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" />
    <title>Checkout Page</title>
</head>
<body>
    <div id="header">
        <a href="browseItemsPage.php"><img id="imgLogo"src="logo.png" alt="Logo"/></a>
    </div>
    <hr />
    <h2>CHECKOUT PAGE</h2>
    <hr>
<body>
<div>
<form action="confirmationPage.php" method="POST">
<h3>Please, input the shipping address:</h3><br>
Street: <input type="text" name="street" size="50"><br><br>
Number: <input type="text" name="number" size="10"><br><br>
City: <input type="text" name="city" size="20"><br><br>
State: <input type="text" name="state" size="5"><br><br>
Zip: <input type="text" name="zip" size="10"><br><br><br>
<input type="submit" value="CONFIRM ORDER">
</form>
</div>
</body>
</html>
