<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    $_SESSION['isLogged'] = 0;
    $_SESSION['id'] = 0;
    $_SESSION['email'] = "";
    $_SESSION['name'] = "";
    $_SESSION['cart'] = array();
    header('Location: homepage.php');
    exit;
?>