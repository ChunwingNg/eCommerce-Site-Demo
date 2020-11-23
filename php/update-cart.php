<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    require_once('database-connection.php');

    //Will add to the cart if it product id and quantity are specified
    if(isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];

        $product = $db->query("SELECT * FROM catalog_item WHERE id = $product_id");

        if($product && $quantity > 0){
            //Check to see if cart is empty, if if it is then make a cart
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                // There are no products in cart, this will add the first product to cart
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
        header('Location: shoppingcart.php');
        exit;
    }

    //Will remove from cart if it remove is specified
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        //removes the id retrieved from $_GET['remove'] from the cart
        unset($_SESSION['cart'][$_GET['remove']]);
        header('Location: shoppingcart.php');
        exit;
    }

    //Will update the cart if update is specified
    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        // Loop through the post data so we can update the quantities for every product in cart
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                //Converts the name of the input data into the id
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                if (isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
        header('Location: shoppingcart.php');
        exit;
    }

    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('Location: checkOut.php');
        exit;
    }
?>