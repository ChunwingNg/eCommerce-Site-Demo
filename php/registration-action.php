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
        <script>
            alert("Error: Please make sure to fill in all registration data.")
        </script>
        <?php

        header("Location: registration.php");
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
            <script>
                alert("Unfortunately that username has already been taken.")
            </script>
            <?php
            header("Location: registration.php");
            die();
        }
        if($pass != $confirmPass){
            ?>
            <script>
                alert("Error: Passwords must match.")
            </script>
            <?php
            header("Location: registration.php");
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
        header("Location: login.php");
    }
}
?>