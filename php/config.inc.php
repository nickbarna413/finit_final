<?php

    $server = "sulley.cah.ucf.edu";
    $login = "el663147";
    $pass = "root";
    $db_name = "el663147";
    

    $mysqli = mysqli_connect($server, $login, $pass, $db_name);
    if (!$mysqli) {
        die('Could not connect: ' . mysqli_error());
    }
    
?>