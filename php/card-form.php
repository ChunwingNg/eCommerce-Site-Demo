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

    if($_SESSION['error'] == 1)
    {
        ?>
        <script>
            alert("Error: Please make sure to fill in all card information fields correctly");
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
    <title>Card Form</title>
    <link rel="stylesheet" type="text/css" href="../css/for.css">
</head>
    
<body>
    <form action="card-add.php" method="post" id="adress-form">
        <!--name on card input-->
        <label class="control-label">Full Name</label>
        <div class="controls">
            <input id="name" name="name" type="text" placeholder="John A. Smith">
            <p class="help-block"></p>
        </div>
        <!-- card number input-->
        <label class="control-label">Card Number</label>
        <div class="controls">
            <input id="number" name="number" type="text" placeholder="XXXX-XXXX-XXXX-XXXX">
            <p class="help-block"></p>
        </div>
        <!-- card cvv input-->
        <label class="control-label">CVV</label>
        <div class="controls">
            <input id="cvv" name="cvv" type="text" placeholder="123">
            <p class="help-block"></p>
        </div>
        <!-- expiration date input-->
        <label class="control-label">Expiration Date</label>
        <div class="controls">
            <input id="expiration" name="expiration" type="text" placeholder="12/24">
            <p class="help-block"></p>
        </div>
        <div>
            <button type="submit" name="card-add" value="Login" class="btn btn1">Add Card</button>
        </div>
    </form>
</body>
</html>