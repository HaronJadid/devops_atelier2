<?php
require_once 'connexion.php';

// Récupérer tous les professeurs
function getAllProfesseurs() {
    $conn = Connect();
    $stmt = $conn->query("SELECT * FROM prof");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter un professeur
function ajouterProfesseur($code, $nom, $prenom, $email, $langues, $specialite) {
    $conn = Connect();
    $stmt = $conn->prepare("INSERT INTO prof (code, nom, prenom, email, langues, specialite)
                            VALUES (:code, :nom, :prenom, :email, :langues, :specialite)");
    $stmt->execute([
        ':code' => $code,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':langues' => $langues,
        ':specialite' => $specialite
    ]);
}

// Supprimer un professeur
function supprimerProfesseur($id) {
    $conn = Connect();
    $stmt = $conn->prepare("DELETE FROM prof WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
?>
