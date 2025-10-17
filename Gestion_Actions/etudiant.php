<?php
require_once '../Acces_BD/Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
        ajouterEtudiant($_POST['code'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['sexe'], $_POST['filiere']);
        header("Location: ../IHM/Etudiant/affichage.php");
    } elseif (isset($_POST['supprimer'])) {
        supprimerEtudiant($_POST['id']);
        header("Location: ../IHM/Etudiant/affichage.php");
    }
}
?>
