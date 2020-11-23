<?php
    require ('database-connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="https://kit.fontawesome.com/5c49374a2a.js" crossorigin="anonymous"></script>

</head>


<?php
    include('base.php');
?>

<body>
<div class="content">

    <header><h1>Sign Up</h1></header>
    <main>
        <form action="registration-action.php" method="post" id="registration">

            <div class="field">
                <span class="fas fa-user-astronaut"></span>
                <input type="text" id="user" name="user" placeholder="Username"><br>
<!--                <label for="user">Username:</label>-->
            </div>

            <div class="field">
                <span class="fas fa-lock"></span>
                <input type="password" id="pass" name="pass" placeholder="Password">
<!--                <label for="pass">Password:</label>-->
            </div>
            <br>
            <div class="field">
                <span class="fas fa-lock"></span>
            <input type="password" id="confirmPass" name="confirmPass" placeholder="Confirm Password">
<!--            <label for="confirmPass">Confirm Password:</label>-->
            </div>
            <br>
            <div class="field">
                <span class="far fa-envelope"></span>
            <input type="email" id="email" name="email" placeholder="Email"><br>
<!--            <label for="email">Email:</label>-->
            </div>
            <br>

            <div class="field">
            <button type="submit" name="registration-action" value="Submit Registration" class="submit_b">Submit</button>
            </div>
        </form>
        <div class="field">
            <button type="button" class="submit_b"><a href="login.php">Back to Login</a></button>
        </div>
    </main>
</div>
<?=template_footer()?>
</body>

</html>
