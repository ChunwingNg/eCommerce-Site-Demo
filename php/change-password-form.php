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
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
<header><h1>Change Password</h1></header>
<main>
    <form action="password-change.php" method="post" id="password-form">
        <div class="field">
            <span class="fas fa-lock"></span>
            <input type="password" name="current" placeholder="Current Password" required>
<!--        <label>Username</label>-->
        </div>
        <div class="field">
            <span class="fas fa-lock"></span>
        <input type="password" name="newPass" placeholder="New Password">
<!--        <label>Password</label>-->
        </div>
        <div class="field">
            <span class="fas fa-lock"></span>
        <input type="password" name="newPassConfirm" placeholder="Confirm Password">
<!--        <label>Password</label>-->
        </div>
        <div class="field">
        <button type="submit" name="password-change" value="Change Password" class="submit_b">Change Password</button>
        </div>
    </form>
</main>
</body>
</html>