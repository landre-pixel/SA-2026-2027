<?php
session_start();

if (!isset($_SESSION["login"]) ||
        !isset($_SESSION["role"]) ||
        ($_SESSION["role"] != "joueur" &&
                $_SESSION["role"] != "adminweb" &&
                $_SESSION["role"] != "adminsys")) {
    header("Location: connexion.php");
    exit();
}
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
    <a class="logo" href="../index.php">
        <img class="logo-image" src="../img/logo.png" alt="Logo SmartGames">
        <span>SmartGames</span>
    </a>

    <nav>
        <a href="../index.php">Accueil</a>
        <a class="actif" href="../../index.php#jeux">Jeux</a>
        <a class="bouton bouton-secondaire" href="deconnexion.php">Déconnexion</a>
        <a class="bouton bouton-profil" href="profil.php">Profil</a>
    </nav>
</header>

<main class="module">
    <div class="fil-ariane">
        <a href="../../index.php">Accueil</a>
        <span>/</span>
        Jeu 1
    </div>

    <section class="bandeau-module">
        <p class="sur-titre">Module de jeu</p>
        <h1>Jeu 1</h1>
        <p>
            Bienvenue dans ce module de la plateforme SmartGames.
            Le contenu et les règles seront définis ultérieurement.
        </p>
    </section>

    <section class="zone-jeu">
        <div class="titre-zone-jeu">
            <div>
                <p class="sur-titre">Espace de jeu</p>
                <h2>Zone de jeu</h2>
            </div>

            <span class="statut-module">Module de démonstration</span>
        </div>

        <div class="plateau-jeu">
            <h3>Contenu du jeu à définir</h3>
            <p>
                Cette zone accueillera l'interface du jeu choisi :
                plateau, énigme, quiz ou autre activité.
            </p>
        </div>

        <div class="actions-jeu">
            <a class="bouton bouton-primaire" href="#resultat">Lancer le jeu</a>
            <a class="bouton bouton-secondaire" href="../../index.php">Quitter le jeu</a>
        </div>
    </section>

    <section class="resultat" id="resultat">
        <span class="resultat-icone">✓</span>

        <div>
            <p class="sur-titre">Résultat fictif</p>
            <h2>Fin de la partie</h2>
            <p>Cette zone présentera le résultat lorsque le jeu sera développé.</p>
        </div>


    </section>
</main>

<footer>
    <p>SmartGames - SAE 3 BUT Informatique</p>
    
</footer>
</body>
</html>
