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
</head>

<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Add Address</h1></header>
<main>
    <form action="addr-add.php" method="post" id="adress-form">
        <!-- address-line1 input-->
        <label class="control-label">Address Line 1</label>
        <div class="field">
            <input id="address-line1" name="address-line1" type="text" placeholder="Street Address" required>
            <p class="help-block"></p>
        </div>
        <!-- address-line2 input-->
        <label class="control-label">Address Line 2</label>
        <div class="field">
            <input id="address-line2" name="address-line2" type="text" placeholder="Apt number, unit, building">
            <p class="help-block"></p>
        </div>
        <!-- city input-->
        <label class="control-label">City</label>
        <div class="field">
            <input id="city" name="city" type="text" placeholder="City" required>
            <p class="help-block"></p>
        </div>
        <!-- region input-->
        <label class="control-label">State</label>
        <div class="field">
            <input id="state" name="state" type="text" placeholder="GA" required maxlength="2">
            <p class="help-block"></p>
        </div>
        <!-- postal-code input-->
        <label class="control-label">Zip / Postal Code</label>
        <div class="field">
            <input id="postal-code" name="postal-code" type="text" placeholder="Zip or postal code" required maxlength="5" minlength="5">
            <p class="help-block"></p>
        </div>
        <div class="field">
            <button type="submit" name="login-action" value="Address" class="submit_b">Add Address</button>
        </div>
    </form>
</main>
</body>
</html>