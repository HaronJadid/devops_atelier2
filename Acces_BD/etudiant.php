<?php
require_once 'connexion.php';

// Récupérer tous les étudiants
function getAllEtudiants() {
    $conn = Connect();
    $stmt = $conn->query("SELECT * FROM etudiant");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter un étudiant
function ajouterEtudiant($code, $nom, $prenom, $email, $sexe, $filiere) {
    $conn = Connect();
    $stmt = $conn->prepare("INSERT INTO etudiant (code, nom, prenom, email, sexe, filiere)
                            VALUES (:code, :nom, :prenom, :email, :sexe, :filiere)");
    $stmt->execute([
        ':code' => $code,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':sexe' => $sexe,
        ':filiere' => $filiere
    ]);
}

// Supprimer un étudiant
function supprimerEtudiant($id) {
    $conn = Connect();
    $stmt = $conn->prepare("DELETE FROM etudiant WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
?>
