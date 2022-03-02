<?php 
session_start();
session_destroy();
if(!isset($_SESSION['userid'])) {
    header("Location: login"); 
    die();
}
$username = $_SESSION['username'];
$locked = $_SESSION['locked'];


$value = 'yes';

setcookie("locked", $value);
setcookie("locked", $value, time()+86400);
setcookie("locked", $value, time()+86400, "/~rasmus/", "dwag.me", 1);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBS4 NFT Store</title>
    <link rel="stylesheet" href="../css/form.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class='login'>
    <h2>You're Locked!</h2>

    
    <p style="text-align:center;">Your username: <?php echo "<strong>$username</strong>" ?></p>

    <br><br>

    <img style="display:block;margin-left:auto;margin-right:auto;width:50%;" src="../pictures/spongebob-ban.gif">

    <br><br><br>

    <form action="../home">
        <input type='submit' value='Back to the Homepage 😔'>
    </form>


</div>
</body>
</html>