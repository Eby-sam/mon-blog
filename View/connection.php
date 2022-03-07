<?php
session_start();
$title = "Connexion";

include '_Partials/header.php';

$return = "";
$id = "";

if (isset($_GET['error'])){
    $id = "error";
    switch ($_GET['error']){
        case '0':
            $return = "Aucun compte associé à cette email ou ce mot de passe";
            break;
        case '2':
            $return = "Aucun compte associé à cette email ou ce mot de passe";
            break;
        case '3':
            $return = "Problème de connexion.";
            break;
    }
}
elseif (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Vous êtes bien inscrit(e) !";
            break;
    }
}
?>
    <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
    <main class="flexColumn">
        <form method="post" action="../assets/php/connection.php" >
            <h1 class="colorRed">Connexion</h1>
            <label for="emailConnection" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailConnection" name="email" required>
            <label for="passwordConnection" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="passwordConnection" name="password" required>
            <input type="submit" id="submit" class="btn btn-danger" value="Se connecter">
        </form>
    </main>
<?php

include '_Partials/footer.php';
