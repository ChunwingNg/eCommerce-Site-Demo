<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    require_once('database-connection.php');

    if(isset($_POST['address_id'], $_POST['card_id'])){
        $a_id = $_POST['address_id'];
        $c_id = $_POST['card_id'];

        $db->exec("INSERT INTO orders(fk_orders_user,fk_orders_card,fk_orders_address) VALUES ($_SESSION['id'],$c_id,$a_id)");
        $success = True;
    }
    else{
        $success = 0;
    }

?>

<!--Insert nav bar stuff here-->


<?php
    if($success){
        echo "<h2>Order has been placed successfully</h2>";
    }
    else{
        echo "<h2>Uh Oh! Something went wrong with creating your order</h2>";
    }
?>

<div>
    <a href="userpage.php">Go to User Page</a>
    <a href="homepage.php">Go to Home Page</a>
</div>