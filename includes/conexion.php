<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'prueba';
    $conn = mysqli_connect($server, $user, $pass, $db);

    mysqli_query($conn, "SET NAMES 'utf8'");

    session_start();