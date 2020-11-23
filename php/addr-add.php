<?php
session_start();
require_once('database-connection.php');


    $street = filter_input(INPUT_POST, 'address-line');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'postal-code');
    $userId = $_SESSION['id'];

    if ($street == null || $city == null || $state == null || $zip == null || $userId == null) 
    {
        $error = "Invalid address data. Try again.";

        ?>
        <script>
            alert("Error: Please make sure to fill in address fields correctly")
        </script>
        <?php

        header("Location: userpage.php");
    } 
    else
    {

    //Queries the row the username is on
    $query = 'INSERT INTO address(line1, city, state, zip, fk_address_user)VALUES(:street, :city, :state, :zip, :userId)';
    $statement = $db->prepare($query);
    $statement->bindValue(':street', $street);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $statement->closeCursor();

    header("Location: userpage.php");
    }
?>