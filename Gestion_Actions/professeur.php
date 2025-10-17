<?php
require_once '../Acces_BD/Professeur.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
        ajouterProfesseur($_POST['code'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['langues'], $_POST['specialite']);
        header("Location: ../IHM/Prof/affichage.php");
    } elseif (isset($_POST['supprimer'])) {
        supprimerProfesseur($_POST['id']);
        header("Location: ../IHM/Prof/affichage.php");
    }
}
?>
