<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon Blog</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div>
    <h1 class="home">Blog Game World</h1>
</div>
<?php

use App\Controller\AbstractController;
use App\Controller\UserController;
use App\Model\Entity\Role;

// error messages.
if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);

    foreach ($errors as $error) { ?>
        <div class="alert alert-error"><?= $error ?></div> <?php
    }
}

//success messages.
if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
    ?>
    <div class="alert alert-success"><?= $message ?></div> <?php
}
?>
<header>
    <nav class="menu">
        <i class="fas fa-bars"></i>
        <ul>
            <?php
            if (!UserController::verifyUserConnect()) { ?>
                <li><a href="/index.php?c=home">Home</a></li>
                <li><a href="/index.php?c=user&a=register">S'enregistrer</a></li>
                <li><a href="/index.php?c=user&a=connected">Se Connecter</a></li><?php
            } else { ?>
                <li><a href="/index.php?c=home">Home</a></li>
                <li><a href="/index.php?c=article&a=list-article">Articles</a></li>
                <li><a href="/index.php?c=article&a=add-article">Ajouter un article</a></li>
                <li><a href="/index.php?c=user" title="Utilisateurs">Utilisateurs</a></li>
                <li><a href="/index.php?c=user&a=disconnected">Se déconnecter</a></li><?php
            }
            ?>



        </ul>
    </nav>
</header>

<main class="container">
    <?= $html ?>
</main>

<script src="https://kit.fontawesome.com/6167e09880.js" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>

