<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    require_once('database-connection.php');
    $success = 0 ;
    if(isset($_POST['address_id'], $_POST['card_id'])){
        $a_id = $_POST['address_id'];
        $c_id = $_POST['card_id'];
        $u_id = $_SESSION['id'];

        $db->exec("INSERT INTO orders(fk_orders_user,fk_orders_card,fk_orders_address) VALUES($u_id,$c_id,$a_id)");

        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                //Converts the name of the input data into the id
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                $db->exec("UPDATE catalog_item SET quantity = quantity - $quantity WHERE id=$id");
            }
        }
        $success = True;
    }

    include('base.php');
?>

<body>
    <div class="spacer">.</div>
    <div class="content-main center">
        <?php if($success){
            echo "<h2>Order has been placed successfully! Thank you for your business</h2>";
            }
            else{
             echo "<h2>Uh Oh! Something went wrong with creating your order. :(</h2>";
            }
        ?>
        <div class="middle">
            <a href="userpage.php" class="ebtn">Go to User Page</a>
            <a href="homepage.php" class="ebtn">Go to Home Page</a>
        </div>
    </div>

    <?=template_footer()?>
</body>