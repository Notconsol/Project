<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Main.css">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display&display=swap" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<title>GunShop</title>
</head>
<body>
<header class="header">
	<div class="Hrefs1">
		<a href="https://www.facebook.com" class="head" target="_blank" id="fb"><img src="img/FbIcon.png" alt="FB" width="20px" class="iconL">FB</a>
		<a href="https://www.instagram.com" class="head" target="_blank" id="ig"><img src="img/IgIcon.png" alt="IG" width="20px" class="iconL">IG</a> 
		<a href="https://www.youtube.com" class="head" target="_blank" id="yt"><img src="img/YtIcon.png" alt="YT" width="24px" class="iconL">YT</a> <br>
		<a href="#" class="head" target="_blank"><img src="img/ContactIcon.png" alt="Contact" width="13px" class="iconL"><p>Contact</p></a>
	</div>
	<a href="Main.php"><img src="img/Logo.png" alt="Logo" width="153px" height="62px" class="logo"></a>
	<div class="Hrefs2">
    <?php if (isset($_SESSION['user_name'])): ?>
        <div class="dropdown">
            <a href="Subpages/account.php" class="head language-button">
                <p><?= htmlspecialchars($_SESSION['user_name']) ?></p>
                <img src="img/Enter.png" alt="Profile" width="22px" class="iconR">
            </a>
            <div class="dropdown-content">
                <a href="Subpages/account.php">My Account</a>
                <a href="Scrypt.php?action=logout">Log out</a>
            </div>
        </div>
    <?php else: ?>
        <a href="Scrypt.php#login-form" class="head language-button">
            <p>Log in/Sign up</p>
            <img src="img/Enter.png" alt="Enter" width="22px" class="iconR">
        </a>
    <?php endif; ?>
	</div>
</header><!-- Same everywhere -->

<div  class="menu">
	<div>
		<a href="Subpages/SportPistols.php" class="head1">Sports pistols</a>
		<div class="dropdown">
			<a href="Subpages/Weapon.php" class="head1">Weapon</a>
			<div class="dropdown-content">
				<a href="#">Firearms</a>
				<a href="#">Air guns</a>
				<a href="#">Traumatic weapon</a>
				<a href="#">Revolvers</a>
				<a href="#">Flare pistols</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Subpages/Bullets.php" class="head1">Bullets</a>
			<div class="dropdown-content">
				<a href="#">Smoothbore cartridges</a>
				<a href="#">Cartridges for fifled weapons</a>
				<a href="#">Ammunition for traumatic weapons</a>
				<a href="#">Flare rounds</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Subpages/Knives and tools.php" class="head1">Knives and tools</a>
			<div class="dropdown-content">
				<a href="#">Knives</a>
				<a href="#">Machete</a>
				<a href="#">Multitools</a>
				<a href="#">Axes, shovels and more</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Subpages/Optics.php" class="head1">Optics</a>
			<div class="dropdown-content">
				<a href="#">Sights</a>
				<a href="#">Observation devices</a>
				<a href="#">Night vision sights & devices (NVB)</a>
				<a href="#">Mounting</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Subpages/Clothes&Shoes.php" class="head1">Clothes & shoes</a>
			<div class="dropdown-content">
				<a href="#">Outerwear</a>
				<a href="#">Shoes</a>
				<a href="#">Hats</a>
				<a href="#">Gloves</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Subpages/Tuning.php" class="head1">Tuning</a>
			<div class="dropdown-content">
				<a href="#">Adjustable Stocks</a>
				<a href="#">Handguard</a>
				<a href="#">Magazines</a>
				<a href="#">Pistol grip</a>
			</div>
		</div>
		<div class="dropdown">
			<a href="Subpages/More.php" class="head1"> More...</a>
			<div class="dropdown-content">
				<a href="#">Lights</a>
				<a href="#">Weapon safes</a>
				<a href="#">Cleaning & Care</a>
				<a href="#">Accessories</a>
			</div>
		</div>
	</div>
	<div class="act">
		<a href="Subpages/all-reviews.php"><img src="img/heart.png" alt="Reviews" width="23px" class="icon"></a>
	</div>
</div><!-- Same everywhere -->

<?php if (!isset($_SESSION['user_id'])): ?>
    <div id="login-warning">
    You won't be able to do most things unless you log in.
    <button onclick="location.href='Scrypt.php#login-form'" class="login-button">Log in/ Sign up </button>
    </div>
<?php endif; ?><!-- Same everywhere -->

<section class="intro">
	<div class="flex-wrapper">
		<div class="slider-wrapper">
			<div class="slide active">
				<img src="img/slider1.jpg" class="sliderImg" alt="slider1">
			</div>
			<div class="slide">
				<img src="img/slider2.jpg" class="sliderImg" alt="slider2">
			</div>
			<div class="slide">
				<img src="img/slider3.jpg" class="sliderImg" alt="slider3">
			</div> 
			<div class="slide">
				<img src="img/slider4.jpg" class="sliderImg" alt="slider4">
			</div>
			<div class="slide">
				<img src="img/slider5.jpg" class="sliderImg" alt="slider5">
			</div> 
			<div class="slide">
				<img src="img/slider6.jpg" class="sliderImg" alt="slider6">
			</div>
			<div id="btn-prev"></div>
			<div id="btn-next"></div>
		</div>
	</div>
	<div class="dots-wrapper">
		<span class="dot active"></span>
		<span class="dot"></span>
		<span class="dot"></span>
		<span class="dot"></span>
		<span class="dot"></span>
		<span class="dot"></span>
	</div>
