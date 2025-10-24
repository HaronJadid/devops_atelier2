<?php
require_once 'connexion.php';

class EtudiantModel {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllEtudiants() {
        $conn = $this->db->connect();
        $result = $conn->query("SELECT * FROM Etudiant ORDER BY nom, prenom");
        $etudiants = [];
        
        while ($row = $result->fetch_assoc()) {
            $etudiants[] = $row;
        }
        
        $this->db->close();
        return $etudiants;
    }
    
    public function getEtudiantById($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM Etudiant WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $etudiant = $result->fetch_assoc();
        
        $this->db->close();
        return $etudiant;
    }
    
    public function addEtudiant($code, $nom, $prenom, $email, $sexe, $filiere) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("INSERT INTO Etudiant (code, nom, prenom, email, sexe, filiere) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $code, $nom, $prenom, $email, $sexe, $filiere);
        $success = $stmt->execute();
        
        $this->db->close();
        return $success;
    }
    
    public function updateEtudiant($id, $code, $nom, $prenom, $email, $sexe, $filiere) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("UPDATE Etudiant SET code=?, nom=?, prenom=?, email=?, sexe=?, filiere=? WHERE id=?");
        $stmt->bind_param("ssssssi", $code, $nom, $prenom, $email, $sexe, $filiere, $id);
        $success = $stmt->execute();
        
        $this->db->close();
        return $success;
    }
    
    public function deleteEtudiant($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("DELETE FROM Etudiant WHERE id = ?");
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        
        $this->db->close();
        return $success;
    }
}
?>