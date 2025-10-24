<?php
class Database {
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $port;
    private $conn;
    
    public function __construct() {
        $this->loadEnv();
    }
    
    private function loadEnv() {
        $envFile = __DIR__ . '/.env';
        
        if (!file_exists($envFile)) {
            throw new Exception("Fichier .env non trouvé dans Access_BD/");
        }
        
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            switch ($key) {
                case 'DB_HOST': $this->host = $value; break;
                case 'DB_USER': $this->user = $value; break;
                case 'DB_PASS': $this->pass = $value; break;
                case 'DB_NAME': $this->dbname = $value; break;
                case 'DB_PORT': $this->port = $value; break;
            }
        }
    }
    
    public function connect() {
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname, $this->port);
            
            if ($this->conn->connect_error) {
                throw new Exception("Erreur de connexion: " . $this->conn->connect_error);
            }
            
            $this->conn->set_charset("utf8");
            return $this->conn;
            
        } catch (Exception $e) {
            die("Erreur de base de données: " . $e->getMessage());
        }
    }
    
    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
    
    public function initializeDatabase() {
        $sqlFile = __DIR__ . '/BD/schema.sql';
        
        if (!file_exists($sqlFile)) {
            throw new Exception("Fichier SQL non trouvé: " . $sqlFile);
        }
        
        $sql = file_get_contents($sqlFile);
        $queries = array_filter(array_map('trim', explode(';', $sql)));
        
        foreach ($queries as $query) {
            if (!empty($query)) {
                if (!$this->conn->query($query)) {
                    throw new Exception("Erreur SQL: " . $this->conn->error);
                }
            }
        }
        return true;
    }
}

// Fonction utilitaire pour setup
function setupDatabase() {
    $database = new Database();
    $conn = $database->connect();
    
    // Vérifier si la base existe déjà
    $result = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'gestion_ecole'");
    if ($result->num_rows == 0) {
        $database->initializeDatabase();
        echo "✅ Base de données créée et peuplée avec succès!";
    } else {
        echo "✅ Base de données déjà existante.";
    }
    
    $database->close();
}
?>