</section>

<div class="promo">
	<div class="pp"><img src="img/payinrat.png" alt="payinrat" width="25px"><p class="pp"> Payment in parts</p></div>
	<div class="pp"><img src="img/disc.png" alt="disc" width="25px"><p class="pp">2% discount when registering on the website</p></div>
	<div class="pp"><img src="img/retorex.png" alt="retorex" width="25px"><p class="pp">Return or exchange within 14 days</p></div>
</div><!-- Same everywhere -->

<div class="Categories">
	<div class="parent">
		<div  class="cat equipment">
			<img src="img/Equipment.png" alt="Equipment Image">
			<div class="overlay"></div>
			<a href="Subpages/404.php" class="hover-button">Equipment</a>
		</div>
		<div  class="cat knives-and-tools"> 
			<img src="img/Knivesandtools.jpg" alt="Knives and tools Image">
			<div class="overlay"></div>
			<a href="Subpages/Knives and tools.php" class="hover-button">Knives and tools</a>
		</div>
		<div class="cat weapon"> 
			<img src="img/Weapon.jpg" alt="weapon Image">
			<div class="overlay"></div>
			<a href="Subpages/Weapon.php" class="hover-button">Weapon</a>
		</div>
		<div class="cat bullets"> 
			<img src="img/bullets.jpg" alt="bullets Image">
			<div class="overlay"></div>
			<a href="Subpages/Bullets.php" class="hover-button">Bullets</a>
		</div>
		<div class="cat accessories"> 
			<img src="img/Accessories.jpg" alt="accessories Image">
			<div class="overlay"></div>
			<a href="#" class="hover-button">Accessories</a>
		</div>
		<div class="cat sports-pistols"> 
			<img src="img/SportPistols.jpg" alt="sports-pistols Image">
			<div class="overlay"></div>
			<a href="Subpages/SportPistols.php" class="hover-button">Sports pistols</a>
		</div>
		<div class=" cat optics">
			<img src="img/Optics.png" alt="Optics Image">
			<div class="overlay"></div>
			<a href="Subpages/Optics.php" class="hover-button">Optics</a>
		</div>
		<div class="cat tuning">
			<img src="img/Tuning.jpg" alt="Tuning Image">
			<div class="overlay"></div>
			<a href="Subpages/Tuning.php" class="hover-button">Tuning</a>
		</div>
		<div class="cat clothes-and-shoes">
			<img src="img/Clothes.jpg" alt="clothes-and-shoes Image">
			<div class="overlay"></div>
			<a href="Subpages/Clothes&Shoes.php" class="hover-button">Clothes And Shoes</a>
		</div>
		<div class="cat the-lights">
			<img src="img/lights.jpg" alt="the-lights Image">
			<div class="overlay"></div>
			<a href="#" class="hover-button">The lights</a>
		</div>
		<div class="cat cleaning-and-care">
			<img src="img/Cleaningandcare.jpg" alt="cleaning-and-care Image">
			<div class="overlay"></div>
			<a href="#" class="hover-button">Cleaning and care</a>
		</div>
		<div class="cat gun-safes">
			<img src="img/gunsafe.jpg" alt="gun-safes Image">
			<div class="overlay"></div>
			<a href="#" class="hover-button">Gun safes</a>
		</div>
	</div>
</div>

<div class="info">
	<div class="information other">
		<div class="text-photo">
			<img src="img/toClients.png" alt="" width="25px">
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
			<img src="img/store.png" alt="" width="25px">
			<p style="font-weight: 600; font-size: 22px;">Store</p>
		</div>
		<ul>
			<li><a href="Subpages/SportPistols.php">Sports pistols</a></li>
			<li><a href="Subpages/Weapon.php">Weapon</a></li>
			<li><a href="Subpages/Bullets.php">Bullets</a></li>
			<li><a href="Subpages/Optics.php">Optics</a></li>
			<li><a href="Subpages/Knives and tools.php">Knives and tools</a></li>
			<li><a href="Subpages/Tuning.php">Tuning</a></li>
			<li><a href="Subpages/Clothes&Shoes.php">Clothes and shoes</a></li>
			<li><a href="Subpages/More.php">More</a></li>
		</ul>
	</div>
	<div class="information">
		<div class="text-photo">
			<img src="img/workingHours.png" alt="" width="25px">
			<p style="font-weight: 600; font-size: 22px;">Working Hours</p>
		</div><br>
		<ul>
			<li>Mon-Fri 9:00 - 18:00</li>
			<li>Sat-Sun 10:00-16:00</li>
		</ul>
	</div>
	<div class="information">
		<div class="text-photo">
			<img src="img/ContactIcon.png" alt="" height="25px">
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

<button id = "toTop" title="Go to top">Up<img src="img/previous message.svg" alt=""></button>
<script src="Main.js"></script>
<script>
	function toggleMenu() {
		const menu = document.querySelector('.menu-items');
		menu.style.display = (menu.style.display === 'none' || menu.style.display === '') ? 'flex' : 'none';
	}
  </script>
</body>
</html>
