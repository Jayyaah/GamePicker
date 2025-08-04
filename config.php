<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = 'db';
$dbname = 'gamepicker';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}
?>
