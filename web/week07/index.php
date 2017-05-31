<?php 
    session_start();
    $userLogged = $_SESSION['username'];
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>06 Prove</title>
    </head>
    <body>
        <div>
            <a href="signup.php"><img src="byui-logo.png" alt="byui logo"></a>
        </div>
        <div>
            <h1>PROJECT TITLE: Personal Investments</h1>
            <h3>********* WELCOME <?php echo $userLogged;?> *********</h3>
        </div>
        <hr>
        <h2>1 - CREATE: Insert here your new investment data</h2>
        <form action="setInvestment.php" method="POST">
            <table border="0">
                <tr>
                    <td colspan="">
                        Investor Name:
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $userLogged;?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                         Investment Name:
                    </td>
                    <td>
                        <input type="text" name="nameInvestment">
                    </td>
                    <td>
                         Investment APR:
                    </td>
                    <td>
                        <input type="number" name="aprInvestment">
                    </td>
                </tr>
                <tr>
                    <td>
                        Investiment Amount:
                    </td>
                    <td>
                          <input type="text" name="amountInvested">
                    </td>
                    <td>
                        Investiment Date:
                    </td>
                    <td>
                        <input type="date" name="dateInvested">
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Include">
                    </td>
                    
                </tr>
            </table>
        </form>
        
        <h2>2 & 3 - LIST, UPDATE or DELETE: List, Update or Delete an investment listed below</h2>
        
        <?php 
        session_start();
        $userLogged = $_SESSION['username'];
        
        require 'connection.php';
        
            foreach ($db->query("SELECT * FROM login AS log, investment AS inv, amount AS amo WHERE log.username='$userLogged' and log.loginid = amo.loginid and inv.investmentid = amo.investmentid") as $row)
            {
                //printint the data retrieved from database
                echo "<b>Username:</b> ".$row['username']."<br>";
                //echo "Email: ".$row['email']."<br>";
                echo "<b>Investment:</b> ".$row['name']."(<b>APR:</b> ".$row['apr']."%)<br>";
                echo "<b>Amount:</b> "."U$ ".$row['amountinvested'].".00, <b>Date:</b> ".$row[dateinvested]."<br>";
                //echo "Withdrew : "."U$ ".$row['amountwithdrew'].".00, date: ".$row['datewithdrew']."<br>";
                echo "<b>ACTIONS: <a href='editIndex.php?user=$row[username]&loginid=$row[loginid]&investmentid=$row[investmentid]&amountid=$row[amountid]&investmentName=$row[name]&apr=$row[apr]&invAmount=$row[amountinvested]&invDate=$row[dateinvested]'><img src=edit.png id=imgedit></a>".
                                 "<a href='setInvestment.php?user=$row[username]&action=delete&loginid=$row[loginid]&investmentid=$row[investmentid]&amountid=$row[amountid]&investmentName=$row[name]&apr=$row[apr]&invAmount=$row[amountinvested]&invDate=$row[dateinvested]'><img src=delete.png id=imgedit></a>"."<br></b>";
                echo "<hr>";

                //incrementing
                $totalAmounted += $row['amountinvested'];
                $totalWithdrew += $row['amountwithdrew'];
            }
            echo "<b>TOTAL AMOUNTED = U$ ". $totalAmounted.".00<br>";
            echo "<b>TOTAL INTERESTED = U$ ". ($totalWithdrew - $totalAmounted).".00";
        ?>
        
        
    </body>
</html>


