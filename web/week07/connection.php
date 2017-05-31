<?php
// default Heroku Postgres configuration URL
    $dbUrl = "postgres://epbgybkktxmuag:286a12b4c8ad5f6eb4bef101d7dc268e2a09a3a38c6a53611fcbecb015f55faf@ec2-23-21-235-142.compute-1.amazonaws.com:5432/debsfpni9tdrkp";
    //print "<p>$dbUrl</p>\n\n";

    if (empty($dbUrl)) {
    /// example localhost configuration URL with postgres username and a database called cs313db
     $dbUrl = "postgres://postgres:aaml0509@localhost:5432/postgres";
    }

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    try {
     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
     print "<p>error: $ex->getMessage() </p>\n\n";
     die();
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
