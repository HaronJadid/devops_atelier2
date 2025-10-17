<?php
// index.php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil  Gestion École</title>
    <link rel="stylesheet" href="IHM/public/style.css">
</head>
<body>

    <!-- Inclure l’en-tête -->
    <?php include("IHM/public/header.php"); ?>

    <!-- Inclure la barre de navigation -->
    <?php include("IHM/public/nav_barre.php"); ?>

    <main>
        <h2>Bienvenue dans l'application de gestion d'école</h2>
        
        <!-- Formulaire d’authentification -->
        <section class="auth-form">
            <h3>Connexion</h3>
            <form action="Acces_BD/login.php" method="POST">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required><br><br>

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required><br><br>

                <button type="submit">Se connecter</button>
            </form>
        </section>
    </main>

    <!-- Inclure le pied de page -->
    <?php include("IHM/public/footer.php"); ?>

</body>
</html>
