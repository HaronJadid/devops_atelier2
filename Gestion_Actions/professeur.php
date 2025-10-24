<?php
require_once '../Access_BD/professor.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $professorModel = new ProfessorModel();
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $success = $professorModel->addProfesseur(
                    $_POST['code'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['email'],
                    $_POST['langues'],
                    $_POST['specialite']
                );
                if ($success) {
                    $_SESSION['message'] = "Professeur ajouté avec succès!";
                } else {
                    $_SESSION['error'] = "Erreur lors de l'ajout du professeur";
                }
                break;
                
            case 'update':
                $success = $professorModel->updateProfesseur(
                    $_POST['id'],
                    $_POST['code'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['email'],
                    $_POST['langues'],
                    $_POST['specialite']
                );
                if ($success) {
                    $_SESSION['message'] = "Professeur modifié avec succès!";
                } else {
                    $_SESSION['error'] = "Erreur lors de la modification du professeur";
                }
                break;
                
            case 'delete':
                $success = $professorModel->deleteProfesseur($_POST['id']);
                if ($success) {
                    $_SESSION['message'] = "Professeur supprimé avec succès!";
                } else {
                    $_SESSION['error'] = "Erreur lors de la suppression du professeur";
                }
                break;
        }
    }
    
    header("Location: ../IHM/Prof/affichage.php");
    exit();
}
?>