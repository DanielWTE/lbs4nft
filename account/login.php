<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=lbs4nft', 'nftsystem', '');
 
if(isset($_GET['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();
        
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['locked'] = $user['locked'];
        $_SESSION['created_date'] = $user['created'];
        header("Location: dashboard"); 
        die();
    } else {
        $errorMessage = "Wrong credentials<br>";
    }
    
}
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
    <h2>Login</h2>

    <form action="?login=1" method="post">

    <input name='username' placeholder='Username' type='text' required>
    <input name="password" id='password' placeholder='Password' type='password' required>
    <br><br>
    <input class='animated' type='submit' value='Login'>

    <?php 
    if(isset($errorMessage)) {
        echo "<br><br><p style=\"text-align:center;color:red;\">$errorMessage</p>";
    }
    ?>

    <a class='forgot' href='register'>Create a account</a>

    </form>

</div>
</body>
</html>
