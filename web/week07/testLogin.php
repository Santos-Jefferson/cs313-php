<?php

    if ($_POST[username] == "jeff" and $_POST[password] == "jeff1234")
    {
        header("Location:index.php?username=$_POST[username]");
    }
    else if ($_POST[username] == "dyuli" and $_POST[password] == "dyuli1234")
    {
        header("Location:index.php?username=$_POST[username]");
    }
    else
    {
        header("Location:login.php");
    }

?>