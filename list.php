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

try {
    $stmt = $pdo->prepare('SELECT * FROM app WHERE user_id = :uid ORDER BY jeu ASC');
    $stmt->execute([':uid' => $userId]);
    $jeux = $stmt->fetchAll();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des jeux</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container mt-4" style="background: #393939; padding: 2rem; border-radius: 12px;">
    <h1 class="text-white">Liste de mes jeux</h1>

    <?php if ($message): ?>
        <div id="alert-message" class="alert alert-info text-center mt-3">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <table class="table table-dark table-striped mt-4">
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
