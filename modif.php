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
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark" style="background: #393939;">
    <div class="container justify-content-center">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link text-white" href="index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="ajout.php">Ajouter un jeu</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="choix.php">Jeu Aléatoire</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="list.php">Liste</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="inscription.php">Connexion</a></li>
        </ul>
    </div>
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
