<?php
// IHM/accueil.php
session_start();

// Vérifier si l’utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php"); // redirection vers la page de login
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord  Gestion École</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>

    <!-- Inclure l’en-tête -->
    <?php include("public/header.php"); ?>

    <!-- Inclure la barre de navigation -->
    <?php include("public/nav_barre.php"); ?>

    <main>
        <h2>Tableau de bord</h2>
        <p>Bienvenue, <strong><?php echo $_SESSION['user']; ?></strong> 👋</p>

        <section class="dashboard">
            <div class="card">
                <h3>Gestion des Étudiants</h3>
                <p>Ajouter, modifier et afficher les étudiants.</p>
                <a href="Etudiant/affichage.php">Accéder</a>
            </div>

            <div class="card">
                <h3>Gestion des Professeurs</h3>
                <p>Ajouter, modifier et afficher les professeurs.</p>
                <a href="Prof/affichage.php">Accéder</a>
            </div>
        </section>
    </main>

    <!-- Inclure le pied de page -->
    <?php include("public/footer.php"); ?>

</body>
</html>
