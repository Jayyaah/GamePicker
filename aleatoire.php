<?php
require_once 'config.php';

$plateforme = $_POST['plateforme'] ?? 'Tout';
$jeuAleatoire = null;

try {
    if ($plateforme === "Tout") {
        $stmt = $pdo->query("SELECT * FROM app ORDER BY RAND() LIMIT 1");
    } elseif (in_array($plateforme, ['PC', 'PS4', 'SWITCH'])) {
        $stmt = $pdo->prepare("SELECT * FROM app WHERE categorie = :cat ORDER BY RAND() LIMIT 1");
        $stmt->bindValue(':cat', $plateforme, PDO::PARAM_STR);
        $stmt->execute();
    }

    if (isset($stmt)) {
        $jeuAleatoire = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jeu aléatoire</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<!-- Affichage du jeu tiré au sort -->
<div class="card-aleatoire">
    <legend>Résultat du tirage</legend>
    <p id="jeu">
        <?php if ($jeuAleatoire): ?>
            🎮 <strong><?= htmlspecialchars($jeuAleatoire['jeu']) ?></strong><br />
            🕹️ Plateforme : <?= htmlspecialchars($jeuAleatoire['categorie']) ?>
        <?php else: ?>
            Aucun jeu trouvé pour la plateforme <?= htmlspecialchars($plateforme) ?>.
        <?php endif; ?>
    </p>

    <!-- Boutons d'action -->
    <form action="aleatoire.php" method="post">
        <input type="hidden" name="plateforme" value="<?= htmlspecialchars($plateforme) ?>">
        <input type="submit" value="🔄 Rejouer sur cette plateforme">
    </form>

    <form action="choix.php" method="get">
        <input type="submit" value="🎯 Changer de plateforme">
    </form>
</div>
</body>
</html>
