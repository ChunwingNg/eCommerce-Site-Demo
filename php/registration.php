<?php
require ('database-connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
    <header><h1>Sign Up</h1></header>
    <main>
    <form action="registration-action.php" method="post" id="registration">
        <label for="user">Username:</label>
        <input type="text" id="user" name="user"><br>
        
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass"><br>
        
        <label for="confirmPass">Confirm Password:</label>
        <input type="password" id="confirmPass" name="confirmPass"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <input type="submit" name="registration-action" value="Submit Registration"></button>
        <br>
    </form>
    <p><a href="login.php">Back to Login</a></p>
    </main> 
</body>
</html>