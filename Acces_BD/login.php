<?php
require_once 'connexion.php';

class LoginModel {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function authenticate($email, $password) {
        // Simulation d'authentification - À adapter avec votre logique métier
        $conn = $this->db->connect();
        
        // Vérifier dans la table Prof
        $stmt = $conn->prepare("SELECT * FROM Prof WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Ici, vous devriez vérifier le mot de passe haché
            return ['type' => 'professeur', 'user' => $user];
        }
        
        // Vérifier dans la table Etudiant
        $stmt = $conn->prepare("SELECT * FROM Etudiant WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return ['type' => 'etudiant', 'user' => $user];
        }
        
        $this->db->close();
        return false;
    }
    
    public function logout() {
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}
?>