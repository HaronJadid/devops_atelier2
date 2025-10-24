<?php
require_once '../Access_BD/login.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $loginModel = new LoginModel();
    $result = $loginModel->authenticate($_POST['email'], $_POST['password']);
    
    if ($result) {
        $_SESSION['user'] = $result['user'];
        $_SESSION['user_type'] = $result['type'];
        $_SESSION['message'] = "Connexion réussie!";
        header("Location: ../IHM/acceuil.php");
    } else {
        $_SESSION['error'] = "Email ou mot de passe incorrect";
        header("Location: ../index.php");
    }
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $loginModel = new LoginModel();
    $loginModel->logout();
}
?>