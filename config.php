<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'login_system';
$username = 'marchandtc7689B';
$password = 'O^l42yg88';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
