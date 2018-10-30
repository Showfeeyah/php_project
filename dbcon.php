<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name  = "php_project";
    // connection:
    $db = new mysqli($db_host, $db_user, $db_pass , $db_name);
    // tjek conenction:
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
    }

    // vi kører utf-8 på connection:
    $db->set_charset("utf-8");
?>