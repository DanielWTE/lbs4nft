<?php
$nftid = $_GET['id'];

$dbh = new PDO('mysql:host=localhost;dbname=lbs4nft', 'nftsystem', 'ckUZs&JRk?BEnc4RTgCv');
$result = $dbh->query("SELECT * FROM nfts WHERE id = $nftid");
while ($row = $result->fetch()) {
    $title = $row['title'];
    $author = $row['author'];
    $description = $row['description'];
    $price = $row['price'];
}

if (isset($nftid)) {
}else{
    header("Location: home");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBS4 NFT Store</title>
    <link rel="stylesheet" href="css/new.css">
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
</head>
<body style="background-image: url('pictures/background.jpg');">
<?php include 'header.php' ?>

<div class="container">

<div class="card">
<h1 class="heading-nft"><?php echo $title ?><span>By <?php echo $author ?></span></h1>
    <img class="nft-picture" src="pictures/<?php echo $nftid ?>.png" alt="id1">
<span class="description-heading-nft">Description</span>
    <p class="description-nft"><?php echo $description ?></p>
<span class="price-heading-nft">Price</span>
    <p class="price-nft"><?php echo $price ?> LBPoints</p>
    <form action="action/buy?id=<?php echo $nftid ?>" method="POST">
    <button class="buy" <?php if(!isset($_SESSION['userid'])) {echo "disabled";}else{} ?>><?php if(!isset($_SESSION['userid'])) {echo "Please Login!";}else{echo "Buy";} ?></button>
    </form>
</div>

</div>

</body>
</html>