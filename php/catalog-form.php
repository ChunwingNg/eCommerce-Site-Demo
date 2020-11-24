<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    require_once('database-connection.php');

    if($_SESSION['error'] == 1)
    {
        ?>
        <script>
            alert("Error: Please make sure to fill in all card information fields correctly");
        </script>
        <?php
        $_SESSION['error'] = 0;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog Form</title>
</head>
    
<body>
    <form action="catalog-add.php" method="post" id="catalog-form">
        <label class="control-label">Name</label>
        <div class="controls">
            <input id="name" name="name" type="text" placeholder="tears">
            <p class="help-block"></p>
        </div>
        <label class="control-label">Price</label>
        <div class="controls">
            <input id="price" name="price" type="number" placeholder="20000.29">
            <p class="help-block"></p>
        </div>
        <label class="control-label">Quantity</label>
        <div class="controls">
            <input id="quantity" name="quantity" type="number" placeholder="123">
            <p class="help-block"></p>
        </div>
        <label class="control-label">Description</label>
        <div class="controls">
            <input id="desc" name="desc" type="text">
            <p class="help-block"></p>
        </div>

        <label class="control-label">image_link</label>
        <div class="controls">
            <input id="img_link" name="img_link" type="text">
            <p class="help-block"></p>
        </div>
        <div>
            <button type="submit" name="catalog-add">Add Catalog Item</button>
        </div>
    </form>
</body>
</html>