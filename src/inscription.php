<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - SmartGames</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="page-connexion">
<header class="entete">
    <a class="logo" href="../../index.php">
        <img class="logo-image" src="../img/logo.png" alt="Logo SmartGames">
        <span>SmartGames</span>
    </a>

    <nav>
        <a href="../../index.php">Accueil</a>
        <a href="../../index.php#jeux">Jeux</a>
        <a class="bouton bouton-secondaire" href="connexion.php">Connexion</a>
    </nav>
</header>

<main class="zone-connexion">
    <section class="carte-connexion">
        <a class="retour" href="../../index.php">← Retour à l'accueil</a>

        <p class="sur-titre">Nouveau joueur</p>
        <h1>Créer un compte</h1>
        <p>Inscrivez-vous pour accéder aux jeux et sauvegarder votre progression.</p>

        <form action="action_inscription.php" method="post">
            <label for="nouvel-identifiant">Nom d'utilisateur</label>
            <input name="login" id="nouvel-identifiant" type="text" placeholder="ex. etudiant01" required>
            <p class="indication">
                3 à 20 caractères : lettres ( a-z, A-Z ), chiffres ( 0-9 ), tiret et underscore ( _ ).
            </p>

            <label for="mdp-inscription">Mot de passe</label>
            <input name="password" id="mdp-inscription" type="password" placeholder="Choisir un mot de passe" required>
            <p class="indication">
                8 à 50 caractères : lettres, chiffres et caractères spéciaux ! @ # $ % & * _ -
            </p>
            <label for="confirmation-inscription-mdp">Confirmer le mot de passe</label>
            <input name="password_confirm" id="confirmation-inscription-mdp" type="password" placeholder="Confirmer le mot de passe" required>

            <button class="bouton bouton-primaire bouton-large" type="submit">
              Créer mon compte
            </button>
        </form>


        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 1) {
                echo "<p class='error-message'> Erreur : les mots de passe ne correspondent pas.</p>";
            }
            if ($_GET['error'] == 2) {
                echo "<p class='error-message'> Erreur : ce nom d'utilisateur est déjà utilisé.</p>";
            }
            if ($_GET['error'] == 3) {
                echo "<p class='error-message'> Erreur : échec de la connexion à la base de données.</p>";
            }
            if ($_GET['error'] == 4) {
                echo "<p class='error-message'> Erreur : veuillez compléter le formulaire.</p>";
            }
            if ($_GET['error'] == "caracteres") {
                echo "<p class='error-message'> Erreur : caractères non autorisés ou longueur invalide.</p>";
            }
        }
        ?>


        <p class="lien-inscription">
            Vous avez déjà un compte ?
            <a href="connexion.php">Se connecter</a>
        </p>
    </section>


</main>

<footer>
    <p>SmartGames - SAE 3 BUT Informatique</p>

</footer>
</body>
</html>
