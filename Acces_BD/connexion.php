<?php
function Connect() {
    $env = parse_ini_file(__DIR__ . '/.env');

    $serveur = $env['Serveur'];
    $utilisateur = $env['Utilisateur'];
    $password = $env['Password'];
    $dbname = $env['db_name'];

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$dbname;charset=utf8", $utilisateur, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
?>
