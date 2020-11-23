<?php
session_start();
require_once('database-connection.php');

$address = filter_input(INPUT_POST, 'addr_id', FILTER_VALIDATE_INT);

if($address != false){
    $query = 'DELETE FROM address WHERE id = :address';
    $statement = $db->prepare($query);
    $statement->bindValue(':address', $address);
    $success= $statement->execute();
    $statement->closeCursor();
}

header("Location: userpage.php");
?>