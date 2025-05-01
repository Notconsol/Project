<?php
session_start();
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=gunshop;charset=utf8mb4', 'root', '');
$sql = "SELECT r.*, p.name AS product_name, p.image_path
  FROM reviews r
  JOIN products p ON r.product_id = p.id
  ORDER BY r.created_at DESC";

$stmt = $pdo->query($sql);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display&display=swap" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <title>All reviews</title>
</head>
<body>
<header class="header">
	<div class="Hrefs1">
		<a href="https://www.facebook.com" class="head" target="_blank" id="fb"><img src="../img/FbIcon.png" alt="FB" width="20px" class="iconL">FB</a>
		<a href="https://www.instagram.com" class="head" target="_blank" id="ig"><img src="../img/IgIcon.png" alt="IG" width="20px" class="iconL">IG</a> 
		<a href="https://www.youtube.com" class="head" target="_blank" id="yt"><img src="../img/YtIcon.png" alt="YT" width="24px" class="iconL">YT</a> <br>
		<a href="#" class="head" target="_blank"><img src="../img/ContactIcon.png" alt="Contact" width="13px" class="iconL"><p>Contact</p></a>
	</div>
	<a href="../Main.php"><img src="../img/Logo.png" alt="Logo" width="153px" height="62px" class="logo"></a>
	<div class="Hrefs2">
    <?php if (isset($_SESSION['user_name'])): ?>
        <div class="dropdown">
            <a href="account.php" class="head language-button">
                <p><?= htmlspecialchars($_SESSION['user_name']) ?></p>
                <img src="../img/Enter.png" alt="Profile" width="22px" class="iconR">
            </a>
            <div class="dropdown-content">
                <a href="account.php">My Account</a>
                <a href="Scrypt.php?action=logout">Log out</a>
            </div>
        </div>
    <?php else: ?>
        <a href="Scrypt.php#login-form" class="head language-button">
            <p>Log in/Sign up</p>
            <img src="../img/Enter.png" alt="Enter" width="22px" class="iconR">
        </a>
    <?php endif; ?>
  </div>
</header><!-- Same everywhere -->
<div  class="menu">
	<div>
		<a href="SportPistols.php" class="head1">Sports pistols</a>
		<div class="dropdown">
			<a href="Weapon.php" class="head1">Weapon</a>
			<div class="dropdown-content">
				<a href="#">Firearms</a>
				<a href="#">Air guns</a>
				<a href="#">Traumatic weapon</a>
				<a href="#">Revolvers</a>
				<a href="#">Flare pistols</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Bullets.php" class="head1">Bullets</a>
			<div class="dropdown-content">
				<a href="#">Smoothbore cartridges</a>
				<a href="#">Cartridges for fifled weapons</a>
				<a href="#">Ammunition for traumatic weapons</a>
				<a href="#">Flare rounds</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Knives and tools.php" class="head1">Knives and tools</a>
			<div class="dropdown-content">
				<a href="#">Knives</a>
				<a href="#">Machete</a>
				<a href="#">Multitools</a>
				<a href="#">Axes, shovels and more</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Optics.php" class="head1">Optics</a>
			<div class="dropdown-content">
				<a href="#">Sights</a>
				<a href="#">Observation devices</a>
				<a href="#">Night vision sights & devices (NVB)</a>
				<a href="#">Mounting</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Clothes&Shoes.php" class="head1">Clothes & shoes</a>
			<div class="dropdown-content">
				<a href="#">Outerwear</a>
				<a href="#">Shoes</a>
				<a href="#">Hats</a>
				<a href="#">Gloves</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Tuning.php" class="head1">Tuning</a>
			<div class="dropdown-content">
				<a href="#">Adjustable Stocks</a>
				<a href="#">Handguard</a>
				<a href="#">Magazines</a>
				<a href="#">Pistol grip</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="More.php" class="head1"> More...</a>
			<div class="dropdown-content">
				<a href="#">Lights</a>
				<a href="#">Weapon safes</a>
				<a href="#">Cleaning & Care</a>
				<a href="#">Accessories</a>
			</div>
		</div>
	</div>
	<div class="act">
		<a href="all-reviews.php"><img src="../img/heart.png" alt="Reviews" width="23px" class="icon"></a>
	</div>
</div><!-- Same everywhere -->

<?php if (!isset($_SESSION['user_id'])): ?>
    <div id="login-warning">
    You won't be able to do most things unless you log in.
    <button onclick="location.href='../Scrypt.php#login-form'" class="login-button">Log in/ Sign up </button>
    </div>
<?php endif; ?><!-- Same everywhere -->

<div class="Categories">
  <div class="container1">
    <div>
      <h1 class="h12" itemprop="name">All reviews</h1>
    </div><br>
  </div>
</div>
<div style="display: flex; flex-wrap: wrap; padding: 0 105px;">
  <?php foreach ($reviews as $review): ?>
    <div class="product-card">
      <div class="product-image">
        <img src="<?= htmlspecialchars($review['image_path']) ?>" alt="Product image">
      </div>
      <div class="product-info">
        <h3 class="product-title"><?= htmlspecialchars($review['product_name']) ?></h3>
        <div class="star-display">
          <?php
            $rating = (int)$review['rating'];
            for ($i = 1; $i <= 5; $i++) {
              echo $i <= $rating ? '★' : '☆';
            }
          ?>
        </div>

        <p class="product-price"><?= nl2br(htmlspecialchars($review['review_text'])) ?></p>
        <p class="product-price">
          <em>Author: <?= htmlspecialchars($review['user_name']) ?> | <?= $review['created_at'] ?></em>
        </p>
      </div>
    </div>
  <?php endforeach; ?>
</div>

</div>
</body>
</html>
