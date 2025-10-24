<?php
require_once '../Access_BD/etudiant.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiantModel = new EtudiantModel();
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $success = $etudiantModel->addEtudiant(
                    $_POST['code'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['email'],
                    $_POST['sexe'],
                    $_POST['filiere']
                );
                if ($success) {
                    $_SESSION['message'] = "Étudiant ajouté avec succès!";
                } else {
                    $_SESSION['error'] = "Erreur lors de l'ajout de l'étudiant";
                }
                break;
                
            case 'update':
                $success = $etudiantModel->updateEtudiant(
                    $_POST['id'],
                    $_POST['code'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['email'],
                    $_POST['sexe'],
                    $_POST['filiere']
                );
                if ($success) {
                    $_SESSION['message'] = "Étudiant modifié avec succès!";
                } else {
                    $_SESSION['error'] = "Erreur lors de la modification de l'étudiant";
                }
                break;
                
            case 'delete':
                $success = $etudiantModel->deleteEtudiant($_POST['id']);
                if ($success) {
                    $_SESSION['message'] = "Étudiant supprimé avec succès!";
                } else {
                    $_SESSION['error'] = "Erreur lors de la suppression de l'étudiant";
                }
                break;
        }
    }
    
    header("Location: ../IHM/Etudiant/affichage.php");
    exit();
}
?>