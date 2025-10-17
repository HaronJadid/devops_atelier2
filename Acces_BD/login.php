<?php
function login($email, $password) {
    // Identifiants statiques pour le test
    $adminEmail = "admin@ecole.com";
    $adminPass = "admin123";

    if ($email === $adminEmail && $password === $adminPass) {
        session_start();
        $_SESSION['admin'] = $email;
        return true;
    } else {
        return false;
    }
}

function logout() {
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>
