<?php
session_start();

// Script de setup automatique de la base de données
try {
    require_once 'Access_BD/connexion.php';
    setupDatabase();
} catch (Exception $e) {
    $db_error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Gestion École</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        .login-container { max-width: 400px; margin: 100px auto; background: white; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="email"], input[type="password"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 3px; }
        button { background: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; }
        .error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 3px; margin-bottom: 15px; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 3px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Connexion - Gestion École</h2>
        
        <?php if (isset($db_error)): ?>
            <div class="error">
                <strong>Erreur Base de Données:</strong> <?php echo $db_error; ?>
            </div>
        <?php else: ?>
            <div class="success">
                ✅ Base de données connectée avec succès
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="Gestion_Actions/login.php">
            <input type="hidden" name="action" value="login">
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit">Se connecter</button>
        </form>

        <div style="margin-top: 20px; font-size: 0.9em; color: #666;">
            <p><strong>Test avec les emails existants:</strong></p>
            <p>Professeurs: m.ghailani@email.com, s.lahlou@email.com</p>
            <p>Étudiants: karim.alami@email.com, fatima.benali@email.com</p>
            <p>Mot de passe:任意 (le système vérifie seulement l'email pour l'instant)</p>
        </div>
    </div>
</body>
</html>