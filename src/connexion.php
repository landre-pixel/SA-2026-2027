<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SmartGames</title>
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
    </nav>
</header>

<main class="zone-connexion">
    <section class="carte-connexion">


        <p class="sur-titre">Espace joueur</p>
        <h1>Bienvenue !</h1>
        <p>Connectez-vous pour accéder aux jeux et reprendre vos défis.</p>

      <?php
      echo "<form action='action_connexion.php' method='post'>
            <label for='identifiant'>Identifiant</label>
            <input name= 'login' id='identifiant' type='text' placeholder='ex. etudiant01' required>

            <label for='mot-de-passe'>Mot de passe</label>
            <input name='password' id='mot-de-passe' type='password' placeholder='Votre mot de passe' required>

            <button class='bouton bouton-primaire bouton-large' type='submit'>
                Se connecter
            </button>
        </form>";

          if (isset($_GET['error'])) {
            if ($_GET['error'] == 1) {
              echo "<p class='error-message'> Erreur : login ou mot de passe incorrect";
            }
            if ($_GET['error'] == 2) {
              echo "<p class='error-message'> Erreur :vous devez compléter le formulaire";
            }
            if ($_GET['error'] == 3) {
              echo "<p class='error-message'> Erreur : échec de la connexion à la base de données";
            }
          }
        ?>

        <p class="lien-inscription">
            Pas encore de compte ?
            <a href="inscription.php">Créer un compte</a>
        </p>

    </section>
</main>

<footer>
    <p>SmartGames - SAE 3 BUT Informatique</p>

</footer>
</body>
</html>
