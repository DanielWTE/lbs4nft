<?php
session_start();
if(!isset($_SESSION['userid'])) {
    header("Location: login"); 
    die();
}

$id = $_SESSION['userid'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$locked = $_SESSION['locked'];
$credate = $_SESSION['created_date'];

if($locked=='1'){
    header("Location: locked"); 
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBS4 NFT Dashboard</title>
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
</head>
<body>
<?php include 'header.php' ?>

<h1 class="heading welcome">Welcome</h1>

<center><div style="font-family: Montserrat, sans-serif;" class="card-container welcome2">
  <!-- <span class="pro">PRO</span> -->
  <h3 style="font-size:36px;"><?php echo $username ?></h3>
  <h6 style="font-size:16px;">ID: <?php echo $id ?></h6>
  <h6 style="font-size:16px;">SINCE: <?php echo date('M Y', strtotime($credate)); ?></h6>
  <p></p>
  <div class="buttons">
  </div>
  <div class="skills">
  </div>
</div></center>

</body>
</html>