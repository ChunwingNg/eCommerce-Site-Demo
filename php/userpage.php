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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" type="text/css" href="../css/userpage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<h1>Account Overview</h1>

<div>
    <h3>Contact Information</h3>
    <p>Username: <?php echo $_SESSION['name']; ?></p>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <br>
    <a href="">Edit</a>
    <br>
    <a href="">Change Password</a>
</div>

<div>
    <form action="addr-add.php" method="post" id="userpage">
        <!-- Address form -->
            <h2>Address</h2>
            <!-- address input-->
            <label class="control-label">Street Address</label>
            <div class="controls">
                <input id="address-line" name="address-line" type="text" placeholder="Address line"
                class="input-xlarge">
                <p class="help-block"></p>
            </div>
            <!-- city input-->
            <label class="control-label">City</label>
            <div class="controls">
                <input id="city" name="city" type="text" placeholder="City" class="input-xlarge">
                <p class="help-block"></p>
            </div>
            <!-- state input-->
            <label class="control-label">State</label>
            <div class="controls">
                    <input id="state" name="state" type="text" placeholder="State"
                    class="input-xlarge">
                    <p class="help-block"></p>
            </div>
            <!-- postal-code input-->
                <label class="control-label">Zip / Postal Code</label>
                <div class="controls">
                    <input id="postal-code" name="postal-code" type="text" placeholder="Zip"
                    class="input-xlarge">
                    <p class="help-block"></p>
            </div>
            <input type="submit" name="addr-add" value="Add New Address"></button>
        <br>
    </form>

    <h3>Address Book</h3>
    
    <?php foreach ($addresses as $address):?>
    <div>
        <p><?php echo $address['name'];?></p>
        <p><?php echo $address['line1'];?></p>
        <p><?php echo $address['line2'];?></p>
        <p><?php echo $address['city'];?>, <?php echo $address['state'];?> <?php echo $address['zip'];?></p>
        <p><?php echo $address['phone'];?></p>
        <form action="addr-delete.php" method="post">
            <input type="hidden" name="addr_id" value=<?php echo $address['id'];?>>
            <input type="submit" value="Delete Address">
        </form>
    </div>
    <?php endforeach;?>
</div>

<div>
    <h3>Payment Information</h3>

    <?php foreach ($cards as $card):?>
        <p>**** **** **** <?php echo substr ($card['number'], -4);?></p>
        <form action="del_card.php" method="post">
            <input type="hidden" name="card_id" value=<?php echo $card['id'];?>>
            <input type="submit" value="Delete Card">
        </form>
    <?php endforeach;?>

    <a href="">Add New Card</a>
</div>
    </body>
</html>