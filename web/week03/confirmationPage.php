<?php
session_start();
//print_r($_POST);
//print_r($_SESSION);

$street = $_POST['street'];
$number = $_POST['number'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];


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
                }//closing else
            }//closing function

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" />
    <title>Confirmation Page</title>
</head>
<body>
    <div id="header">
        <a href="browseItemsPage.php"><img id="imgLogo"src="logo.png" alt="Logo"/></a>
    </div>
    <hr />
    <h2>CONFIRMATION PAGE</h2>
    <hr>
<body>
<table>
<?=listArray();?>

</table>
<h3>SHIPPING ADDRESS:</h3>
<?php
    echo $number.", ".$street."<br>";
    echo $city.", ".$state."<br>";
    echo $zip."<br>";
?>
<hr>
<h3>******* THANK YOU *******</h3><br>

</body>
</html>