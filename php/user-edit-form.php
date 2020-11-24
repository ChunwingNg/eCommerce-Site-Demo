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
</head>

<body>
<div class="spacer">.</div>
<div class="content">
<header><h1>Change Account Inforamtion</h1></header>
<p> You will need to input your password to confirm changes</p>
<main>
    <form action="user-edit.php" method="post" id="user-edit-form">

        <div class="field">
            <span class="fas fa-user"></span>
        <input type="text" name="newUser" placeholder="New Username (optional)">
<!--        <label>Password</label>-->
        </div>
        <div class="field">
            <span class="fas fa-envelope"></span>
        <input type="text" name="newEmail" placeholder="New Email (optional)">
<!--        <label>Password</label>-->
        </div>
        <div class="field">
            <span class="fas fa-lock"></span>
            <input type="password" name="passW" placeholder="Current Password" required>
<!--        <label>Username</label>-->
        </div>
        <div class="field">
        <button type="submit" name="password-change" value="Change Info" class="submit_b">Confirm Changes</button>
        </div>
    </form>
</main>
</body>
</html>