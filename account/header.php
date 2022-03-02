<?php  
    $url.= $_SERVER['REQUEST_URI'];

    session_start();
    $username = $_SESSION['username'];
?>

<div class="header">
  <a href="home" class="logo">Bored LBS4 Club | Dashboard</a>
  <div class="header-right">
    <a href="../home">Home</a>
    <a class="active" href=dashboard><?php echo $username ?></a>
    <a href="my">My NFT's</a>
    <a href="credit">Balance</a>
    <a href="logout">Logout</a>

  </div>
</div>