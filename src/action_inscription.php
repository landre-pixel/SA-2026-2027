
<?php
session_start();

require("fonctions.php");

if (isset($_POST["login"], $_POST["password"], $_POST["password_confirm"])) {
    $login = $_POST["login"];

    if (!filter_var($login,FILTER_VALIDATE_EMAIL)) {
        header("Location: inscription.php?error=caracteres");
        exit();
    }

    if (!preg_match("/^[a-zA-Z0-9!@#$%&*_-]{8,50}$/", $_POST["password"])) {
        header("Location: inscription.php?error=5");
        exit();
    }
    $password = md5($_POST["password"]);
    $password_confirm = md5($_POST["password_confirm"]);

    if ($password != $password_confirm) {
        header("Location: inscription.php?error=1");
        exit;
    } else {
        if ($login == "adminweb" || $login == "adminsys") {
            header("Location: inscription.php?error=2");
            exit;
        }

        $connexion = connecter("localhost", "sae26_user", "password");

        if ($connexion) {
            $base = 'sae26';
            $table = 'users';
            $db = mysqli_select_db($connexion, $base);

            if ($db) {
                $sql = "SELECT * FROM $table WHERE login = ?";
                $stmt = mysqli_prepare($connexion, $sql);
                mysqli_stmt_bind_param($stmt, "s", $login);
                mysqli_stmt_execute($stmt);

                $resultat = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($resultat) > 0) {
                    mysqli_stmt_close($stmt);
                    deconnecter($connexion);
                    header("Location: inscription.php?error=2");
                    exit;
                } else {
                    mysqli_stmt_close($stmt);

                    $role = "joueur";

                    $sql2 = "INSERT INTO $table (login, passwd, role) VALUES (?, ?, ?)";
                    $stmt2 = mysqli_prepare($connexion, $sql2);
                    mysqli_stmt_bind_param($stmt2, "sss", $login, $password, $role);
                    $resultat2 = mysqli_stmt_execute($stmt2);

                    if ($resultat2) {
                        session_regenerate_id(true);

                        $_SESSION["login"] = $login;
                        $_SESSION["role"] = $role;

                        mysqli_stmt_close($stmt2);
                        deconnecter($connexion);

                        header("Location: profil.php");
                        exit;
                    } else {
                        mysqli_stmt_close($stmt2);
                        deconnecter($connexion);
                        header("Location: inscription.php?error=3");
                        exit;
                    }
                }
            } else {
                deconnecter($connexion);
                header("Location: inscription.php?error=3");
                exit;
            }
        } else {
            header("Location: inscription.php?error=3");
            exit;
        }
    }
} else {
    header("Location: inscription.php?error=4");
    exit;
}
?>
