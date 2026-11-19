
<?php
session_start();
require("fonctions.php");

if (isset($_POST["login"], $_POST["password"])) {
    $login = $_POST["login"];

    $password = md5($_POST["password"]);

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
                $row = mysqli_fetch_assoc($resultat);

                if ($password == $row["passwd"]) {
                    session_regenerate_id(true);

                    $_SESSION["login"] = $row["login"];
                    $_SESSION["role"] = $row["role"];   


                    mysqli_stmt_close($stmt);
                    deconnecter($connexion);
		    if ($login == "adminsys") {
                        header("Location: adminsys.php");
                        exit();
                    }
                    header("Location: profil.php");
                    exit();

                } else {
                    mysqli_stmt_close($stmt);
                    deconnecter($connexion);
                    header("Location: connexion.php?error=1");
                    exit();
                }
            } else {
                mysqli_stmt_close($stmt);
                deconnecter($connexion);
                header("Location: connexion.php?error=1");
                exit();
            }
        } else {
            deconnecter($connexion);
            header("Location: connexion.php?error=3");
            exit();
        }
    } else {
        header("Location: connexion.php?error=3");
        exit();
    }

} else {
    header("Location: connexion.php?error=2");
    exit();
}
?>
