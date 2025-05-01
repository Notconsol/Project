<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../Scrypt.php");
  exit;
}
$pdo = new PDO('mysql:host=localhost;dbname=gunshop;charset=utf8mb4', 'root', '');

$product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;

$stmt = $pdo->prepare("SELECT name FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
  echo "Product not found.";
  exit;
}

$product_name = $product['name'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_name = $_SESSION['user_name'];
  $rating = (int)$_POST['rating'];
  $review_text = $_POST['review_text'] ?? '';

  $stmt = $pdo->prepare("INSERT INTO reviews (product_id, user_name, rating, review_text) VALUES (?, ?, ?, ?)");
  $stmt->execute([$product_id, $user_name, $rating, $review_text]);

  header("Location: all-reviews.php");
  exit;
}
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
  <title>Weapon</title>
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
          <a href="../Scrypt.php?action=logout">Log out</a>
        </div>
      </div>
    <?php else: ?>
      <a href="../Scrypt.php#login-form" class="head language-button">
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
<div class="Categories">
  <div class="container1">
    <div>
      <h1 class="h12" itemprop="name">Leave a review for: "<?= htmlspecialchars($product_name) ?>"</h1>
    </div><br>
  </div>
</div>
<div class="container">
  <form method="post" class="form-box">
  <p>You are logged in as: <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></p>
  <input type="hidden" name="user_name" value="<?= htmlspecialchars($_SESSION['user_name']) ?>">
  <label for="rating">Rating (1–5):</label><br>
  <div class="star-rating">
    <?php for ($i = 5; $i >= 1; $i--): ?>
      <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>" required>
      <label for="star<?= $i ?>">&#9733;</label>
    <?php endfor; ?>
  </div>
  <br><br>
  <label for="review_text">Your Review:</label><br>
  <textarea name="review_text" rows="5" cols="40" required></textarea><br><br>
  <button type="submit">Submit Review</button>
  </form>
</div>
</body>
</html>
