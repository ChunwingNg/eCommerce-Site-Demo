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


    $cart_items = $_SESSION['cart_items'];
    $items = $_SESSION['cart-list'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>check out</title>
</head>

<?php require_once('base.php');?>

<body>
<div class="spacer">.</div>
<main>
    <form action="create-order.php" method="post" id="make_order" class="center-checkout">
        <fieldset>
            <legend><h2>Customer info</h2></legend>
            <!-- part 1 -->
            <label for="first_name" class = "blue-colorizer">First Name:</label>
            <input type="text" name="first_name" placeholder="First Name" required>
            <br>
            <label for="last_name" class = "blue-colorizer">Last Name:</label>
            <input type="text" name="last_name" placeholder="Last Name">
            <br>

            <!-- part 2 address include: street, city, state, zip-->
            <label for="ship_address" class="blue-colorizer">Shipping Address:</label>
            <br>

            <label for="stored-addr"class="blue-colorizer">Saved Address: </label>
            <select name="address_id">
            <?php foreach ($addresses as $address):?>
                <option value=<?php echo $address['id'];?>>
                    <p><?php echo $address['line1'];?></p>
                    <p><?php echo $address['city'];?>, <?php echo $address['state'];?> <?php echo $address['zip'];?></p>
                </option>
            <?php endforeach;?>
            </select>
            <br>
            <a href="address-form.php" class ="link-colors">Add New Address</a>
        </fieldset>
        <br>

        <fieldset>
            <!-- part 3, credit or debit info -->
            <legend class = "blue-colorizer">Payment</legend>
            <!-- choice of credit or debit -->

            <select name="card">
            <?php foreach ($cards as $card):?>
                <option value=<?php echo $card['id'];?>>
                    <p>**** **** **** <?php echo substr ($card['number'], -4);?></p> 
                </option>
            <?php endforeach;?>
            </select>
            <br>
            <a href="card-form.php" class ="link-colors">Add New Card</a>
            
        </fieldset>
        <br>

        <?php foreach ($items as $item): ?>
            <input type="hidden" name="quantity-<?=$item['id']?>" value="<?=$cart_items[$item['id']]?>">
        <?php endforeach; ?>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>

    </form>

</main>
<?=template_footer()?>
</body>
</html>