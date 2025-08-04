<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

$message = $_GET['message'] ?? null;
$supprime = $_GET['supprime'] ?? null;
$userId = $_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jeu'], $_POST['categorie'])) {
    $jeu = trim($_POST['jeu']);
    $categorie = trim($_POST['categorie']);

    if ($jeu && $categorie) {
        $stmt = $pdo->prepare("INSERT INTO app (jeu, categorie, user_id) VALUES (:jeu, :cat, :uid)");
        $stmt->execute([
            ':jeu' => $jeu,
            ':cat' => $categorie,
            ':uid' => $userId
        ]);
        header("Location: list.php?message=" . urlencode("Jeu ajouté avec succès !"));
        exit;
    }
}

try {
    $stmt = $pdo->prepare('SELECT * FROM app WHERE user_id = :uid ORDER BY jeu ASC');
    $stmt->execute([':uid' => $userId]);
    $jeux = $stmt->fetchAll();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Liste des jeux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5 card-liste">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-white mb-0 fs-3">Liste de mes jeux</h1>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutModal">➕ Ajouter</button>
    </div>

    <?php if ($message): ?>
        <div id="alert-message" class="alert alert-info text-center">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-dark table-striped text-center align-middle table-rounded">
        <thead>
            <tr>
                <th>Jeux</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($jeux as $jeu): ?>
                <tr>
                    <td><?= htmlspecialchars($jeu['jeu']) ?></td>
                    <td><?= htmlspecialchars($jeu['categorie']) ?></td>
                    <td>
                        <?php if ($supprime == $jeu['id']): ?>
                            <span class="text-success fw-bold">Supprimé</span>
                        <?php else: ?>
                            <a href="modifier.php?numJeu=<?= $jeu['id'] ?>" class="btn btn-sm btn-outline-primary">Modifier</a>
                            <a href="supprimer.php?numJeu=<?= $jeu['id'] ?>" class="btn btn-sm btn-outline-danger">Supprimer</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal d'ajout -->
<div class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="ajoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="list.php" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutModalLabel">Ajouter un jeu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="jeu" class="form-label">Nom du jeu</label>
                    <input type="text" class="form-control" id="jeu" name="jeu" required>
                </div>
                <div class="mb-3">
                    <label for="categorie" class="form-label">Plateforme</label>
                    <select class="form-select" id="categorie" name="categorie" required>
                        <option value="">-- Choisir une plateforme --</option>
                        <option>PC</option>
                        <option>PS4</option>
                        <option>Switch</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(() => {
        const alertBox = document.getElementById('alert-message');
        if (alertBox) {
            alertBox.style.transition = 'opacity 0.5s ease';
            alertBox.style.opacity = '0';
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 3000);
</script>
</body>
</html>
