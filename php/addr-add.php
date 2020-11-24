<?php
session_start();

if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] == 0){
    header("Location: login.php");
    exit;
}

require_once('database-connection.php');


    $street = filter_input(INPUT_POST, 'address-line1');
    $unit = filter_input(INPUT_POST, 'address-line2');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'postal-code');
    $userId = $_SESSION['id'];

    if ($unit == null) 
    {
        $unit = "";
    }

    //Queries the row the username is on
    $query = 'INSERT INTO address(line1, line2, city, state, zip, fk_address_user)VALUES(:street, :unit, :city, :state, :zip, :userId)';
    $statement = $db->prepare($query);
    $statement->bindValue(':street', $street);
    $statement->bindValue(':unit', $unit);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $statement->closeCursor();

    header("Location: userpage.php");
?>