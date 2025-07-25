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
    <link href="pageaj.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">ACCUEIL</a></li>
        <li><a href="ajout.php">AJOUTER UN JEU</a></li>
        <li><a href="choix.php">JEU ALÉATOIRE</a></li>
        <li><a href="list.php">LISTE</a></li>
        <li><a href="#">CONNEXION</a></li>
    </ul>
</nav>

<fieldset>
    <legend>Résultat du tirage</legend>
    <br />
    <p id="jeu" style="text-align: center; font-size: 20px;">
        <?php if ($jeuAleatoire): ?>
            🎮 <strong><?= htmlspecialchars($jeuAleatoire['jeu']) ?></strong><br />
            🕹️ Plateforme : <?= htmlspecialchars($jeuAleatoire['categorie']) ?>
        <?php else: ?>
            Aucun jeu trouvé pour la plateforme <?= htmlspecialchars($plateforme) ?>.
        <?php endif; ?>
    </p>

    <div style="text-align: center; margin-top: 20px;">
        <!-- Bouton pour rejouer sur la même plateforme -->
        <form action="aleatoire.php" method="post" style="display:inline;">
            <input type="hidden" name="plateforme" value="<?= htmlspecialchars($plateforme) ?>">
            <input type="submit" value="🔄 Rejouer sur cette plateforme">
        </form>

        <!-- Bouton pour revenir choisir la plateforme -->
        <form action="choix.php" method="get" style="display:inline;">
            <input type="submit" value="🎯 Changer de plateforme">
        </form>
    </div>
</fieldset>
</body>
</html>
