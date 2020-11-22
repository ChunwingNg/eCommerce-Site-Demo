<?php
session_start();

if(isset($_POST['login-action']))
{
    $userNm = filter_input(INPUT_POST, 'userNm');
    $passWd = filter_input(INPUT_POST, 'passWd');

    //Queries the row the username is on
    require_once('database-connection.php');
    $query = 'SELECT id, userN, passW, email FROM user WHERE userN = :userNm';
    $statement = $db->prepare($query);
    $statement->bindValue(':userNm', $userNm);
    $statement->execute();

    //Gets the row of the username
    $login = $statement->fetch(PDO::FETCH_ASSOC);
    //printf("%s (%s)\n", $login['userN'], $login['passW']);

    if($login === false){
        ?>
        <script>
            alert("Invalid username/password combination.\nPlease try again.")
        </script>
        <?php

        include("login.php");
    }
    else{
        //Verify the hashed password
        $validPassword = password_verify($passWd, $login['passW']);

        if($validPassword){
            $_SESSION['isLogged'] = 1;
            $_SESSION['id'] = $login['id'];
            $_SESSION['email'] = $login['email'];
            $_SESSION['name'] = $login['userN'];
            include("userpage.php");
        }
        else{
            ?>
            <script>
                alert("Invalid username/password combination.\nPlease try again.")
            </script>
            <?php
            include("login.php");
        }
    }
}
?>