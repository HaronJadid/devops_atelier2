<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord - Gestion École</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        .header { background: #2c3e50; color: white; padding: 20px; border-radius: 5px; }
        .menu { margin: 20px 0; }
        .menu a { display: inline-block; margin: 0 10px; padding: 10px 20px; background: #3498db; color: white; text-decoration: none; border-radius: 3px; }
        .stats { display: flex; gap: 20px; margin: 20px 0; }
        .stat-card { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex: 1; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Tableau de Bord - Gestion École</h1>
        <p>Bienvenue, <?php echo $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']; ?> (<?php echo $_SESSION['user_type']; ?>)</p>
        <a href="?action=logout" style="color: white;">Déconnexion</a>
    </div>

    <div class="menu">
        <a href="Etudiant/affichage.php">Gestion des Étudiants</a>
        <a href="Prof/affichage.php">Gestion des Professeurs</a>
    </div>

    <div class="stats">
        <div class="stat-card">
            <h3>Étudiants</h3>
            <p>Gérer la liste des étudiants</p>
        </div>
        <div class="stat-card">
            <h3>Professeurs</h3>
            <p>Gérer la liste des professeurs</p>
        </div>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 3px; margin: 10px 0;">
            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>
</body>
</html>