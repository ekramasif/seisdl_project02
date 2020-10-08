<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "seisdlmain";

    $conn = mysqli_connect($hostname, $username, $password, $db);

    if(!$conn)
    {
        die(" connection failed: " . mysqli_connection_error());
    }
    //echo "connection successful";
?>