<?php

use Model\DB;

include "functions.php";
require "../../Model/DB.php";

if (isset($_POST["pseudo"], $_POST["email"], $_POST["password"])) {
    $bdd = DB::getInstance();

    $pseudo = sanitize($_POST["pseudo"]);
    $password = sanitize($_POST["password"]);
    $email = trim($_POST["email"]);

    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

    $requete = $bdd->prepare("SELECT * FROM user WHERE email = :email OR pseudo = :pseudo");
    $requete->bindParam(":email", $email);
    $requete->bindParam(":password", $password);    $state = $requete->execute();

    if ($state) {
        foreach ($requete->fetch() as $user) {
            $mailUse = $user['email'];
            $pseudoUse = $user['pseudo'];

            if ($mailUse === $email || $pseudoUse === $pseudo) {
                header("Location: ../../View/registration.php?error=0");
            }
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $maj = preg_match('@[A-Z]@', $password);
            $min = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if($maj && $min && $number && strlen($password) > 8) {
                // People who register automatically have role 2: user.
                $sql = "INSERT INTO user VALUES (null, '$pseudo', '$email', '$encryptedPassword', 2)";

                $bdd->exec($sql);
                header("Location: ../../View/connection.php?success=0");
            }
            else {
                header("Location: ../../View/registration.php?error=5");
            }

        }
        else {
            header("Location: ../../View/registration.php?error=1");
        }
    }
}
else {
    header("Location: ../../View/registration.php?error=4");
}