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
?>

<?php
    include('base.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
    
<body>

    <div class="spacer">.</div>
    <h1 class = "account-header">Account Overview</h1>

<!-- contact info -->
    <div class="left-c">
        <h2 class="blue-colorizer" >Contact Information</h2>
        <br>
        <br>
        <h2>Username: <?php echo $_SESSION['name']; ?></h2>
        <br>
        <br>
        <h2>Email: <?php echo $_SESSION['email']; ?></h2>
        <br>
        <br>
        <button type="button" class="submit_b2"><a href="user-edit-form.php">Edit Account Info</a></button>
        <br>
        <br>
        <button type="button" class="submit_b2"><a href="change-password-form.php">Change Password</a></button>
        <br>
    </div>


    <div class="right-c">
        <div class="center">
        <h3 class="blue-colorizer">Address Book</h3>
    
        <table class="center">
        <?php foreach ($addresses as $address):?>
        <tr>
        <td>
            <h4><?php echo $address['name'];?></h4>
            <h4><?php echo $address['line1'];?></h4>
            <h4><?php echo $address['line2'];?></h4>
            <h4><?php echo $address['city'];?>, <?php echo $address['state'];?> <?php echo $address['zip'];?></h4>
        </td>
        <td>
        <?php
            $exist = $db->query("SELECT * FROM orders WHERE fk_orders_address={$address['id']}");    
            if($exist->rowCount() == 0){
                echo
                "<form action='addr-delete.php' method='post'>
                <input type='hidden' name='addr_id' value='". $address['id']."'>
                <input type='submit' value='Delete Address'>
                </form>>>";
            }
            ?>
        </td>
        </tr>
        <?php endforeach;?>
        </table>
        <button type="button" class="submit_b2"><a href="address-form.php">Add New Address</a></button>
        </div>
        <!-- <a href="address-form.php" class="link-colors">Add New Address</a> -->
        <br>
        <div class="center">
            <h3 class="blue-colorizer">Payment Information</h3>
            <table class="center">
            <?php foreach ($cards as $card):?>
                <tr>
                <td>
                <h4>**** **** **** <?php echo substr ($card['number'], -4);?></h4>
                </td>
                <td>
                <?php
                    $exist = $db->query("SELECT * FROM orders WHERE fk_orders_card={$card['id']}");    
                     if($exist->rowCount() == 0){
                        echo "<form action='card-delete.php' method='post'>
                            <input type='hidden' name='card_id' value='".$card['id']."'>
                            <input type='submit' value='Delete Card'>
                        </form>";
                     }?>
                </td>
            <?php endforeach;?>
            </table>
            <button type="button" class="submit_b2"><a href="card-form.php">Add New Card</a></button> 
            <!-- <a href="card-form.php" class="link-colors">Add New Card</a> -->
        </div>

        <div>
            <h3 class="blue-colorizer">Orders</h3>
            <table class="catalog_table">
                <tr>
                    <th><h4>Order ID</h4></th>
                    <th><h4>Amount</h4></th>
                </tr>
                <?php foreach ($orders as $order):?>
                    <tr>
                        <td><p class="blue-colorizer"><?php echo $order['id'];?></p></td>
                        <td><p class="blue-colorizer">$<?php echo $order['ordertotal'];?></p></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
    </body>
</html>