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
    }
?>