<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <h2>INVESTMENTS REPORT</h2>
        <h3>1 - Select below the investor to generate the report</h3>
        <ul>
            <li><a href="investorReport.php?login=jeff">Jefferson Santos</a></li>
            <li><a href="investorReport.php?login=dyuli">Dyuliane Fialla</a></li>
        </ul>
        <hr>
        
        <h3>2 - Select below the investment to generate the report</h3>
        <ul>
            <li><a href="investorReport.php?investment=LFT">LFT</a></li>
            <li><a href="investorReport.php?investment=NTN">NTN</a></li>
            <li><a href="investorReport.php?investment=CDB">CDB</a></li>
        </ul>
        <hr>
        
        <h3>3 - Please, fill out the range of amount invested to generate the
            report</h3>
        <form action="investorReport.php" method="POST">
            Amount Invested U$ (start:)<br><input type="text" name="amountStart">(e.g: 1000)
            <br>
            <br>
            Amount Invested U$ (end:)<br><input type="text" name="amountEnd">(e.g: 2000)
            <br>
            <br>
            <input type="submit" name="submit" value="Report">
        </form>
        <hr>
        
        <h3>4 - If you want a complet report, please click below</h3>
        <ul>
            <li><a href="investorReport.php?report=complete">Complete Report</a></li>
        </ul>
        <hr>
    </body>
</html>


