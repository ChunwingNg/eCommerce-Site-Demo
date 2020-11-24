<?php
session_start();

if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] == 0){
    header("Location: login.php");
    exit;
}

require_once('database-connection.php');


    $newUser = filter_input(INPUT_POST, 'newUser');
    $newEmail = filter_input(INPUT_POST, 'newEmail');
    $passW = filter_input(INPUT_POST, 'passW');
    $userId = $_SESSION['id'];

    $query = 'SELECT id, userN, passW, email FROM user WHERE id = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();

    $login = $statement->fetch(PDO::FETCH_ASSOC);

    $validPassword = password_verify($passW, $login['passW']);

    if($validPassword)
    {
        if ($newUser == null) 
        {
            $query = 'UPDATE user SET email = :newEmail WHERE id = :userId';
            $statement = $db->prepare($query);
            $statement->bindValue(':newEmail', $newEmail);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $_SESSION['email'] = $newEmail;
        }
        else if($newEmail == null)
        {
            $query = 'UPDATE user SET userN = :newUser WHERE id = :userId';
            $statement = $db->prepare($query);
            $statement->bindValue(':newUser', $newUser);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $_SESSION['name'] = $newUser;
        }
        else{
            $query = 'UPDATE user SET userN = :newUser, email = :newEmail WHERE id = :userId';
            $statement = $db->prepare($query);
            $statement->bindValue(':newUser', $newUser);
            $statement->bindValue(':newEmail', $newEmail);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $_SESSION['email'] = $newEmail;
            $_SESSION['name'] = $newUser;
            }
        header("Location: userpage.php");
    }
?>