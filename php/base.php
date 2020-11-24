<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if($_SESSION && isset($_SESSION['isLogged'])){
        if($_SESSION['isLogged'] == 1){
            $logged = 1;
        }else{
            $logged = 0;
        }
    }
    else{
        $logged = 0;
    }

    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="space stars1"></div>
<div class="space stars2"></div>
<div class="space stars3"></div>

<div class="topnav">
    <a href="homepage.php">Home</a>
    <a href="catalog.php">Catalog</a>
    

    <?php 
        if($logged == 1){?>
            <div class="right">
                <a href="shoppingcart.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span><?php echo$num_items_in_cart;?></span>
                </a>
            </div>
            <?php
            echo "<div class='right'>"
                ."<a href='userpage.php'>".$_SESSION['name']."</a>"
                ."<a href='logout.php'>Log Out</a>"
                ."</div>"; 
        }
        else{
            echo "<div class='right'>"
                ."<a href='login.php'>Log In</a>"
                ."</div>";
        }
    ?>

    <div class="search-container">
        <form action="catalog.php" method="post">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit" name="catalog-search" class="search_b"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<?php
    function template_footer() {
        $year = date('Y');
        echo <<<EOT
            <footer>
                <p class="right footer_text">&#169; $year, Apollo 42 Express</p>
            </footer>
        EOT;
    }
?>