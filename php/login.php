<?php
    require_once('database-connection.php');

    //$addresses = $db->query("SELECT * FROM address WHERE fk_address_user=$_SESSION[id]");
    //$cards = $db->query("SELECT * FROM card WHERE fk_card_user=$_SESSION[id]");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div class="content">
<header><h1>Login</h1></header>
<main>
    <form action="login-action.php" method="post" id="login">
        <div class="field">
            <span class="fas fa-user"></span>
        <input type="text" name="userNm" placeholder="Username" required>
<!--        <label>Username</label>-->
        </div>
        <div class="field">
            <span class="fas fa-lock"></span>
        <input type="password" name="passWd" placeholder="Password">
<!--        <label>Password</label>-->
        </div>
        <div class="field">
        <button type="submit" name="login-action" value="Login" class="btn btn1">Login</button>
        </div>
    </form>
<br>
    <div class="signup">Not a member? <a href="registration.php">Signup now</a></div>

</main>
</div>
</body>
</html>