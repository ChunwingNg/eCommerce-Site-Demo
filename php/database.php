<?php
    $dsn = 'mysql:host=localhost; dbname=ecommerce';
    $username = 'root';
    $password = 'ZZ6156350ff!';

try {
    $db = new PDO($dsn, $username, $password);
}catch (PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}
?>