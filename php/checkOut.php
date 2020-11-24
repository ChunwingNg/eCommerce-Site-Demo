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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>check out</title>
    <link rel="stylesheet" type="text/css" href="../css/checkOut.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<header>
    <img src="../img/background.jpg" alt="galaxy">
    <a href="#" id="title">Apollo 42 Express</a>
</header>
<main>
    <form action="create-order.php" method="post" id="make_order">
        <fieldset>
            <legend>Customer info</legend>
            <!-- part 1 -->
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" placeholder="First Name">
            <br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" placeholder="Last Name">
            <br>

            <!-- part 2 address include: street, city, state, zip-->
            <label for="ship_address">Shipping Address:</label>
            <br>

            <label for="stored-addr">Saved Address: </label>
            <select name="address_id">
            <?php foreach ($addresses as $address):?>
                <option value=<?php echo $address['id'];?>>
                    <p><?php echo $address['line1'];?></p>
                    <p><?php echo $address['city'];?>, <?php echo $address['state'];?> <?php echo $address['zip'];?></p>
                </option>
            <?php endforeach;?>
            </select>
            <br>
            <a href="address-form.php">Add New Address</a>
        </fieldset>
        <br>

        <fieldset>
            <!-- part 3, credit or debit info -->
            <legend>Payment</legend>
            <!-- choice of credit or debit -->

            <select name="card">
            <?php foreach ($cards as $card):?>
                <option value=<?php echo $card['id'];?>>
                    <p>**** **** **** <?php echo substr ($card['number'], -4);?></p> 
                </option>
            <?php endforeach;?>
            
        </fieldset>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>

    </form>

</main>


<footer>

</footer>
</body>
</html>