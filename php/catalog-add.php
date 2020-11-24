<?php

    require_once('database-connection.php');

    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $desc = $_POST['desc'];
    $link = $_POST['img_link'];


    //Queries the row the username is on
    $db->exec("INSERT INTO catalog_item(`name`,price,quantity,`desc`,image_link) VALUES($name, $price $quantity, $desc, $link)");
?>