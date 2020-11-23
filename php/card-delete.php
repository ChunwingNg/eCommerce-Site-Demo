<?php
session_start();
require_once('database-connection.php');

$card = filter_input(INPUT_POST, 'card_id', FILTER_VALIDATE_INT);

if($address != false){
    $query = 'DELETE FROM card WHERE id = :card';
    $statement = $db->prepare($query);
    $statement->bindValue(':card', $card);
    $success= $statement->execute();
    $statement->closeCursor();
}

header('Location: userpage.php');
?>