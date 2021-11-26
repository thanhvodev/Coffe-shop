<?php
    // Connect database
    $serverName = 'localhost';
    $userName   = 'root';
    $password   = '';
    $dbName     = 'sokoshop';

    $db = mysqli_connect($serverName, $userName, $password, $dbName); //client-server
    
    if (!$db) {
        die('Không thể kết nối: ' . mysqli_connect_error());
        exit();
    }
    mysqli_close($db);
?>