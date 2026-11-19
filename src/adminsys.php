<?php
session_start();

if (!isset($_SESSION["login"]) || $_SESSION["role"] != "adminsys") {
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
    <a class="logo" href="../../index.php">
        <img class="logo-image" src="../img/logo.png" alt="Logo SmartGames">
        <span>SmartGames</span>
    </a>

    <nav>
        <a href="../../index.php">Accueil</a>
        <a class="actif" href="jeux.php">Jeux</a>
        <a class="bouton bouton-secondaire" href="deconnexion.php">Déconnexion</a>
        <a class="bouton bouton-profil" href="profil.php">Profil</a>
    </nav>
</header>

<main class="main">
    <h1 class="titre">Bonjour, adminsys</h1>
</main>

</body>
</html>
