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
    <title>Add Address</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <script src="../js/address.js"></script>
</head>

<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Add Address</h1></header>
<main>
    <form action="addr-add.php" method="post" id="adress-form">
        <!-- address-line1 input-->
        <div class="field">
            <input id="address-line1" name="address-line1" type="text" placeholder="Street Address" required>
            <div class="error" id="side1"></div>
        </div>
        <br>
        <!-- address-line2 input-->
        <div class="field">
            <input id="address-line2" name="address-line2" type="text" placeholder="Apt number, unit, building">
        </div>
        <br>
        <!-- city input-->
        <div class="field">
            <input id="city" name="city" type="text" placeholder="City" required>
            <div class="error" id="side2"></div>
        </div>
        <br>
        <!-- region input-->
        <div class="field">
            <input id="state" name="state" type="text" placeholder="GA" required maxlength="2">
            <div class="error" id="side3"></div>
        </div>
        <br>
        <!-- postal-code input-->
        <div class="field">
            <input id="postal-code" name="postal-code" type="text" placeholder="Zip or postal code" required maxlength="5" minlength="5">
            <div class="error" id="side4"></div>
        </div>
        <br>
        <div class="field">
            <button id="submit" type="submit" name="login-action" value="Address" class="submit_b" disabled>Add Address</button>
        </div>
    </form>
</main>
</body>
</html>