<?php

    require_once('database-connection.php');


    $name = filter_input(INPUT_POST, 'address-line1');
    $price = filter_input(INPUT_POST, 'address-line2');
    $quantity = filter_input(INPUT_POST, 'city');
    $desc = filter_input(INPUT_POST, 'state');
    $link = filter_input(INPUT_POST, 'postal-code');

    if ($street == null || $unit == null || $city == null || $state == null || $zip == null || $userId == null) 
    {
        $error = "Invalid address data. Try again.";

        ?>
        <script>
           alert("Error: Please make sure to fill in address fields correctly");
        </script>
        <?php
        $_SESSION['error'] = 1;
        header("Location: address-form.php");
    } 
    else
    {

    //Queries the row the username is on
    $db->exec("INSERT INTO catalog_item(`name`,price,quantity,`desc`,image_link) VALUES($name, $price $quantity, $desc, $link)";

    header("Location: catalog-form.php");
    }
?>