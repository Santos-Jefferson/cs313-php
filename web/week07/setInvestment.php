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
        </div>
        
        <hr>
<?php
    session_start();
    $userLogged = $_SESSION['username'];
    require 'connection.php';
    
    //Variables came from index.php
    $nameInvestment = $_POST[nameInvestment];
    $aprInvestment = $_POST[aprInvestment];
    $amountInvested = $_POST[amountInvested];
    $dateInvested = $_POST[dateInvested];
    $username = $userLogged;
    
    //$username = $_POST[username];
    
    
    
    foreach ($db->query("SELECT * FROM login WHERE username = '$userLogged'") as $row)
    {
        $loginid = $row['loginid'];
        //echo $loginid;
    }
    
    /*
    echo $_POST[amountid]." amount";
    echo "<br>";
    echo $_POST[investmentid]." investment";
    echo "<br>";
    echo $_POST[loginid]." login";
    echo "<br>";
     */ 
      
     
    //print_r ($username);
    //print_r ($loginid);
    
   //print_r($_REQUEST);
    
    //test if $login exist and is not empty
    if (!isset($_POST[loginid]) && !isset($_POST[amountid]) && !isset($_POST[investmentid]) && !isset($_GET[action]))
    {
        
        //$username = $_POST[loginid];
        
        //getting rows from the database with the conditions below
        $investment = 'INSERT INTO investment (name, apr) VALUES (?,?)';
        
        $stmt = $db->prepare($investment);
        $stmt->bindParam(1, $nameInvestment);
        $stmt->bindParam(2, $aprInvestment);
        $stmt->execute();
        //print_r($stmt->errorInfo());
        $investmentid = $db->lastInsertId();
        
        
        $amount = 'INSERT INTO amount (dateinvested, amountinvested, datewithdrew, amountwithdrew, amountinterested, investmentid, loginid) VALUES (?,?,?,?,?,?,?)';
        
        $stmt = $db->prepare($amount);
        $stmt->bindParam(1, $dateInvested);
        $stmt->bindParam(2, $amountInvested);
        $stmt->bindParam(3, $dateInvested);
        $stmt->bindParam(4, $amountInvested);
        $stmt->bindParam(5, $amountInvested);
        $stmt->bindParam(6, $investmentid);
        $stmt->bindParam(7, $loginid);
        $stmt->execute();
        //print_r($stmt->errorInfo());
        
        echo "<h2>INVESTMENT ADDED: <tr><td>Investor: $userLogged | Name: $nameInvestment | APR: $aprInvestment% | Amount: U$$amountInvested.00 | Date: $dateInvested</td></tr></table></h2>";
        
        //print_r($stmt->errorInfo());
        $amountid = $db->lastInsertId();
        //return $stmt->rowCount();
    }
    else if (isset($_POST[loginid]) && isset($_POST[amountid]) && isset($_POST[investmentid]) && (empty($_GET[action])))
    {
        $investmentUpdate = 'UPDATE investment SET name = :name, apr = :apr WHERE investmentid = :investmentid';
                
        
        $stmt = $db->prepare($investmentUpdate);
        $stmt->bindParam(':name', $nameInvestment);
        $stmt->bindParam(':apr', $aprInvestment);
        $stmt->bindParam(':investmentid', $_POST[investmentid]);
        $stmt->execute();
        //print_r($stmt->errorInfo());
        $investmentUpdateid = $db->lastInsertId();
        //echo $investmentUpdateid;
        
        
        $amountUpdate = 'UPDATE amount SET'
                        . 'dateinvested = :dateinvested,'
                        . 'amountinvested = :amountinvested,'
                        . 'datewithdrew = :datewithdrew,'
                        . 'amountwithdrew = :amountwithdrew,'
                        . 'amountinterested = :amountinterested'
                        . 'WHERE amountid = :amountid'
                        . 'AND loginid = :loginid'
                        . 'AND investmentid = :investmentid';
                
        
        $stmt = $db->prepare($amountUpdate);
        $stmt->bindParam(':dateinvested', $dateInvested);
        $stmt->bindParam(':amountinvested', $amountInvested);
        $stmt->bindParam(':datewithdrew', $dateInvested);
        $stmt->bindParam(':amountwithdrew', $amountInvested);
        $stmt->bindParam(':amountinterested', $amountInvested);
        $stmt->bindParam(':amountid', $_POST[amountid]);
        $stmt->bindParam(':loginid', $_POST[loginid]);
        $stmt->bindParam(':investmentid', $investmentUpdateid);
        $stmt->execute();
        //print_r($stmt->errorInfo());
        //$amountUpdateid = $db->lastInsertId();
        //echo $amountUpdateid;
        //return $stmt->rowCount();
    }
    else
    {
        $username = $userLogged;
        //$investmentDelete = 'DELETE FROM investment WHERE investmentid = :investmentid';
        $amountDelete = 'DELETE FROM amount WHERE amountid = :amountid';
                
        /*
        $stmt = $db->prepare($investmentDelete);
        $stmt->bindParam(':investmentid', $_GET[investmentid]);
        $stmt->execute();
        */
        
        $stmt = $db->prepare($amountDelete);
        $stmt->bindParam(':amountid', $_GET[amountid]);
        $stmt->execute();
        
            echo "<h2>DELETE DONE!</h2>";
        
        
    }
        
        
?>
        <h1><a href="index.php?username=<?php echo $userLogged;?>"><h3><-- Go Back</h3></a></h1>
        <form action="signout.php">
            <table><tr><td><input type="submit" name="login" value="Logout"></td></tr></table>
        </form>
    </body>
</html>
