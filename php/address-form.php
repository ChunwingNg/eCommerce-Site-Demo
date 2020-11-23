<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once('database-connection.php');

    $addresses = $db->query("SELECT * FROM address WHERE fk_address_user=$_SESSION[id]");
    $cards = $db->query("SELECT * FROM card WHERE fk_card_user=$_SESSION[id]");
    $orders = $db->query("SELECT * FROM orders WHERE fk_orders_user=$_SESSION[id]");

    if($_SESSION['error'] == 1)
    {
        ?>
        <script>
            alert("Error: Please make sure to fill in all address fields correctly");
        </script>
        <?php
        $_SESSION['error'] = 0;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Form</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/userPage.css">
</head>
<body>
    <form action="addr-add.php" method="post" id="adress-form">
        <!-- address-line1 input-->
        <label class="control-label">Address Line 1</label>
        <div class="controls">
            <input id="address-line1" name="address-line1" type="text" placeholder="Street Address">
            <p class="help-block"></p>
        </div>
        <!-- address-line2 input-->
        <label class="control-label">Address Line 2</label>
        <div class="controls">
            <input id="address-line2" name="address-line2" type="text" placeholder="Apt number, unit, building">
            <p class="help-block"></p>
        </div>
        <!-- city input-->
        <label class="control-label">City</label>
        <div class="controls">
            <input id="city" name="city" type="text" placeholder="City">
            <p class="help-block"></p>
        </div>
        <!-- region input-->
        <label class="control-label">State</label>
        <div class="controls">
            <input id="state" name="state" type="text" placeholder="GA">
            <p class="help-block"></p>
        </div>
        <!-- postal-code input-->
        <label class="control-label">Zip / Postal Code</label>
        <div class="controls">
            <input id="postal-code" name="postal-code" type="text" placeholder="zip or postal code">
            <p class="help-block"></p>
        </div>
        <div>
            <button type="submit" name="login-action" value="Login" class="btn btn1">Add Address</button>
        </div>
    </form>
</body>
</html>