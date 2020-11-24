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

    $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $items = array();
    $total = 0.00;

    if ($cart_items) {

        //Populates the query with ids of the products in the cart
        $array_to_question_marks = implode(',', array_fill(0, count($cart_items), '?'));
        $stmt = $db->prepare('SELECT * FROM catalog_item WHERE id IN (' . $array_to_question_marks . ')');

        $stmt->execute(array_keys($cart_items));

        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['cart_items'] = $cart_items;
        $_SESSION['cart-list'] = $items;
        
        // Calculate the subtotal
        foreach ($items as $item) {
            $total += (float)$item['price'] * (int)$cart_items[$item['id']];
        }
        $_SESSION['total'] = $total;
    }
?>

<?php
    include('base.php');
?>
<body>
<div class="spacer">.</div>
    <div class="content-main">
        <h1 class="title center">Shopping Cart</h1>
        <form action="update-cart.php" method="post">
            <table class='cart_table'>
                <thead>
                    <tr>
                        <th colspan="2"><h2>Product</h2></td>
                        <th><h2>Price</h2></td>
                        <th><h2>Quantity</h2></td>
                        <th><h2>Total</h2></td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($items)): ?>
                        <tr>
                            <td colspan="5" style="text-align:center;"><h1 class="title center">You have no products added in your Shopping Cart</h1></td>
                        </tr>
                    <?php else: ?>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td class="img">
                            <img src="<?=$item['image_link']?>" width="100" height="100" alt="<?=$item['name']?>">
                        </td>
                        <td>
                            <h2><?=$item['name']?></h2>
                            <br>
                            <a href="update-cart.php?remove=<?=$item['id']?>"><h3>Remove</h3></a>
                        </td>
                        <td class="price"><h2>&dollar;<?=$item['price']?></h2></td>
                        <td class="quantity">
                            <input class='input_num' type="number" name="quantity-<?=$item['id']?>" value="<?=$cart_items[$item['id']]?>" min="1" max="<?=$item['quantity']?>" placeholder="Quantity" required>
                        </td>
                        <td class="price"><h2>&dollar;<?=$item['price'] * $cart_items[$item['id']]?></h2></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="subtotal">
                <span class="text">Total</span>
                <span class="price">&dollar;<?=$total?></span>
            </div>
            <div class="cart_buttons">
                <input type="submit" value="Update" name="update">
                <input type="submit" value="Place Order" name="placeorder">
            </div>
        </form>
    </div>
</body>