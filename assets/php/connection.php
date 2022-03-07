<?php

use Model\DB;

include "functions.php";
require "../../Model/DB.php";

if (isset($_POST["email"], $_POST["password"])) {
    $bdd = DB::getInstance();

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    // I get the name of the user
    $stmt = $bdd->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $user = $stmt->fetch();
    // I check that the password encrypted on my database that I retrieved using the '$ user [' password ']' loop corresponds to the password entered by the user
    if (password_verify($password, $user['password'])) {
        // If the 2 mdp correspond then we open the session and we store the user's data in a session.
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['role_fk'] = $user['role_fk'];

        header("Location: ../../index.php");
    }
    else {
        header("Location: ../../View/connection.php?error=2");
    }
}
else {
    header("Location: ../../View/connection.php?error=3");
}