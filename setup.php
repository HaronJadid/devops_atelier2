<?php
// setup.php - Script d'initialisation de la base de données
echo "=== Initialisation de la Base de Données Gestion École ===\n\n";

try {
    require_once 'Access_BD/connexion.php';
    
    echo "🔍 Vérification de la connexion MySQL...\n";
    $database = new Database();
    $conn = $database->connect();
    echo "✅ Connexion MySQL réussie\n\n";
    
    echo "🔍 Vérification de la base de données...\n";
    $result = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'gestion_ecole'");
    
    if ($result->num_rows == 0) {
        echo "📦 Création de la base de données...\n";
        $database->initializeDatabase();
        echo "✅ Base de données 'gestion_ecole' créée avec succès!\n";
        echo "✅ Tables 'Etudiant' et 'Prof' créées\n";
        echo "✅ Données d'exemple insérées\n";
    } else {
        echo "ℹ️  Base de données 'gestion_ecole' existe déjà\n";
        
        // Vérifier si les tables existent
        $tables = ['Etudiant', 'Prof'];
        foreach ($tables as $table) {
            $result = $conn->query("SHOW TABLES LIKE '$table'");
            if ($result->num_rows == 0) {
                echo "📦 Table '$table' manquante, recréation...\n";
                $database->initializeDatabase();
                break;
            }
        }
        echo "✅ Structure vérifiée\n";
    }
    
    // Afficher les statistiques
    echo "\n📊 Statistiques de la base de données:\n";
    $result = $conn->query("SELECT COUNT(*) as count FROM Etudiant");
    $countEtudiants = $result->fetch_assoc()['count'];
    echo "👨‍🎓 Étudiants: $countEtudiants\n";
    
    $result = $conn->query("SELECT COUNT(*) as count FROM Prof");
    $countProfesseurs = $result->fetch_assoc()['count'];
    echo "👨‍🏫 Professeurs: $countProfesseurs\n";
    
    $database->close();
    
    echo "\n🎉 Initialisation terminée avec succès!\n";
    echo "🌐 Vous pouvez maintenant démarrer le serveur: php -S localhost:8000\n";
    
} catch (Exception $e) {
    echo "❌ Erreur: " . $e->getMessage() . "\n\n";
    echo "🔧 Solutions possibles:\n";
    echo "1. Vérifiez que MySQL est démarré\n";
    echo "2. Vérifiez les paramètres dans Access_BD/.env\n";
    echo "3. Vérifiez que l'utilisateur MySQL a les droits nécessaires\n";
    exit(1);
}
?>