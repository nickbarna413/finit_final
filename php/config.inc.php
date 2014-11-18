<?php

    $server = "localhost";
    $login = "root";
    $pass = "";
    $db_name = "finit";
    

    $mysqli = mysqli_connect($server, $login, $pass, $db_name);
    if (!$mysqli) {
        die('Could not connect: ' . mysqli_error());
    }
    

?>