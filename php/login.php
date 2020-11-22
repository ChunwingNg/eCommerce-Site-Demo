<?php
    require_once('database-connection.php');

    //$addresses = $db->query("SELECT * FROM address WHERE fk_address_user=$_SESSION[id]");
    //$cards = $db->query("SELECT * FROM card WHERE fk_card_user=$_SESSION[id]");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<header><h1>Login</h1></header>
<main>
    <form action="login-action.php" method="post" id="login">
        <label>Username:</label>
        <input type="text" name="userNm"><br>
        
        <label>Password:</label>
        <input type="password" name="passWd"><br>

        <input type="submit" name="login-action" value="Login"></button>
    </form>

    <p><a href="registration.php">Create an Account</a></p>

</main>
</body>
</html>