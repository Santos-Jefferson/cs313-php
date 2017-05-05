<?php
    session_start();
    
    //print_r($_REQUEST);

    if (empty($_SESSION['product']))
    {
        $_SESSION['qty'] = array();
        $_SESSION['product'] = array();
        $_SESSION['price'] = array();
    }


    array_push($_SESSION['qty'], $_POST['qty']);
    array_push($_SESSION['product'], $_POST['product']);
    array_push($_SESSION['price'], $_POST['price']);

    /*
    print_r($_SESSION['qty']);
    print_r($_SESSION['product']);
    print_r($_SESSION['price']);
    */

    

    function listArray()
    {
        if (isset($_GET['empty']))
        {
            session_unset();
        }

        if (!empty($_SESSION['product']))
        {
            $qty = 0;
            $total = 0;
            echo "<th>QTY</th>";
            echo "<th>PRODUCT NAME</th>";
            echo "<th>PRICE</th>";
                for ($i = 0; $i < count($_SESSION['product']); $i++)
                {
                    echo "
                        <tr>
                            <td>".
                                $_SESSION['qty'][$i]."
                            </td>
                            <td>".
                                $_SESSION['product'][$i]."
                            </td>
                            <td align='right'>U$ ".
                                $_SESSION['price'][$i].".00"."
                            </td>
                        </tr>";
                        $qty += $_SESSION['qty'][$i];
                        $total += $_SESSION['price'][$i];
                    }//closing for
                
                    echo "
                        <tr>
                            <td colspan='3' align='right'><b>TOTAL PRICE U$".
                                $total.".00</b>"."</b>
                            </td>";
                }//closing if
                else
                {
                    echo "<tr><td>EMPTY ";
                }
            }//closing function
   //session_destroy();
?>

<!DOCTYPE html>

<html>
<head>
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" />
    <title>Shopping Cart</title>
</head>
<body>
    <div id="header">
        <a href="browseItemsPage.php"><img id="imgLogo"src="logo.png" alt="Logo"/></a>
    </div>
    <hr />
    <h2>SHOPPING CART</h2>
    <hr>
    <form action="checkoutPage.php" method="POST">
    <table>
        <?=listArray();?>
    </table>
    <br>
    <br>
    <a href="browseItemsPage.php?return=return" class="button"><h4>Return to Browse Items</h4></a><br><br>
    <a href="viewCartPage.php?empty=empty" class="button"><h4>Empty Shopping Cart</h4></a><br><br>
    <input type="submit" action="test.php" name="checkoutButton" value="PROCEED TO CHECKOUT">
    </form>

</body>
</html>
