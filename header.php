<?php  
    $url.= $_SERVER['REQUEST_URI'];

    session_start();
    $username = $_SESSION['username'];
?>

<div class="header">
  <a href="home" class="logo">Bored LBS4 Club</a>
  <div class="header-right">

  <?php if(!isset($_SESSION['userid'])) {

    echo "<a class=\"active\" href=\"home\">Home</a>";
    echo "<a href=\"account/login\">Login</a>";
    echo "<a href=\"account/register\">Register</a>";

  }else{
    echo "<a class=\"active\" href=\"home\">Home</a>";
    echo '<a href=account/dashboard>'. $username . '</a>';
    echo "<a href=\"account/logout\">Logout</a>";
  } ?>

  </div>
</div>