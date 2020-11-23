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
    <title>Welcome!</title>
</head>

<body>

    
    <div class="space stars1"></div>
    <div class="space stars2"></div>
    <div class="space stars3"></div>

    <div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="catalog.php">Catalog</a></li>
            <li><a href="userpage.php">User Info</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>

    <a href="#">
        <h2>Apollo 42 Express</h1>
    </a>
    <div class="container">
        <a href="#" class="btn effect01" target="_blank"><span>Blast Off!</span></a>
    </div>
    <!---<img src="rocket-ship.png" alt="rocketship" class="rocket-position">--->

    <!-- <a href="#"> <button class="btn">click me to enter site</button> </a> -->    

</body>

</html>