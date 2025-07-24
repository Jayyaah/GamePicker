<?php
require_once 'config.php';

$jeu = null;
$id = $_GET['numJeu'] ?? null;

if ($id && is_numeric($id)) {
    try {
        $stmt = $pdo->prepare('SELECT * FROM app WHERE id = :num');
        $stmt->bindValue(':num', $id, PDO::PARAM_INT);
        $stmt->execute();
        $jeu = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
} else {
    die('ID de jeu invalide.');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un jeu</title>
    <meta charset="UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<nav>
    <ul>
        <li><a href="accueil.php">ACCUEIL</a></li>
        <li><a href="ajout.php">AJOUTER UN JEU</a></li>
        <li><a href="choix.php">JEU ALÉATOIRE</a></li>
        <li><a href="list.php">LISTE</a></li>
        <li><a href="#">CONNEXION</a></li>
    </ul>
</nav>

<div id="jeu">
    <?php if ($jeu): ?>
        <form action="updateModif.php" method="post">
            <fieldset>
                <legend>Modifier un jeu</legend><br />
                <input type="hidden" name="numJeu" value="<?= htmlspecialchars($jeu['id']) ?>">

                <label for="jeu">Entrer le nom d'un jeu :</label>
                <input type="text" name="jeu" id="jeu" value="<?= htmlspecialchars($jeu['jeu']) ?>" required /><br /><br />

                <label for="categorie">Plateforme :</label>
                <select name="categorie" id="categorie" required>
                    <option value="PC" <?= $jeu['categorie'] === 'PC' ? 'selected' : '' ?>>PC</option>
                    <option value="PS4" <?= $jeu['categorie'] === 'PS4' ? 'selected' : '' ?>>PS4</option>
                    <option value="Switch" <?= $jeu['categorie'] === 'Switch' ? 'selected' : '' ?>>Switch</option>
                </select>

                <br /><br />
                <input type="submit" value="Mettre à jour" />
            </fieldset>
        </form>
    <?php else: ?>
        <p>Jeu introuvable.</p>
    <?php endif; ?>
</div>

</body>
</html>
