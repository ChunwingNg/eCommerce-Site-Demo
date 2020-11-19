<?php

if(isset($_POST['registration-action']))
{
    $user = filter_input(INPUT_POST, 'user');
    $pass = filter_input(INPUT_POST, 'pass');
    $confirmPass = filter_input(INPUT_POST, 'confirmPass');
    $email = filter_input(INPUT_POST, 'email');


    if ($user == null || $pass == null || $confirmPass == null || $email == null) 
    {
        $error = "Invalid registration data, please try again.";
        ?>
        <p class="error">Invalid registration data. Check all fields and try again.<p>
        <?php
        include("registration.php");
    } 
    else 
    {
        require_once('database-connection.php');
        $query = 'SELECT COUNT(userN) AS num FROM user WHERE userN = :user';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->execute();
        $count = $statement->fetch(PDO::FETCH_ASSOC);

        if($count['num'] > 0){
            ?>
            <p class="error">Error: That username has already been taken.<p>
            <?php
            include("registration.php");
            die();
        }
        if($pass != $confirmPass){
            ?>
            <p class="error">Error: Passwords do not match.<p>
            <?php
            include("registration.php");
            die();
        }
        //Hash the password
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT);

        //Store the new user in the database
        $query = 'INSERT INTO user(userN, passW, email)VALUES(:user, :pass, :email)';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':pass', $passwordHash);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();
        include('login.php');
    }
}
?>