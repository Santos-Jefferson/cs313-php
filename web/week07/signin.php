<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>07 Team</title>
    </head>
    <body>
        <div>
            <a href="signup.php"><img src="byui-logo.png" alt="byui logo"></a>
        </div>
        <div>
            <h1>PROJECT TITLE: Personal Investments</h1>
            <h2>SIGN-IN: Enter with your username and password</h2>
        </div>
        <div class="container">
            <form action="signupDB.php" method="POST">
                <label>Username:</label><br>
                <input type="text" name="username"><br />
                <label>Password:</label><br>
                <input type="password" name="password"><br />
                <input type="submit" id="btnSignin" name="submit" value="SIGN-IN">
                <input type="button" id="btnSignup" onclick="location.href='signup.php';" value="SIGN-UP" />
            </form>
        </div>
            
        <hr>

<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    </body>
</html>
