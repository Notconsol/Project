<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Main.css">
  <title>Account</title>
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
</header>

<main class="profile-page"> 
  <?php if (isset($_SESSION['user_name'])): ?>
    <div class="container1">
      <div style="padding:20px;">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>!</h1><br>
        <p><strong>Email:</strong> <?= isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : 'Not available' ?></p><br>
        <p><strong>Joined on:</strong> <?= isset($_SESSION['user_join_date']) ? htmlspecialchars($_SESSION['user_join_date']) : 'Not available' ?></p><br>
      </div>
    <a href="../Scrypt.php?action=logout" class="login-button">Log out</a>
    </div>
  <?php else: ?>
    <p>You are not logged in. Please <a href="../Scrypt.php#login-form">log in</a> to view your profile.</p>
  <?php endif; ?>
</main>
</body>
</html>
