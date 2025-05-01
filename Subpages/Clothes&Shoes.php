<?php
session_start();
try {
  $pdo = new PDO('mysql:host=localhost;dbname=gunshop;charset=utf8mb4', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $subcategory_ids = [19, 20, 21, 22];
  $placeholders = implode(',', array_fill(0, count($subcategory_ids), '?'));

  $stmt = $pdo->prepare("
    SELECT id, name, price, in_stock, image_path
    FROM products
    WHERE subcategory_id IN ($placeholders)
  ");
  $stmt->execute($subcategory_ids);
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  die("Database error: " . $e->getMessage());
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
  <title>clothes-and-shoes</title>
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

<?php if (!isset($_SESSION['user_id'])): ?>
    <div id="login-warning">
    You won't be able to do most things unless you log in.
    <button onclick="location.href='../Scrypt.php#login-form'" class="login-button">Log in/ Sign up </button>
    </div>
<?php endif; ?><!-- Same everywhere -->

<div class="Categories">
  <div class="container1">
    <div>
      <h1 class="h12" itemprop="name">Clothes and Shoes</h1>
    </div><br>
    <div class="list">
      <div class="list__inner">
        <a href="#" class="list__item">
          <div class="block"><img src="../img/Clothes&Shoes/Outwear.svg" alt="Outwear"></div>
          <div class="list__item-name">Outwear</div></a>
        <a href="#" class="list__item">
          <div class="block"><img src="../img/Clothes&Shoes/Shoes.svg" alt="Shoes"></div>
          <div class="list__item-name">Shoes</div></a>
        <a href="#" class="list__item">
          <div class="block"><img src="../img/Clothes&Shoes/Hats.svg" alt="Hats"></div>
          <div class="list__item-name">Hats</div></a>
        <a href="#" class="list__item">
          <div class="block"><img src="../img/Clothes&Shoes/Gloves.svg" alt="Gloves"></div>
          <div class="list__item-name">Gloves</div></a>
      </div>
    </div>
  </div>
</div>

<div class="promo">
	<div class="pp"><img src="../img/payinrat.png" alt="payinrat" width="25px"><p class="pp"> Payment in parts</p></div>
	<div class="pp"><img src="../img/disc.png" alt="disc" width="25px"><p class="pp">2% discount when registering on the website</p></div>
	<div class="pp"><img src="../img/retorex.png" alt="retorex" width="25px"><p class="pp">Return or exchange within 14 days</p></div>
</div><!-- Same everywhere -->

<div class="Categories">
  <div class="product-container">
    <?php if (!empty($products)): ?>
      <?php foreach ($products as $product): ?>
        <div class="product-card">
          <div class="product-image">
            <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
          </div>
          <div class="product-info">
            <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
            <p class="product-price"><?= number_format($product['price'], 2) ?> USD</p>
            <p class="product-availability">
              <?= $product['in_stock'] ? "Is available" : "Out of stock" ?>
            </p>
            <div class="product-controls">
              <button class="buy-button">Add to cart</button>
              <a href="write-review.php?product_id=<?= $product['id'] ?>" class="review-link">Write a Review</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No products in this category.</p>
    <?php endif; ?>
	</div>
</div><!-- Same everywhere -->

<div class="info">
	<div class="information other">
		<div class="text-photo">
			<img src="../img/toClients.png" alt="" width="25px">
			<p style="font-weight: 600; font-size: 22px;">To clients</p>
		</div>
		<ul>
			<li><a href="#">FAQ</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Jobs</a></li>
		</ul>
	</div>
	<div class="information other">
		<div class="text-photo">
			<img src="../img/store.png" alt="" width="25px">
			<p style="font-weight: 600; font-size: 22px;">Store</p>
		</div>
		<ul>
			<li><a href="SportPistols.php">Sports pistols</a></li>
			<li><a href="Weapon.php">Weapon</a></li>
			<li><a href="Bullets.php">Bullets</a></li>
			<li><a href="Optics.php">Optics</a></li>
			<li><a href="Knives and tools.php">Knives and tools</a></li>
			<li><a href="Tuning.php">Tuning</a></li>
			<li><a href="Clothes&Shoes.php">Clothes and shoes</a></li>
			<li><a href="Subpages/More.php">More</a></li>
		</ul>
	</div>
	<div class="information">
		<div class="text-photo">
			<img src="../img/workingHours.png" alt="" width="25px">
			<p style="font-weight: 600; font-size: 22px;">Working Hours</p>
		</div><br>
		<ul>
			<li>Mon-Fri 9:00 - 18:00</li>
			<li>Sat-Sun 10:00-16:00</li>
		</ul>
	</div>
	<div class="information">
		<div class="text-photo">
			<img src="../img/ContactIcon.png" alt="" height="25px">
			<p style="font-weight: 600; font-size: 22px;">Contact</p>
		</div>
		<ul>
			<li><p style="font-weight: 600; font-size: 22px;">UA</p>
				<ul>
					<li><a href="tel:+380972933502">+38-(097)-293-35-02</a></li>
					<li><a href="tel:+380956460786">+38-(095)-646-07-86</a></li>
				</ul>
			</li>
			<li><p style="font-weight: 600; font-size: 22px;">PL</p>
				<ul>
					<li><a href="tel:+48739511057">+48-739-511-057</a></li>
					<li><a href="tel:+48504940881">+48-504-940-881</a></li>
				</ul>
			</li>
			<li><p style="font-weight: 600; font-size: 22px;">E-Mail</p>
				<ul>
					<li><a href="mailto:gunshop@gmail.com">gunshop@gmail.com</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div><!-- Same everywhere -->

<button id = "toTop" title="Go to top">Up<img src="../img/previous message.svg" alt=""></button>
<script src="../Main.js"></script>
</body>
</html>
