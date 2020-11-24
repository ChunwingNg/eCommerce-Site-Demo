<?php
session_start();
require_once('database-connection.php');

if(isset($_POST['password-change']))
{
    $current = filter_input(INPUT_POST, 'current');
    $newPass = filter_input(INPUT_POST, 'newPass');
    $newPassConfirm = filter_input(INPUT_POST, 'newPassConfirm');
    $userId = $_SESSION['id'];


    if ($current == null || $newPass == null || $newPassConfirm == null) 
    {
        $error = "Double check you have the right password.";

        ?>
        <script>
            alert("Error: Please make sure to fill in all registration data.")
        </script>
        <?php

        header("Location: change-password-form.php");
    } 
    else 
    {
        $query = 'SELECT id, userN, passW, email FROM user WHERE id = :userId';
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();

        $login = $statement->fetch(PDO::FETCH_ASSOC);

        $validPassword = password_verify($current, $login['passW']);

        if($validPassword){
            if($newPass != $newPassConfirm){
                ?>
                <script>
                    alert("Error: Passwords must match.")
                </script>
                <?php
                header("Location: change-password-form.php");
                die();
            }
            //Hash the password
            $passwordHash = password_hash($newPass, PASSWORD_DEFAULT);

            //Store the new user in the database
            $query = 'UPDATE user SET passW = :pass WHERE id = :userId';
            $statement = $db->prepare($query);
            $statement->bindValue(':pass', $passwordHash);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $statement->closeCursor();
            header("Location: userpage.php");
        }
        else
        {
            $error = "Double check you have the right password.";

            ?>
            <script>
                alert("Error: Please make sure to fill in all registration data.")
            </script>
            <?php
    
            header("Location: change-password-form.php");
        }
    }
}
?>