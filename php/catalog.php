<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    require_once('database-connection.php');

    if(isset($_POST['catalog-search']))
    {
        $text = filter_input(INPUT_POST, 'search');
        $posted = 1;
        $items=$db->query("SELECT * FROM catalog_item WHERE `name` LIKE '%$text%'");
    }
    else{
        $posted = 0;
        $items=$db->query('SELECT * FROM catalog_item');
    }

?>

<head>
</head>

<?php require_once('base.php');?>

<body>
    <div class="spacer">.</div>
    <div class="content-main">
        <h1 class="title center bot_space">Catalog</h1>
        <?php

        if($items->rowCount() == 0){
            if($posted == 1){
                echo "<h1>Sorry, we did not find anything matching your search.</h1>";
            }
            else{
                echo "<h1>Sorry, we do not have anything for sale yet.</h1>";
            }
        }
        else{
            echo "<table class='catalog_table'><tr>
                    <th colspan='2'><h2>Product</h2></th>
                    <th><h2>Price</h2></th>
                    <th><h2>Availability</h2></th>
                    <th><h2>Description</h2></th>
                    <th></th>
                </tr>";
            foreach ($items as $item){
                echo "<tr>"
                        ."<td><img src='" . $item['image_link'] . "' width='200' height='200'></td>"
                        ."<td><h3>" . $item['name'] . "</h3></td>"
                        ."<td><h3>$" . $item['price'] . "</h3></td>";

                if($item['quantity'] > 20){
                    $avail = "In Stock";
                }
                else if($item['quantity'] == 0){
                    $avail = "Out of Stock";
                }
                else{
                    $avail = "Low Stock";
                }

                echo "<td><h3>" . $avail . "</h3></td>"
                        ."<td><h4>" . $item['desc'] . "</h4></td>"
                            ."<td>";
                            if($item['quantity'] > 0){
                                echo "<form action='update-cart.php' method='post'>"
                                ."<input class='input_num' type='number' name='quantity' value=1 min=1 max=" . $item['quantity'] . " placeholder='Quantity' required>"
                                ."<input type='hidden' name='product_id' value=" . $item['id']. ">"
                                ."<br><input class='input_submit' type='submit' value='Add To Cart'>"
                            ."</form>";
                            }
                            echo "</td></tr>";
            }
        }

        ?>
        </table>
    </div>
    <?=template_footer()?>
</body>