<?php
require_once 'config.php';

$message = '';
$id = $_GET['numJeu'] ?? null;

if ($id && is_numeric($id)) {
    try {
        $stmt = $pdo->prepare('DELETE FROM app WHERE id = :num LIMIT 1');
        $stmt->bindValue(':num', $id, PDO::PARAM_INT);
        $executeOk = $stmt->execute();

        if ($executeOk && $stmt->rowCount() > 0) {
            $message = '🎯 Le jeu a bien été supprimé.';
        } else {
            $message = '❌ Échec de la suppression du jeu (id introuvable).';
        }
    } catch (PDOException $e) {
        $message = 'Erreur : ' . $e->getMessage();
    }
} else {
    $message = 'ID invalide ou manquant.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Suppression</title>
    <meta charset="UTF-8" />
    <link href="pageaj.css" rel="stylesheet" type="text/css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">ACCUEIL</a></li>
        <li><a href="ajout.php">AJOUTER UN JEU</a></li>
        <li><a href="choix.php">JEU ALÉATOIRE</a></li>
        <li><a href="list.php">LISTE</a></li>
        <li><a href="inscription.php">CONNEXION</a></li>
    </ul>
</nav>

<h1>Suppression</h1>
<p style="text-align: center; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
<p style="text-align: center;"><a href="list.php">⬅️ Retour à la liste</a></p>

</body>
</html>
