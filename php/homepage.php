<?php
    session_start();
    require_once('database-connection.php');

    $addresses = $db->query("SELECT * FROM address WHERE fk_address_user=$_SESSION[id]");
    $cards = $db->query("SELECT * FROM card WHERE fk_card_user=$_SESSION[id]");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../html/style.css">
    <title>login</title>
</head>

<body>

    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Cataloug</a></li>
        <li><a href="userpage.php">User Info</a></li>
        <li><a href="">About</a></li>
    </ul>

    <a href="#">
        <h2>Apollo 42 Express</h1>
    </a>
    <!---<img src="rocket-ship.png" alt="rocketship" class="rocket-position">--->

    <div class="space stars1"></div>
    <div class="space stars2"></div>
    <div class="space stars3"></div>

</body>

</html>