<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(isset($_SESSION['isLogged']) && $_SESSION==1){
        $logged = True;
    }
    else{
        $logged=False;
    }

    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="../css/carticon.css">

<div class="space stars1"></div>
<div class="space stars2"></div>
<div class="space stars3"></div>

<div>
    <ul>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="catalog.php">Catalog</a></li>
        <li><a href="userpage.php">User Info</a></li>
        <div class="link-icons">
            <a href="shoppingcart.php">
                <i class="fas fa-shopping-cart"></i>
                <span><?php echo$num_items_in_cart;?></span>
	        </a>
        </div>
    </ul>
</div>