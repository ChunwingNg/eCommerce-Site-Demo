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
        <h1 class="title center">Catalog</h1>
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
            echo "<tr>
                    <th colspan="2">Product</td>
                    <th>Price</td>
                    <th>Availability</td>
                    <th></td>
                </tr>"
            foreach ($items as $item){
                echo "<div class='product'>"
                        ."<h3>" . $item['name'] . "</h3>"
                        ."<img src='" . $item['image_link'] . "'>"
                        ."<h4>$" . $item['price'] . "</h4>";

                if($item['quantity'] > 20){
                    $avail = "In Stock";
                }
                else if($item['quantity'] == 0){
                    $avail = "Out of Stock";
                }
                else{
                    $avail = "Low Stock";
                }

                echo "<h4>" . $avail . "</h4>"
                        ."<p>" . $item['desc'] . "</p>"
                            ."<form action='update-cart.php' method='post'>"
                                ."<input type='number' name='quantity' value=1 min=1 max=" . $item['quantity'] . " placeholder='Quantity' required>"
                                ."<input type='hidden' name='product_id' value=" . $item['id']. ">"
                                ."<input type='submit' value='Add To Cart'>"
                            ."</form>"
                        ."</div>";
            }
        }

        ?>
    </div>
    <?=template_footer()?>
</body>