<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
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

<div>
    <h1>Shopping Cart</h1>
    <form action="update-cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Product</td>
                    <th>Price</td>
                    <th>Quantity</td>
                    <th>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($items)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>
                <?php else: ?>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td class="img">
                        <img src="<?=$item['image_link']?>" width="50" height="50" alt="<?=$item['name']?>">
                    </td>
                    <td>
                        <p><?=$item['name']?></a>
                        <br>
                        <a href="update-cart.php?remove=<?=$item['id']?>">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$item['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$item['id']?>" value="<?=$cart_items[$item['id']]?>" min="1" max="<?=$items['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$item['price'] * $cart_items[$item['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Total</span>
            <span class="price">&dollar;<?=$total?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
</body>
</html>