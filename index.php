<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - SmartGames</title>
    <link rel="stylesheet" href="site_web/css/style.css">
</head>
<body>
<header class="entete">
    <a class="logo" href="index.php">
        <img class="logo-image" src="site_web/img/logo.png" alt="Logo SmartGames">
        <span>SmartGames</span>
    </a>

    <nav>
        <a class="actif" href="index.php">Accueil</a>
        <a href="#jeux">Jeux</a>
      <?php
      if (isset($_SESSION['login'])) {
        echo "<a class='bouton bouton-secondaire' href='site_web/src/deconnexion.php'>Déconnexion</a>
        <a class='bouton bouton-profil' href='site_web/src/profil.php'>Profil</a>";
      } else {
        echo "<a class='bouton bouton-secondaire' href='site_web/src/connexion.php'>Connexion</a>
        <a class='bouton bouton-profil' href='site_web/src/connexion.php'>Profil</a>";
      } ?>

    </nav>

</header>

<main>
    <section class="hero">
        <div>
            <p class="sur-titre">Plateforme de jeux et de défis</p>
            <h1>Apprendre en relevant des défis.</h1>

            <p class="texte-intro">
                SmartGames est une plateforme qui regroupe différents jeux et défis.
                Connectez-vous pour accéder à votre espace joueur et découvrir les modules disponibles.
            </p>

            <div class="actions">
              <?php
              if (isset($_SESSION['login'])) {
                echo "<a class='bouton bouton-primaire' href='site_web/src/jeux.php'>Jouer</a>";
              } else {
                echo "<a class='bouton bouton-primaire' href='site_web/src/connexion.php'>Se connecter pour jouer</a>";
              }
              ?>
              <a class="lien-simple" href="#jeux">Découvrir les jeux</a>
            </div>
        </div>
    </section>

    <?php
    if (!isset($_SESSION['login'])) {
      echo "<section class='presentation'>
        <article>
            <span class='numero'>01</span>
            <h2>Connectez-vous</h2>
            <p>Accédez à votre espace joueur pour retrouver les modules de la plateforme.</p>
        </article>

        <article>
            <span class='numero'>02</span>
            <h2>Choisissez un jeu</h2>
            <p>Parcourez les jeux disponibles et sélectionnez celui qui vous intéresse.</p>
        </article>

        <article>
            <span class='numero'>03</span>
            <h2>Participez</h2>
            <p>Lancez un jeu, relevez les défis et consultez les résultats.</p>
        </article>
        </section>";
      }
    ?>

    <section class="section-jeux" id="jeux">
        <div class="titre-section">
            <div>
                <p class="sur-titre">Les modules disponibles</p>
                <h2><?php if (isset($_SESSION['login'])) { echo "Bienvenue " . $_SESSION['login']. ", ";}?>Choisissez votre jeu</h2>
            </div>
          <?php
          if (!isset($_SESSION['login'])) {
            echo "<p class='info-acces'>Connexion joueur requise</p>";
          }
          ?>

        </div>

        <div class="grille-jeux">
            <article class="carte-jeu couleur-bleue">
                <div class="icone-jeu">1</div>
                <p class="type-jeu">Module 1</p>
                <h3>Jeu 1</h3>
                <p>Contenu du module à définir.</p>
                <?php
                if (isset($_SESSION['login'])) {
                  echo "<a href='site_web/src/jeux.php'>Accéder au jeu <span>→</span></a>";
                } else {
                  echo "<a href='site_web/src/connexion.php'>Accéder au jeu <span>→</span></a>";
                }
                ?>
            </article>

            <article class="carte-jeu couleur-jaune">
                <div class="icone-jeu">2</div>
                <p class="type-jeu">Module 2</p>
                <h3>Jeu 2</h3>
                <p>Contenu du module à définir.</p>
                <?php
                if (isset($_SESSION['login'])) {
                  echo "<a href='site_web/src/jeux.php'>Accéder au jeu <span>→</span></a>";
                } else {
                  echo "<a href='site_web/src/connexion.php'>Accéder au jeu <span>→</span></a>";
                }
                ?>
            </article>

            <article class="carte-jeu couleur-rose">
                <div class="icone-jeu">3</div>
                <p class="type-jeu">Module 3</p>
                <h3>Jeu 3</h3>
                <p>Contenu du module à définir.</p>
                <?php
                if (isset($_SESSION['login'])) {
                  echo "<a href='site_web/src/jeux.php'>Accéder au jeu <span>→</span></a>";
                } else {
                  echo "<a href='site_web/src/connexion.php'>Accéder au jeu <span>→</span></a>";
                }
                ?>
            </article>
        </div>
    </section>
</main>

<footer>
    <p>SmartGames - SAE 3 BUT Informatique</p>
    <?php
    if (isset($_SESSION['login'])) {
        echo "<a href='site_web/src/profil.php'>Espace joueur</a>";
    } else {
        echo "<a href='site_web/src/connexion.php'>Espace joueur</a>";
    }
    ?>
</footer>
</body>
</html>
