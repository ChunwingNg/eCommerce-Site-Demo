<?php
    session_start();
    require_once('database-connection.php');

    $addresses = $db->query("SELECT * FROM address WHERE fk_address_user=$_SESSION[id]");

    $cards = $db->query("SELECT * FROM card WHERE fk_card_user=$_SESSION[id]");

?>

<h1>Account Overview</h1>

<div>
    <h3>Contact Information></h3>
    <p><?php $_SESSION['name']; ?></p>
    <p><?php $_SESSION['email']; ?></p>
    <br>
    <a href="">Edit</a>
    <a href="">Change Password</a>
</div>

<div>
    <h3>Address Book</h3>
    <?php foreach ($addresses as $address):?>
        <p><?php echo $address['name'];?></p>
        <p><?php echo $address['line1'];?></p>
        <p><?php echo $address['line2'];?></p>
        <p><?php echo $address['city'];?>, <?php echo $address['state'];?> <?php echo $address['zip'];?></p>
        <p><?php echo $address['phone'];?></p>
        <form action="del_addr.php" method="post">
            <input type="hidden" name="addr_id" value=<?php echo $address['id'];?>>
            <input type="submit" value="Delete Address">
        </form>
    <?php endforeach;?>

    <a href="">Add New Address</a>
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