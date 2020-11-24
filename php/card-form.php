<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] == 0){
        header("Location: login.php");
        exit;
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
    <script src="../js/validation.js"></script>
</head>
    
<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Add Card Information</h1></header>
    <form action="card-add.php" method="post" id="card-form">
        <!--name on card input-->
        <label class="control-label">Full Name</label>
        <div class="field">
            <input id="name" name="name" type="text" placeholder="John A. Smith" required>
            <p class="help-block"></p>
        </div>
        <!-- card number input-->
        <label class="control-label">Card Number</label>
        <div class="field">
            <input id="number" name="number" type="text" placeholder="XXXX-XXXX-XXXX-XXXX" required>
            <p class="help-block"></p>
        </div>
        <!-- card cvv input-->
        <label class="control-label">CVV</label>
        <div class="field">
            <input id="cvv" name="cvv" type="text" placeholder="123" required minlength="3" maxlength="3">
            <span class="error" aria-live="polite"></span>
        </div>
        <!-- expiration date input-->
        <label class="control-label">Expiration Date</label>
        <div class="field">
            <input id="expiration" name="expiration" type="text" placeholder="12/24" required>
            <p class="help-block"></p>
        </div>
        <div class="field">
            <button type="submit" name="card-add" value="Login" class="submit_b" >Add Card</button>
        </div>
    </form>
</body>
</html>