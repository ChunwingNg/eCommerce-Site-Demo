<?php
session_start();

if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] == 0){
    header("Location: login.php");
    exit;
}

require_once('database-connection.php');


    $cardName = filter_input(INPUT_POST, 'name');
    $number = filter_input(INPUT_POST, 'number');
    $cvv = filter_input(INPUT_POST, 'cvv');
    $exp = filter_input(INPUT_POST, 'expiration');
    $userId = $_SESSION['id'];

    if ($cardName == null || $number == null || $exp == null || $cvv == null) 
    {
        $error = "Invalid address data. Try again.";

        ?>
        <script>
           alert("Error: Please make sure to fill in address fields correctly");
        </script>
        <?php
        $_SESSION['error'] = 1;
        header("Location: card-form.php");
    } 
    else
    {

    str_replace('-', '', $number);
    str_replace('/', '', $exp);
    $expM = substr($exp, 0, 2);
    $expY = substr($exp, 2);
    $expM = intval($expM);
    $expY = intval($expY);


    //Queries the row the username is on
    $query = 'INSERT INTO card(cvv, expMonth, expYear, name, number, fk_card_user)VALUES(:cvv, :expMonth, :expYear, :name, :number, :userId)';
    $statement = $db->prepare($query);
    $statement->bindValue(':cvv', $cvv);
    $statement->bindValue(':expMonth', $expM);
    $statement->bindValue(':expYear', $expY);
    $statement->bindValue(':name', $cardName);
    $statement->bindValue(':number', $number);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $statement->closeCursor();

    header("Location: userpage.php");
    }
?>