<?php
    //session_start();
    
    $product_name = $_GET[product];
    $product_price = $_GET[price];

    //$_SESSION['qty'] = $qty;
    //$_SESSION['product'] = $product;
    //$_SESSION['price'] = $price;

    $hp_or_lenovo = strtok($product, " ");

?>

<!DOCTYPE html>

<html>
<head>
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" />
    <title>Item Details</title>
</head>
<body>
    <div id="header">
        <img id="imgLogo"src="logo.png" alt="Logo"/>
        
    </div>
    <hr />
    <h2>PRODUCT DETAILS</h2>
    <hr />

<div id="all">
    <div id="headerProdName">
        <h2><?=$product_name;?></h2>
    </div>
        <?php
            if ($hp_or_lenovo == "HP")
            {
                echo "<img id ='imgDetail' src='hp_desk.jpg' alt='HP Desktop'>";
            }
            else
            {
                echo "<img id ='imgDetail' src='lenovo_desk.jpg' alt='LENOVO Desktop'>";
            }
        ?>
    
        <form action="viewCartPage.php" method="POST">
        <table id="detailsPage">
            <tr>
                <th id="qty">
                    QTY
                </th>
                <th id="prod">
                    PRODUCT DESCRIPTION
                </th>
                <th id="price">
                    PRICE U$
                </th>
                <th id="buy">
                    BUY
                </th>
            </tr>
            <div id="hp_desc">
                <?php
                    if ($hp_or_lenovo == "HP")
                    {
                        echo " <p>This HP DESKTOP is stylish. It’s sophisticated. It’s smart. Because, guess what? So are you. Your creative energy can’t be contained, and you need a machine that can keep up. Be ready for when inspiration strikes.<p>";
                    }
                    else
                    {
                        echo " <p>This LENOVO DESKTOP is stylish. It’s sophisticated. It’s smart. Because, guess what? So are you. Your creative energy can’t be contained, and you need a machine that can keep up. Be ready for when inspiration strikes.<p>";
                    }
                ?>
            </div>
            <tr>
                <td>
                    <input type="number" name="qty" value="1"><br>
                </td>
                <td>
                    <input type="text" name="product" size="50" value="<?=$product_name;?>" readonly="readonly">
                </td>
                <td>
                    <input type="text" name="price" size="4" value="<?=$product_price;?>" readonly="readonly">
                </td>
                <td id="buttonAddCart" text-align="center">
                    <input type="submit" value="Add to Cart">
                </td>
            </tr>
            </table>
            </form>
    </div>
</body>
</html>


