<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=lbs4nft', 'nftsystem', '');
?>
 
<?php
$showFormular = true;
 
if(isset($_GET['create'])) {
    $error = false;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
  

    if($password != $password2) {
        echo 'Both password needs to be the same!<br>';
        $error = true;
    }
    
    //Überprüfe, dass der Username noch nicht registriert wurde
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();
        
        if($user !== false) {
            echo 'This username is already taken!<br>';
            $error = true;
        }    
    }
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $statement = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $result = $statement->execute(array('username' => $username, 'password' => $passwort_hash));
        
        if($result) {        
            header("Location: login");
            $showFormular = false;
        } else {
            echo 'Please try it again<br>';
        }
    } 
}
 
if($showFormular) {
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
    <div class='login'>
    <h2>Register</h2>

    <form action="?create=1" method="post">
    <input name="username" id="username" minlength="5" maxlength="12" placeholder='Username' type='text' required>
    <input name="password" id="password" minlength="6" maxlength="250" placeholder='Password' type='password' required>
    <input name="password2" id="password2" minlength="6" maxlength="250" placeholder='Repeat Password' type='password' required>
    <div class='agree'>
        <input id='agree' name='agree' type='checkbox' required>
        <label for='agree'></label><a href="../tos" target="_blank">Accept rules and conditions</a>
    </div>
    <input class='animated' type="submit" value='Register'>
    <a class='forgot' href='login'>Already have an account?</a>
    </form>

    <?php
} //Ende von if($showFormular)
?>
</div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
// do not allow users to enter spaces:
$(  ".login" ).on({
keydown: function(event) {
if (event.which === 32)
return false;
},
// if a space copied and pasted in the input field, replace it (remove it):
change: function() {
this.value = this.value.replace(/\s/g, "");
}
});
});
</script>
