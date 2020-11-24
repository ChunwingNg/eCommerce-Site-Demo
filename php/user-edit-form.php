<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once('database-connection.php');
?>

<?php
    include('base.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Info</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <script src="../js/edit.js"></script>

</head>

<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Change Account Information</h1><p> You will need to input your password to confirm changes</p></header><br>
<main>
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 1){
                echo "<div class='error'>Invalid Password.</div><br>";
                $_SESSION['error'] = 0;
            }?>
    <div class="error" id="side3"></div>
    <form action="user-edit.php" method="post" id="user-edit-form">

        <div class="field">
            <span class="fas fa-user"></span>
        <input id="name" type="text" name="newUser" placeholder="New Username (optional)">
<!--        <label>Password</label>-->
        </div>
        <br>
        <div class="field">
            <span class="fas fa-envelope"></span>
        <input id="email" type="text" name="newEmail" placeholder="New Email (optional)">
        <div class="error" id="side1"></div>
<!--        <label>Password</label>-->
        </div>
        <br>
        <div class="field">
            <span class="fas fa-lock"></span>
            <input id="pass" type="password" name="passW" placeholder="Current Password" required>
            <div class="error" id="side2"></div>
<!--        <label>Username</label>-->
        </div>
        <br>
        <div class="field">
        <button id="submit" type="submit" name="password-change" value="Change Info" class="submit_b" disabled>Confirm Changes</button>
        </div>
    </form>
</main>
</body>
</html>