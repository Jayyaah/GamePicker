<?php
require_once 'config.php';

if (isset($_POST['numJeu'], $_POST['jeu'], $_POST['categorie']) && !empty($_POST['jeu']) && !empty($_POST['categorie'])) {
    try {
        $stmt = $pdo->prepare('UPDATE app SET jeu = :jeu, categorie = :categorie WHERE id = :num LIMIT 1');
        $stmt->bindValue(':num', $_POST['numJeu'], PDO::PARAM_INT);
        $stmt->bindValue(':jeu', $_POST['jeu'], PDO::PARAM_STR);
        $stmt->bindValue(':categorie', $_POST['categorie'], PDO::PARAM_STR);

        $executeOk = $stmt->execute();

        if ($executeOk) {
            echo "Le jeu a bien été modifié ✅";
            // Optionnel : rediriger vers la liste
            // header("Location: list.php"); exit;
        } else {
            echo "Erreur lors de la modification ❌";
        }
    } catch (PDOException $e) {
        die('Erreur SQL : ' . $e->getMessage());
    }
} else {
    echo "Champs manquants...";
}
?>
