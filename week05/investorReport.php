<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>05 Prove</title>
    </head>
    <body>
        <div>
            <img src="byui-logo.png" alt="byui logo">
        </div>
        <div>
            <h1>CS 313 - 05 Prove : Assignment - PHP Data Access</h1>
        </div>
        
        <hr>
        
<?php
    //Trying to connect with database
    try
    {
        $user = 'postgres';
        $password = 'aaml0509';
        $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $user, $password);
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

    //Variables came from index.php
    $login = $_GET[login];
    $investment = $_GET[investment];
    $amountStart = $_POST[amountStart];
    $amountEnd = $_POST[amountEnd];
    $report = $_GET[report];
    
    //test if $login exist and is not empty
    if (isset($login) && !empty($login))
    {
        echo "<h2>INVESTMENTS REPORT - by user</h2>";
        //getting rows from the database with the conditions below
        foreach ($db->query("SELECT * FROM login AS log, investment AS inv, amount AS amo WHERE log.username='$login' and log.loginid = amo.loginid and inv.investmentid = amo.investmentid") as $row)
        
        {
            //printint the data retrieved from database
            echo "Username: ".$row['username']."<br>";
            echo "Email: ".$row['email']."<br>";
            echo "Investment: ".$row['name']."<br>";
            echo "Amount: "."U$ ".$row['amountinvested'].".00, date: ".$row[dateinvested]."<br>";
            echo "Withdrew : "."U$ ".$row['amountwithdrew'].".00, date: ".$row['datewithdrew']."<br>";
            echo "<hr>";
            
            //incrementing
            $totalAmounted += $row['amountinvested'];
            $totalWithdrew += $row['amountwithdrew'];
        }
        echo "<b>TOTAL AMOUNTED = U$ ". $totalAmounted.".00<br>";
        echo "<b>TOTAL INTERESTED = U$ ". ($totalWithdrew - $totalAmounted).".00";
    }
    
    else if (isset($investment) && !empty($investment))
    {
        echo "<h2>INVESTMENTS REPORT - by investment</h2>";
        foreach ($db->query("SELECT * FROM login AS log, investment AS inv, amount AS amo WHERE inv.name='$investment' and log.loginid = amo.loginid and inv.investmentid = amo.investmentid") as $row)
        
        {
            echo "Username: ".$row['username']."<br>";
            echo "Email: ".$row['email']."<br>";
            echo "Investment: ".$row['name']."<br>";
            echo "Amount: "."U$ ".$row['amountinvested'].".00, date: ".$row[dateinvested]."<br>";
            echo "Withdrew : "."U$ ".$row['amountwithdrew'].".00, date: ".$row['datewithdrew']."<br>";
            echo "<hr>";
            $totalAmounted += $row['amountinvested'];
            $totalWithdrew += $row['amountwithdrew'];
        }
        echo "<b>TOTAL AMOUNTED = U$ ". $totalAmounted.".00<br>";
        echo "<b>TOTAL INTERESTED = U$ ". ($totalWithdrew - $totalAmounted).".00";
    }
    
    else if (isset($amountStart) && !empty($amountStart) && isset($amountEnd) && !empty($amountEnd))
    {
        echo "<h2>INVESTMENTS REPORT - by amount</h2>";
        foreach ($db->query("SELECT * FROM login AS log, investment AS inv, amount AS amo WHERE amo.amountinvested >='$amountStart' and amo.amountinvested <= '$amountEnd' and log.loginid = amo.loginid and inv.investmentid = amo.investmentid") as $row)
        
        {
            echo "Username: ".$row['username']."<br>";
            echo "Email: ".$row['email']."<br>";
            echo "Investment: ".$row['name']."<br>";
            echo "Amount: "."U$ ".$row['amountinvested'].".00, date: ".$row[dateinvested]."<br>";
            echo "Withdrew : "."U$ ".$row['amountwithdrew'].".00, date: ".$row['datewithdrew']."<br>";
            echo "<hr>";
            $totalAmounted += $row['amountinvested'];
            $totalWithdrew += $row['amountwithdrew'];
        }
        echo "<b>TOTAL AMOUNTED = U$ ". $totalAmounted.".00<br>";
        echo "<b>TOTAL INTERESTED = U$ ". ($totalWithdrew - $totalAmounted).".00";
    }
    
    else if (isset($report) && !empty($report))
    {
        echo "<h2>INVESTMENTS REPORT - complete</h2>";
        foreach ($db->query("SELECT * FROM login AS log, investment AS inv, amount AS amo WHERE log.loginid = amo.loginid and inv.investmentid = amo.investmentid") as $row)
        
        {
            echo "Username: ".$row['username']."<br>";
            echo "Email: ".$row['email']."<br>";
            echo "Investment: ".$row['name']."<br>";
            echo "Amount: "."U$ ".$row['amountinvested'].".00, date: ".$row[dateinvested]."<br>";
            echo "Withdrew : "."U$ ".$row['amountwithdrew'].".00, date: ".$row['datewithdrew']."<br>";
            echo "<hr>";
            $totalAmounted += $row['amountinvested'];
            $totalWithdrew += $row['amountwithdrew'];
        }
        echo "<b>TOTAL AMOUNTED = U$ ". $totalAmounted.".00<br>";
        echo "<b>TOTAL INTERESTED = U$ ". ($totalWithdrew - $totalAmounted).".00";
    }
    else
    {   
        echo "<h2>INVESTMENTS REPORT - by amount</h2>";
        echo "<h3>Please, insert both data (Amount Start and Amount End)</h3>";
    }
    
   
        
?>
        <br>
        <br>
        <h1><a href="index.php"><-- GO BACK</a></h1>
    </body>
</html>
