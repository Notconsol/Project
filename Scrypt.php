<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=gunshop;charset=utf8", 'root', '');

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  session_destroy();
  header('Location: Scrypt.php');
  exit();
}

$message = '';
if (isset($_SESSION['flash_message'])) {
  $message = $_SESSION['flash_message'];
  unset($_SESSION['flash_message']); 
}

if (isset($_POST['register'])) {
  if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['password'])) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? OR login = ?");
    $stmt->execute([$_POST['email'], $_POST['login']]);
    $userExists = $stmt->fetchColumn();
    if ($userExists) {
      $_SESSION['flash_message'] = "<p style='color: red;'>User with this email or login already exists.</p>";
      header('Location: Scrypt.php');
      exit();
    } else {
      $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, login, password_hash,join_date) VALUES (?, ?, ?, ?, ?, NOW())");
      $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['login'],
        password_hash($_POST['password'], PASSWORD_DEFAULT)
      ]);
      $_SESSION['flash_message'] = "<p style='color: green;'>Registration successful. You can now log in.</p>";
      header('Location: Scrypt.php');
      exit();
    }
  } else {
    $_SESSION['flash_message'] = "<p style='color: red;'>Please fill in all fields for registration.</p>";
    header('Location: Scrypt.php');
    exit();
  }
}

if (isset($_POST['login'])) {
  if (!empty($_POST['login_name']) && !empty($_POST['login_password'])) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$_POST['login_name']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['login_password'], $user['password_hash'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['first_name'];
      $_SESSION['user_email'] = $user['email'];
      $_SESSION['user_join_date'] = $user['join_date'];

      header('Location: Main.php');
      exit();
    } else {
      $_SESSION['flash_message'] = "<p style='color: red;'>Incorrect login or password!</p>";
      header('Location: Scrypt.php');
      exit();
    }
  } else {
    $_SESSION['flash_message'] = "<p style='color: red;'>Please fill in all login fields.</p>";
    header('Location: Scrypt.php');
    exit();
  }
}
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

  <style>
    .flash-message {
      margin: 10px 0;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
      text-align: center;
    }
  </style>
  <script>
    window.isLoggedIn = <?= isset($_SESSION['user_name']) ? 'true' : 'false' ?>;
  </script>
<script src="Main.js"></script>
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
		<a href="#" class="head language-button"><p>Log in/Sign up</p><img src="img/Enter.png" alt="Enter" width="22px" class="iconR"></a>
	</div>
</header>

<?php if (!isset($_SESSION['user_id'])): ?>
  <div id="login-warning">
  You won't be able to do most things unless you log in.
  <button onclick="location.href='Scrypt.php#login-form'" class="login-button">Log in/ Sign up </button>
  </div>
<?php endif; ?>

<div class="container">
  <?php if (!isset($_SESSION['user_id'])): ?>

  <?php if (!empty($message)) echo "<div class='flash-message'>$message</div>"; ?>

  <div class="form-box" id="login-form">
    <h2>Log In</h2>
    <form method="post">
      <input type="text" name="login_name" placeholder="Login" required>
      <input type="password" name="login_password" placeholder="Password" required>
      <input type="submit" name="login" value="Log In">
    </form>
  </div>

  <div class="form-box">
    <h2>Sign Up</h2>
    <form method="post">
      <input type="text" name="first_name" placeholder="Name" required>
      <input type="text" name="last_name" placeholder="Last Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="login" placeholder="Login" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="register" value="Sign Up">
    </form>
  </div>
  <?php else: ?>
    <p>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>!</p>
    <a href="Main.php">Go to catalog</a><br><br>
    <a href="Scrypt.php?action=logout">Log out</a>
  <?php endif; ?>
</div>
</body>
</html>
