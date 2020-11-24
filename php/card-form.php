<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] == 0){
        header("Location: login.php");
        exit;
    }
    if(!isset($_SESSION['error']) || $_SESSION['error'] == 1)
    {
        ?>
        <script>
           alert("Error: Please make sure to fill a valid card number / CVV / Expiration date");
        </script>
        <?php
        $_SESSION['error'] = 0;
    }

    require_once('database-connection.php');

    $addresses = $db->query("SELECT * FROM address WHERE fk_address_user=$_SESSION[id]");
    $cards = $db->query("SELECT * FROM card WHERE fk_card_user=$_SESSION[id]");
    $orders = $db->query("SELECT * FROM orders WHERE fk_orders_user=$_SESSION[id]");

    include('base.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Card</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/card.js"></script>
</head>
    
<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Add Card Information</h1></header>
    <form action="card-add.php" method="post" id="card-form">
        <!--name on card input-->
        <div class="field">
            <input id="name" name="name" type="text" placeholder="Full Name" required>
            <div class="error" id="side1"></div>
        </div>
        <br>
        <!-- card number input-->
        <div class="field">
            <input id="number" name="number" type="text" placeholder="Card Number" required minlength="16" maxlength="16">
            <div class="error" id="side2"></div>
        </div>
        <br>
        <!-- card cvv input-->
        <div class="field">
            <input id="cvv" name="cvv" type="text" placeholder="CVV" required minlength="3" maxlength="4">
            <div class="error" id="side3"></div>
        </div>
        <br>
        <!-- expiration date input-->
        <div class="field">
            <input id="expiration" name="expiration" type="text" placeholder="Expiration date: 12/24" required minlength="5" maxlength="5">
            <div class="error" id="side4"></div>
        </div>
        <br>
        <div class="field">
            <button id="submit" type="submit" name="card-add" value="Login" class="submit_b" disabled>Add Card</button>
        </div>
    </form>
</body>
</html>