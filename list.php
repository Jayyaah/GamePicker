<?php
require_once 'config.php';

$message = $_GET['message'] ?? null;
$supprime = $_GET['supprime'] ?? null;

// Récupération des jeux
try {
    $stmt = $pdo->prepare('SELECT * FROM app ORDER BY jeu ASC');
    $stmt->execute();
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

<div class="container mt-4" style="background: #393939;">
    <h1 class="text-white">Liste des jeux</h1>

    <?php if ($message): ?>
        <div id="alert-message" class="alert alert-info text-center">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <table class="table table-dark table-striped mt-4">
        <thead>
        <tr>
            <th>Jeux</th>
            <th>Catégories</th>
            <th>Actions</th>
        </tr>
        <tr>
            <th colspan="3">
                <form method="post" action="">
                    <select name="trier" class="form-select w-auto d-inline">
                        <option value="tri_categorie">Trier par catégorie</option>
                        <option value="tri_alpha">Trier par ordre alphabétique</option>
                    </select>
                    <input type="submit" value="OK" class="btn btn-secondary btn-sm" />
                </form>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jeux as $jeu) : ?>
            <tr class="item_row">
                <td><?= htmlspecialchars($jeu['jeu']) ?></td>
                <td><?= htmlspecialchars($jeu['categorie']) ?></td>
                <td>
                    <?php if ($supprime == $jeu['id']) : ?>
                        <span class="text-success fw-bold">Supprimé</span>
                    <?php else : ?>
                        <a href="supprimer.php?numJeu=<?= $jeu['id'] ?>">
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </a>
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