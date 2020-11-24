<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
    require_once('database-connection.php');

    if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == 1){
        header("Location: homepage.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="../js/login.js"></script>
</head>

<?php
    include('base.php');
?>
<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Login</h1></header>
<main>
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 1){
                echo "<div class='error'>Invalid Username or Password.</div><br>";
                $_SESSION['error'] = 0;
            }?>
    <form action="login-action.php" method="post" id="login">
        <div class="field">
            <span class="fas fa-user"></span>
            <input id="user" type="text" name="userNm" placeholder="Username" required>
            <div class="error" id="side1"></div>
<!--        <label>Username</label>-->
        </div>
        <div class="field">
            <span class="fas fa-lock"></span>
        <input id="pass" type="password" name="passWd" placeholder="Password" required>
        <div class="error" id="side2"></div>
<!--        <label>Password</label>-->
        </div>
        <div class="field">
        <button id="submit" type="submit" name="login-action" value="Login" class="submit_b" disabled>Login</button>
        </div>
    </form>
<br>
    <div class="signup">Not a member? <a href="registration.php">Signup now</a></div>

</main>
</div>
<?=template_footer()?>
</body>
</html>