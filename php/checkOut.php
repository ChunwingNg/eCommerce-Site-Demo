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
    <!-- <link rel="stylesheet" type="text/css" href="../css/form.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>check out</title>
</head>

<?php require_once('base.php');?>

<body>
<div class="spacer">.</div>
<!-- <div class="spacer">.</div> -->
<main>
    <form action="create-order.php" method="post" id="make_order" class="center-checkout">
        <!-- <fieldset> -->
        <!-- <legend><h1>Customer info</h1></legend> -->
        <div class="field_checkout">
        <h2>Customer info</h2>
            <!-- part 1 -->
            <label for="first_name" class = "blue-colorizer">First Name:</label>
            <input type="text" name="first_name" placeholder="    First Name"  required>
            
            <br>
            <br>
            <label for="last_name" class = "blue-colorizer">Last Name:</label>
            <input type="text" name="last_name" placeholder="    Last Name">
        </div>
            <br>
        <!-- </fieldset> -->

        <!-- <fieldset> -->
        <div class="field_checkout">
            <!-- part 2 address include: street, city, state, zip-->
            <label for="ship_address" class="blue-colorizer"><h2>Shipping Address</h2></label>


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
            <br>
            <br>
            <a href="address-form.php" class ="checkout_add">Add New Address</a>
        </div>
        <!-- </fieldset> -->
        <br>
        

        <!-- <fieldset> -->
            <div class="field_checkout">
            <!-- part 3, credit or debit info -->
            <!-- <legend class = "blue-colorizer"><h1>Payment<h1></legend> -->
            <!-- choice of credit or debit -->
        
            <h2>Payment</h2>
            <select name="card">
            <?php foreach ($cards as $card):?>
                <option value=<?php echo $card['id'];?>>
                    <p>**** **** **** <?php echo substr ($card['number'], -4);?></p> 
                </option>
            <?php endforeach;?>
            </select>
            <br>
            <br>
            <br>
            <a href="card-form.php" class ="checkout_add">Add New Card</a>
        
        <br>

    


        <?php foreach ($items as $item): ?>
            <input type="hidden" name="quantity-<?=$item['id']?>" value="<?=$cart_items[$item['id']]?>">
        <?php endforeach; ?>

</div>
<br>

<!-- </fieldset> -->

        <div class="field_checkout">
        <button type="submit" >Submit</button>
        <button type="reset" >Reset</button>
    </div>
    </form>

</main>
<?=template_footer()?>
</body>
</html>