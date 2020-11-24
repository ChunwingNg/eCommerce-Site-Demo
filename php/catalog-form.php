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
            alert("Error: Please make sure to fill in all information fields correctly");
        </script>
        <?php
        $_SESSION['error'] = 0;
    }

    include('base.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Catalog Form</title>
</head>
    
<body>
    <div class="spacer">.</div>
    <div class="content">
    <header><h1>Catalog Form</h1></header>
    <form action="catalog-add.php" method="post" id="catalog-form">
        <div class="field">
            <input id="name" name="name" type="text" placeholder="Name">
        </div>
        <br>
        <div class="field">
            <input id="price" name="price" type="number"  step="0.01" placeholder="Price">
        </div>
        <br>
        <div class="field">
            <input id="quantity" name="quantity" type="number" placeholder="Amount">
            <p class="help-block"></p>
        </div>
        <br>
        <div class="field">
            <input id="desc" name="desc" type="text" placeholder="Description">
        </div>

        <br>
        <div class="field">
            <input id="img_link" name="img_link" type="text" placeholder="Image Link">
        </div>
        <br>
        <div class="field">
            <button type="submit" name="catalog-add" class="submit_b">Add Catalog Item</button>
        </div>
    </form>
    </div>
</body>
</html>