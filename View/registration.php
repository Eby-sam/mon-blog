<?php
session_start();
$title = "Inscription";

include '_Partials/header.php';

$return = "";
$id = "";

if (isset($_GET['error'])){
    $id = "error";
    switch ($_GET['error']){
        case '0':
            $return = "Email ou pseudo deja utilisé !";
            break;
        case '1':
            $return = "L'email n'est pas valide !";
            break;
        case '4':
            $return = "Problème d'inscription.";
            break;
        case '5':
            $return = "Le mot de passe ne contient pas de majuscule ou de chiffres ou de minuscule ou plus petit que 8 caractères";
            break;
    }
}
?>

    <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
    <main class="flexColumn">
        <form method="post" action="../assets/php/registration.php">
            <h1 class="colorRed">Inscription</h1>
            <label for="usernameRegistration" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="usernameRegistration" name="pseudo" required>
            <label for="emailRegistration" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="emailRegistration" name="email" required>
            <label for="passwordConnection" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="passwordConnection" name="password" required>
            <p class="colorRed password">Le mot de passe doit contenir: majuscule, minuscule, chiffre, caractère spéciale, avoir minimun 8 caractères.</p>
            <input type="submit" id="submit" class="btn btn-danger" value="S'inscrire">
        </form>
    </main>

<?php

include '_Partials/footer.php';
