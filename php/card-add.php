<?php
session_start();
require_once('database-connection.php');


    $cardName = filter_input(INPUT_POST, 'name');
    $number = filter_input(INPUT_POST, 'number');
    $exp = filter_input(INPUT_POST, 'expiration');
    $userId = $_SESSION['id'];

    if ($cardName == null || $number == null || $number $exp == null) 
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
    $query = 'INSERT INTO card(line1, line2, city, state, zip, fk_address_user)VALUES(:street, :unit, :city, :state, :zip, :userId)';
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
    }
?>