<?php
session_start();
require_once('database-connection.php');

$cardId = filter_input(INPUT_POST, 'card_id', FILTER_VALIDATE_INT);

if($cardId != false){
    $query = 'DELETE FROM card WHERE id = :cardId';
    $statement = $db->prepare($query);
    $statement->bindValue(':cardId', $cardId);
    $success= $statement->execute();
    $statement->closeCursor();
}

header('Location: userpage.php');
?>