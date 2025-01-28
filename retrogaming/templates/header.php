<?php
// If the session is active or not
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Retrieving URLs in PHP
if (!defined('BASE_URL')) {
    define('BASE_URL', '/retrogaming/');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------Site Title------------>
    <title>Blog Rétrogaming</title>

    <!--------Fonts Google---------->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Orbitron:wght@400..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <!--------Bootstrap Links-------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--------CDN Fontawesom-------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-------Style css Pages------->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/styleblog.css">

    <!--------Gamepad Favicon------->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL; ?>public/assets/img/gamepad.png">
</head>

<body>

<header>

    <!----------Navigation-------->
    <nav class="navbar">
        <?php 
        // // Get current page
        $currentAction = isset($_GET['action']) ? $_GET['action'] : 'index'; 
        ?>
        
            <!------------If disconnected------------->

            <!----------Title site width logo--------->
            <?php if (!isset($_SESSION['name'])): ?>
            <div class="logo-deco site-tile my-1">
                <a><i class="me-2 fa-solid fa-headset"></i>Rétrogaming</a>
            </div>

            <!----------Links for visitors----------->
            <?php if ($currentAction !== 'index'): ?>
                <div class="logo-deco nav-left">
                    <a href="<?php echo BASE_URL; ?>public/index.php?action=index">
                        <i class="me-2 fas fa-home"></i>Accueil
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($currentAction !== 'viewConsoleArticle'): ?>
                <div class="logo-deco nav-left">
                    <a href="<?php echo BASE_URL; ?>public/index.php?action=viewConsoleArticle&id=1">
                        <i class="me-2 fas fa-solid fa-gamepad"></i>Consoles
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($currentAction !== 'viewJeuxArticle'): ?>
                <div class="logo-deco nav-right">
                    <a href="<?php echo BASE_URL; ?>public/index.php?action=viewJeuxArticle&id=2">
                        <i class="me-2 fas fa-solid fa-dice"></i>Jeux
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

            <!------------If connected------------>
            <?php if (isset($_SESSION['name'])): ?>

            <!-------Title site width logo------->
            <div class="logo">
                <a>
                    <i class="me-2 fa-solid fa-headset"></i>Rétrogaming
                </a>
            </div>

            <!-----------Hamburger Menu--------->
            <div class="hamburger" onclick="toggleMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>

            <!----------Navigation Links------->
            <ul class="nav-links center-links" id="navLinks">
                <?php if ($currentAction !== 'index'): ?>
                    <li><a href="<?php echo BASE_URL; ?>public/index.php?action=index">Accueil</a></li>
                <?php endif; ?>
                <?php if ($currentAction !== 'viewConsoleArticle'): ?>
                    <li><a href="<?php echo BASE_URL; ?>public/index.php?action=viewConsoleArticle&id=1">Consoles</a></li>
                <?php endif; ?>
                <?php if ($currentAction !== 'viewJeuxArticle'): ?>
                    <li><a href="<?php echo BASE_URL; ?>public/index.php?action=viewJeuxArticle&id=2">Jeux</a></li>
                <?php endif; ?>
                <?php if ($currentAction !== 'viewPocketArticle'): ?>
                    <li><a href="<?php echo BASE_URL; ?>public/index.php?action=viewPocketArticle&id=3">Pocket</a></li>
                <?php endif; ?>
                <?php if ($currentAction !== 'viewGameplayArticle'): ?>
                    <li><a href="<?php echo BASE_URL; ?>public/index.php?action=viewGameplayArticle&id=4">GamePlay</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin' && $currentAction !== 'adminDashboard'): ?>
                    <li><a href="<?php echo BASE_URL; ?>public/index.php?action=adminDashboard">Admin</a></li>
                <?php endif; ?>

                <!--------Dropdown user-------->
                <li class="dropdown dropdown-click right-dropdown">

                    <!--------User Name-------->
                    <a href="#" class="dropbtn" onclick="toggleDropdown(this, event)">
                        <?php echo htmlspecialchars($_SESSION['name']); ?>
                        <i class="fa-solid fa-user"></i>
                    </a>

                    <!-----Dropdown Links----->
                    <div class="dropdown-content">
                        <a href="index.php?action=profile">Profil</a>
                        <a href="index.php?action=logout">Déconnexion</a>
                    </div>
                </li>
            </ul>
        <?php endif; ?>
    </nav>
</header>

<!----Scroll to Top Button---->
<a href="#" id="scroll-to-top" style="display: none;">⬆</a>