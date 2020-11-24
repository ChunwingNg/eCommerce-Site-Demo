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

        $db->exec("INSERT INTO orders(fk_orders_user,fk_orders_card,fk_orders_address) VALUES ($_SESSION['id'],$c_id,$a_id)");

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
    <div class="content-main">
        <?php if($success){
            echo "<h2>Order has been placed successfully</h2>";
            }
            else{
             echo "<h2>Uh Oh! Something went wrong with creating your order</h2>";
            }
        ?>
        <a href="userpage.php">Go to User Page</a>
        <a href="homepage.php">Go to Home Page</a>
    </div>

    <?=template_footer()?>
</body>