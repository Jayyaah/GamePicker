<?php
require_once 'config.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $passe = $_POST['passe'] ?? '';
    $passe2 = $_POST['passe2'] ?? '';
    $email = trim($_POST['email'] ?? '');

    if (empty($pseudo) || empty($passe) || empty($passe2) || empty($email)) {
        $message = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Adresse e-mail invalide.";
    } elseif ($passe !== $passe2) {
        $message = "Les deux mots de passe ne correspondent pas.";
    } else {
        try {
            // Vérifier si le pseudo ou l'email existe déjà
            $check = $pdo->prepare("SELECT COUNT(*) FROM validation WHERE pseudo = :pseudo OR email = :email");
            $check->execute([
                ':pseudo' => $pseudo,
                ':email' => $email
            ]);
            if ($check->fetchColumn() > 0) {
                $message = "Ce pseudo ou cet email est déjà utilisé.";
            } else {
                $passeHash = sha1($passe); // à remplacer par password_hash() à l’avenir
                $stmt = $pdo->prepare("INSERT INTO validation (pseudo, motdepasse, email) VALUES (:pseudo, :passe, :email)");
                $stmt->execute([
                    ':pseudo' => $pseudo,
                    ':passe' => $passeHash,
                    ':email' => $email
                ]);
                $message = "Inscription réussie ✅";
            }
        } catch (PDOException $e) {
            $message = "Erreur BDD : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
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

<h1>Inscription</h1>

<form method="post" action="inscription.php">
    <label>Pseudo : <input type="text" name="pseudo" required /></label><br/>
    <label>Mot de passe : <input type="password" name="passe" required /></label><br/>
    <label>Confirmation du mot de passe : <input type="password" name="passe2" required /></label><br/>
    <label>Adresse e-mail : <input type="email" name="email" required /></label><br/>
    <input type="submit" value="M'inscrire" />
</form>

<?php if ($message): ?>
    <p style="color: <?= str_starts_with($message, 'Inscription') ? 'green' : 'red' ?>;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

</body>
</html>
