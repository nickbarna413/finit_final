<?php

    $server = "localhost";
    $login = "st431185";
    $pass = "ibzag7592!";
    $db_name = "st431185";
    

    $mysqli = mysqli_connect($server, $login, $pass, $db_name);
    if (!$mysqli) {
        die('Could not connect: ' . mysqli_error());
    } else {
        
    }
    

?>