<?php

    //Variable came from HTML form by POST
    $name = $_POST[name];
    $email = $_POST[email];
    $major = $_POST[major];
    $comments = $_POST[comments];

    //print_r($_POST['continents']);

    //Printing on the screen the text and the variables contents
    echo "<h1> PHP Form Handle - 03 Teach : Team Activity</h1>";
    echo "<hr>";
    echo "<b>Student Name:</b> $name";
    echo "<br><br>";
    echo "<b>Student Email:</b> <a href='mailto:$email'>$email</a>";
    echo "<br><br>";
    echo "<b>Student Major:</b> $major";
    echo "<br><br>";
    echo "<b>Student Comments:</b> $comments";
    echo "<br><br>";
    echo "<b>Student Trips:</b><br> ";
    if(isset($_POST['continents']))
    {
        foreach($_POST['continents'] as $continents)
        {
            echo "- ";
            echo $continents;
            echo "<br>";
        }
    }

?>