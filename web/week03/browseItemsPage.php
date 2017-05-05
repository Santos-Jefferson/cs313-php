<?php
session_start();

//include 'produtcs.php';
    $products = array (
        array("HP Desktop Intel Core I3, 4GB memory, 500GB HD, Keyb, Mouse",400),
        array("HP Desktop Intel Core I3, 8GB memory, 1TB HD, Keyb, Mouse", 500),
        array("HP Desktop Intel Core I5, 4GB memory, 500GB HD, Keyb, Mouse", 600),
        array("HP Desktop Intel Core I5, 8GB memory, 1TB HD, Keyb, Mouse", 700),
        array("HP Desktop Intel Core I7, 8GB memory, 1TB HD, Keyb, Mouse",800),
        array("HP Desktop Intel Core I7, 16GB memory, 2TB HD, Keyb, Mouse", 900),
        array("LENOVO Desktop Intel Core I3, 4GB memory, 500GB HD, Keyb, Mouse",350),
        array("LENOVO Desktop Intel Core I3, 8GB memory, 1TB HD, Keyb, Mouse", 450),
        array("LENOVO Desktop Intel Core I5, 4GB memory, 500GB HD, Keyb, Mouse", 550),
        array("LENOVO Desktop Intel Core I5, 8GB memory, 1TB HD, Keyb, Mouse", 650),
        array("LENOVO Desktop Intel Core I7, 8GB memory, 1TB HD, Keyb, Mouse", 750),
        array("LENOVO Desktop Intel Core I7, 16GB memory, 2TB HD, Keyb, Mouse", 850)
    );
?>

<!DOCTYPE html>

<html>
<head>
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" />
    <title>Browse Items!</title>
</head>
<body>
    <div id="header">
        <img id="imgLogo"src="logo.png" alt="Logo" />
        Click to go/see your Shopping Cart
        <a href="viewCartPage.php"><img id="imgIcon" src="cart_icon.png" alt="Cart Icon"></a>

    </div>
    <hr />
    <div id="itemsLis">
        <h2>PRODUCT LIST</h2>
        <hr/>
        
        <form action="viewCartPage.php" method="POST">
        <table>
            <tr>
                <!--<th>
                    QTY
                </th>-->
                <th>
                    IMAGE
                </th>
                <th>
                    PRODUCT NAME
                </th>
                <th>
                    UNIT PRICE
                </th>
                <!--<th>
                    CART
                </th>-->
                <th>
                    DETAILS
                </th>
				
            </tr>
            <?php
                for ($row = 0; $row < 12; $row++)
                {
                    if ($row == 0 || $row == 1 || $row == 2 || $row == 3 || $row == 4 || $row == 5)
                    {
                        echo "
                            <tr>
                                <td id='imgProduct'><img id='imgProduct' src='hp_desk.jpg'>
                                </td>";
                    }
                    else
                    {
                        echo "
                            <tr>
                                <td id='imgProduct'><img id='imgProduct' src='lenovo_desk.jpg'>
                                </td>";
                    }
                        /*<td><input type='number' name='qty' id='qty'/>
                        </td>"*/;
                    for($col = 0; $col < 2; $col++)
                    {
                        if ($col == 1)
                        {
                        echo "
                            <td id='unitPrice'>U$"
                                ." ".$products[$row][$col].
                            ".00</td>";
                        }
                        else
                        {
                            echo "
                            <td>"
                                .$products[$row][$col].
                            "</td>";
                        }
                    }
                    /*echo "
                        <td align='center'>
                            <input type='checkbox' name='checked[][]' value='".$products[$row][0]."'>
                        </td>";*/
                    $_SESSION["product_name"] = $products[$row][0];
                    $_SESSION["product_price"] = $products[$row][1];
                    //echo $products[$row][0];
                    echo "
                    <td align='center'>
                        <a href='itemDetailsPage.php?product=".$products[$row][0]."&price=".$products[$row][1]."' target='popupwindow' onclick='window.open('itemDetailsPage.php', 'popupwindow', 'scrollbars=yes,width=1100,height=450');return true'>Details and Buy</a>
                    </td>";
                }
            ?>
            <!--<tr>
                <td id="checkoutButon" colspan="4" align="right">
                    <input type="submit" value="Checkout">
                </td>
            </tr>-->
            
        </table>
        </form>
    </div>
    <div id="footer">

    </div>

</body>
</html>