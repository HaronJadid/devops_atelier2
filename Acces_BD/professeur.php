<?php
require_once 'connexion.php';

class ProfessorModel {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllProfesseurs() {
        $conn = $this->db->connect();
        $result = $conn->query("SELECT * FROM Prof ORDER BY nom, prenom");
        $professeurs = [];
        
        while ($row = $result->fetch_assoc()) {
            $professeurs[] = $row;
        }
        
        $this->db->close();
        return $professeurs;
    }
    
    public function getProfesseurById($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM Prof WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $professeur = $result->fetch_assoc();
        
        $this->db->close();
        return $professeur;
    }
    
    public function addProfesseur($code, $nom, $prenom, $email, $langues, $specialite) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("INSERT INTO Prof (code, nom, prenom, email, langues, specialite) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $code, $nom, $prenom, $email, $langues, $specialite);
        $success = $stmt->execute();
        
        $this->db->close();
        return $success;
    }
    
    public function updateProfesseur($id, $code, $nom, $prenom, $email, $langues, $specialite) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("UPDATE Prof SET code=?, nom=?, prenom=?, email=?, langues=?, specialite=? WHERE id=?");
        $stmt->bind_param("ssssssi", $code, $nom, $prenom, $email, $langues, $specialite, $id);
        $success = $stmt->execute();
        
        $this->db->close();
        return $success;
    }
    
    public function deleteProfesseur($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("DELETE FROM Prof WHERE id = ?");
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        
        $this->db->close();
        return $success;
    }
}
?>