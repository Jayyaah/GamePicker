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
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Modifier un jeu</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include 'navbar.php'; ?>

<h1 class="titre-simple">Modifier un jeu</h1>

<?php if ($jeu): ?>
<div class="card-ajout">
    <div class="container">
        <div class="card p-4 mx-auto" style="max-width: 500px;">
            <form action="updateModif.php" method="post">
                <input type="hidden" name="numJeu" value="<?= htmlspecialchars($jeu['id']) ?>">

                <div class="mb-3">
                    <label for="jeu" class="form-label">Nom du jeu :</label>
                    <input type="text" name="jeu" id="jeu" class="form-control" value="<?= htmlspecialchars($jeu['jeu']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="categorie" class="form-label">Plateforme :</label>
                    <select name="categorie" id="categorie" class="form-select" required>
                        <option value="PC" <?= $jeu['categorie'] === 'PC' ? 'selected' : '' ?>>PC</option>
                        <option value="PS4" <?= $jeu['categorie'] === 'PS4' ? 'selected' : '' ?>>PS4</option>
                        <option value="Switch" <?= $jeu['categorie'] === 'Switch' ? 'selected' : '' ?>>Switch</option>
                    </select>
                </div>

                <div class="text-center">
                    <input type="submit" value="Mettre à jour" class="btn btn-purple">
                </div>
            </form>
        </div>
    </div>
</div>
<?php else: ?>
    <p class="text-center text-danger mt-5">Jeu introuvable.</p>
<?php endif; ?>

</body>
</html>
