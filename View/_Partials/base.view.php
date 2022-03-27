<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<header>
    <div id="menuTitle">
        <h1 id="titleSite">Eval Blog de SamSam</h1>
    </div>

    <div id="menuLink" class="flexRow">
        <a id="home" class="menu" href="../../index.php"><i class="fab fa-fort-awesome"></i></a>
        <a class="menu" href="../../index.php?controller=articles"><i class="fas fa-scroll"></i></a>
        <?php
        if (isset($_SESSION["id"])) {
            ?>
            <p class="menu" id="pseudo"><i class="fas fa-user-circle"></i><?= $_SESSION["pseudo"]?></p>
            <a class="menu colorRed" href="../../assets/php/disconnection.php"><i class="fas fa-sign-out-alt"></i></a>
            <?php
        }
        else {
            ?>
            <a class="menu" href="../../View/connection.php">Connexion</a>
            <a class="menu" href="../../View/registration.php">Inscription</a>
            <?php
        }
        ?>
    </div>

</header>

<?= $html ?>

<footer class="flexCenter flexColumn">
    <p class="colorWhite size18">par ici :</p>
    <div class="flexRow co">
        <a href="#"><i class="fab fa-facebook-square linkSocial"></i></a>

        <a href="#"><i class="fab fa-instagram-square linkSocial"></i></a>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="/assets/app.js"></script>
</body>
</html>