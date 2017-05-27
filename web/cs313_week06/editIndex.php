<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>06 Prove</title>
    </head>
    <body>
        <div>
            <img src="byui-logo.png" alt="byui logo">
        </div>
        <div>
            <h1>PROJECT TITLE: Personal Investments</h1>
        </div>
        <hr>
        <h2>1 - EDIT DATA: Update here your investment</h2>
        <form action="setInvestment.php" method="POST">
            <table border="0">
                <tr>
                    <td colspan="">
                        Investor Name:
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $_GET[user];?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                         Investment Name:
                    </td>
                    <td>
                        <input type="text" name="nameInvestment" value="<?php echo $_GET[investmentName];?>">
                    </td>
                    <td>
                         Investment APR:
                    </td>
                    <td>
                        <input type="number" name="aprInvestment" value="<?php echo $_GET[apr];?>">>
                    </td>
                </tr>
                <tr>
                    <td>
                        Investiment Amount:
                    </td>
                    <td>
                          <input type="text" name="amountInvested" value="<?php echo $_GET[invAmount];?>">
                    </td>
                    <td>
                        Investiment Date:
                    </td>
                    <td>
                        <input type="date" name="dateInvested" value="<?php echo $_GET[invDate];?>">>
                    </td>
                    <td>
                        <input type="text" name="investmentid" value="<?php echo $_GET[investmentid];?>" hidden>
                        <input type="text" name="amountid" value="<?php echo $_GET[amountid];?>" hidden>
                        <input type="text" name="loginid" value="<?php echo $_GET[loginid];?>" hidden>
                        
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Edit">
                    </td>
                    
                </tr>
            </table>
        </form>
    </body>
</html>


