<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: connexion.php");
    exit();
}

$login = htmlspecialchars($_SESSION["login"], ENT_QUOTES, "UTF-8");

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jeu 1 - SmartGames</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="entete">
  <a class="logo" href="../../index.php">
    <img class="logo-image" src="../img/logo.png" alt="Logo SmartGames">
    <span>SmartGames</span>
  </a>

  <nav>
    <a href="../../index.php">Accueil</a>
    <a href="jeux.php">Jeux</a>
    <a class="bouton bouton-secondaire" href="deconnexion.php">Déconnexion</a>
    <a class="bouton bouton-profil" href="profil.php">Profil</a>
  </nav>
</header>

<main class="page-profil">
    <div class="fil-ariane">
        <a href="../../index.php">Accueil</a>
        <span>/</span>
        Profil
    </div>

    <section class="banniere-profil">
        <div class="avatar-profil">E</div>

        <div>
            <p class="sur-titre">Espace joueur</p>
            <h1>Bonjour <?php echo $login; ?> !</h1>
            <p>Prêt à relever un nouveau défi sur SmartGames ?</p>
        </div>
    </section>

    <section class="statistiques">
        <article>
            <strong>3</strong>
            <span>Jeux disponibles</span>
        </article>

        <article>
            <strong>2</strong>
            <span>Parties terminées</span>
        </article>

        <article>
            <strong>1</strong>
            <span>Jeu en cours</span>
        </article>
    </section>

    <div class="contenu-profil">
        <section class="carte-profil carte-informations">
            <div class="titre-carte">
                <h2>Mes informations</h2>
                <span class="badge-joueur">Joueur inscrit</span>
            </div>

            <dl>
                <div>
                    <dt>Nom d'utilisateur</dt>
                    <dd><?php echo $login;?></dd>
                </div>

                <div>
                    <dt>Inscription</dt>
                    <dd><?php
                        $mois = [
                                1 => "Janvier", 2 => "Février", 3 => "Mars",
                                4 => "Avril", 5 => "Mai", 6 => "Juin",
                                7 => "Juillet", 8 => "Août", 9 => "Septembre",
                                10 => "Octobre", 11 => "Novembre", 12 => "Décembre"
                        ];

                        echo $mois[(int)date("n")] . " " . date("Y");
                        ?></dd>
                </div>
            </dl>
        </section>

        <section class="carte-profil carte-securite">
            <h2>Sécurité du compte</h2>
            <p>Votre mot de passe peut être modifié à tout moment.</p>
            <a class="bouton bouton-profil" href="#mot-de-passe">
                Modifier mon mot de passe
            </a>
        </section>

        <section class="carte-profil jeux-recents">
            <div class="titre-carte">
                <h2>Jeux récemment joués</h2>
                <a href="../../index.php#jeux">Voir les jeux</a>
            </div>

            <article class="ligne-jeu">
                <span class="pastille pastille-bleue">1</span>
                <div>
                    <strong>Jeu 1</strong>
                    <small>Dernière partie : aujourd'hui</small>
                </div>
                <span class="etat etat-cours">En cours</span>
            </article>

            <article class="ligne-jeu">
                <span class="pastille pastille-jaune">2</span>
                <div>
                    <strong>Jeu 2</strong>
                    <small>Dernière partie : hier</small>
                </div>
                <span class="etat etat-termine">Terminé</span>
            </article>

            <article class="ligne-jeu">
                <span class="pastille pastille-rose">3</span>
                <div>
                    <strong>Jeu 3</strong>
                    <small>Aucune partie commencée</small>
                </div>
                <span class="etat etat-nouveau">Nouveau</span>
            </article>
        </section>

        <section class="carte-profil modification-mdp" id="mdp">
            <h2>Modifier mon mot de passe</h2>
            <p>Pour sécuriser votre compte, saisissez votre nouveau mot de passe.</p>
            <?php
            if (isset($_GET['error'])) {
                echo '<p style="color: red;">Erreur : ';
                if ($_GET['error'] == 1) echo 'Les mots de passe ne correspondent pas.';
                else echo 'Une erreur est survenue lors de la modification.';
                echo '</p>';
            }
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<p style="color: green;" id="confirmation">Mot de passe modifié avec succès !</p>';
            }
            ?>

            <form action="update_passwd.php" method="POST">
                <label for="nouveau-mdp">Nouveau mot de passe</label>
                <input id="nouveau-mdp" type="password" name="password" placeholder="Nouveau mot de passe" required>
                <label for="confirmation-mdp">Confirmer le nouveau mot de passe</label>
                <input id="confirmation-mdp" type="password" name="password_confirm" placeholder="Confirmer le mot de passe" required>

                <button class="bouton bouton-primaire bouton-large" type="submit">
                    Enregistrer les modifications
                </button>
            </form>
        </section> 
    </div>
</main>

<footer>
    <p>SmartGames - SAE 3 BUT Informatique</p>
    
</footer>
</body>
</html>
