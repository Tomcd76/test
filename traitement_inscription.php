<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    if (!$email) {
        die("Email invalide.");
    }

    $hashed_password = password_hash($password, PASSWORD_ARGON2ID);

    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);

try {
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashed_password]);
    // Supprime l'echo si tu ne veux pas afficher le message et redirige immédiatement
    header("Location: index.html");
    exit(); // Assure-toi de bien arrêter le script après la redirection
} catch (PDOException $e) {
    die("Erreur lors de l'inscription : " . $e->getMessage());
}

}
?>
