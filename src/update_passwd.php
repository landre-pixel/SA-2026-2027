<?php
session_start();

require("fonctions.php");

if (!isset($_SESSION["login"])) {
    header("Location: connexion.php");
    exit();
}

if (isset($_POST["password"], $_POST["password_confirm"])) {
    $login = $_SESSION["login"];
    $new_password = md5($_POST["password"]);
    $password_confirm = md5($_POST["password_confirm"]);

    if ($new_password != $password_confirm) {
        header("Location: profil.php?error=1#mdp");
        exit;
    }

    $connexion = connecter("localhost", "sae26_user", "password");

    if ($connexion) {
        $base = 'sae26';
        $table = 'users';
        $db = mysqli_select_db($connexion, $base);

        if ($db) {
            $sql = "UPDATE $table SET passwd = ? WHERE login = ?";
            $stmt = mysqli_prepare($connexion, $sql);
            
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $new_password, $login);
                $execute = mysqli_stmt_execute($stmt);

                if ($execute) {
                    mysqli_stmt_close($stmt);
                    deconnecter($connexion);
                    header("Location: profil.php?success=1");
                    exit;
                } else {
                    mysqli_stmt_close($stmt);
                    deconnecter($connexion);
                    header("Location: profil.php?error=2#mdp");
                    exit;
                }
            } else {
                deconnecter($connexion);
                header("Location: profil.php?error=3#mdp");
                exit;
            }
        } else {
            deconnecter($connexion);
            header("Location: profil.php?error=4#mdp");
            exit;
        }
    } else {
        header("Location: profil.php?error=5#mdp");
        exit;
    }
} else {
    header("Location: profil.php");
    exit;
}
?>
