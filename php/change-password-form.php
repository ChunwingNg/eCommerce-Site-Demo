<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once('database-connection.php');
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] == 0){
        header("Location: login.php");
        exit;
    }
?>

<?php
    include('base.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <script src="../js/password.js"></script>
</head>

<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Change Password</h1></header>
<main>
<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 1){
                echo "<div class='error'>Invalid Password.</div><br>";
                $_SESSION['error'] = 0;
            }?>
    <form action="password-change.php" method="post" id="password-form">
        <div class="field">
            <span class="fas fa-lock"></span>
            <input id="old" type="password" name="current" placeholder="Current Password" required>
            <div class="error" id="side1"></div>
<!--        <label>Username</label>-->
        </div>
        <br>
        <div class="field">
            <span class="fas fa-lock"></span>
        <input id="new" type="password" name="newPass" placeholder="New Password" required minlength="6" maxlength="25">
        <div class="error" id="side2"></div>
<!--        <label>Password</label>-->
        </div>
        <br>
        <div class="field">
            <span class="fas fa-lock"></span>
        <input id="newC" type="password" name="newPassConfirm" placeholder="Confirm Password" required minlength="6" maxlength="25">
        <div class="error" id="side3"></div>
<!--        <label>Password</label>-->
        </div>
        <br>
        <div class="field">
            <button type="submit" name="password-change" value="Change Password" class="submit_b">Change Password</button>
        </div>
    </form>
</main>
</div>
</body>
</html>