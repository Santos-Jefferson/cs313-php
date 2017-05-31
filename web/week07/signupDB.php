<?php

require 'connection.php';

//print_r($_POST);

$username = $_POST[username];
$email = $_POST[email];
$passwordHash = password_hash($_POST[password], PASSWORD_DEFAULT);

if (!isset($email))
{
    foreach ($db->query("SELECT * FROM login WHERE username = '$username'") as $row)
    {
        if (password_verify($_POST[password], $row['password']))
        {
            session_start();
            $_SESSION['username'] = $row['username'];
            header('Location: ' . "index.php");
            die();
        }
        else
        {
            header('Location: ' . "signin.php");
            die();
        }
    }
}

foreach ($db->query("SELECT * FROM login WHERE username = '$username'") as $row);

if ($row)
{
    header('Location: ' . "signupError.php");
    die();
}
else
{
    //echo $username;
    $loginQuery = 'INSERT INTO login (username, password, email) VALUES (?,?,?)';

    $stmt = $db->prepare($loginQuery);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $passwordHash);
    $stmt->bindParam(3, $email);
    $stmt->execute();
    print_r($stmt->errorInfo());
    $loginid = $db->lastInsertId();

    header('Location: ' . "signin.php");
    //die();

}


?>
