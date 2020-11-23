<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="../css/carticon.css">