<?php
    include ('database.php');
    $userName = $_POST['user_name'];
    echo $userName;
    $query = "INSERT INTO `user` ('userN')
            VALUES ('$userName')";
    $db -> exec($query);
    include ('checkOut.php');
?>
