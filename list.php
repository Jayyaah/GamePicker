<?php
require_once 'config.php';

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

<h1>Liste des jeux</h1>

<table>
    <thead>
    <tr>
        <th>Jeux</th>
        <th>Catégories</th>
        <th>Actions</th>
    </tr>
    <tr>
        <th colspan="3">
            <form method="post" action="">
                <select name="trier">
                    <option value="tri_categorie">Trier par catégorie</option>
                    <option value="tri_alpha">Trier par ordre alphabétique</option>
                </select>
                <input type="submit" value="OK" />
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
                <a href="supprimer.php?numJeu=<?= $jeu['id'] ?>">
                    <button>Supprimer</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
