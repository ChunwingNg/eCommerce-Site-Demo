<?php

    $dsn = 'mysql:host = localhost; dbname=ecommerce';
    $username = 'root';
    $password = '';

    try
    {
        $db = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e)
    {
        $error = $e->getMessage();
        include('database-error.php');
        exit();
    }
?>   