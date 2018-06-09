<?php

    $dbHost = 'localhost';
    $dbName = 'cursophp';
    $dbUser = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    } catch(Exception $e) {
        echo $e->getMessage();
    }

?>