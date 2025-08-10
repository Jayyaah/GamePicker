<?php
require_once 'config.php';
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jeu = $_POST['jeu'];
    $categorie = $_POST['cat'];
    $userId = $_SESSION['user']['id'];

    $stmt = $pdo->prepare("INSERT INTO app (jeu, categorie, user_id) VALUES (:jeu, :cat, :uid)");
    $stmt->execute([
        ':jeu' => $jeu,
        ':cat' => $categorie,
        ':uid' => $userId
    ]);

    header("Location: list.php?message=" . urlencode("Jeu ajouté avec succès !"));
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajout de jeu</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="card-ajout mx-auto mt-5" style="max-width: 500px;">
            <h2 class="text-center mb-4">Ajouter un Jeu</h2>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="jeu" class="form-label">Nom du jeu</label>
                    <input type="text" class="form-control" id="jeu" name="jeu" placeholder="Ex : Mario Kart" required>
                </div>
                <div class="mb-3">
                    <label for="cat" class="form-label">Plateforme</label>
                    <select class="form-select" id="cat" name="cat" required>
                        <option value="">-- Choisir une plateforme --</option>
                        <option>PC</option>
                        <option>PS4</option>
                        <option>Switch</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" value="Ajouter" class="btn btn-purple">
                </div>
            </form>
    </div>

</body>
</html>
