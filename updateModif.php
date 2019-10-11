<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=queljeujouer;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['jeu']) && isset($POST['categorie'])) {
    $reponse = $bdd->prepare('UPDATE app set jeu=:jeu, categorie=:categorie WHERE id=:num LIMIT 1');

    $reponse->bindValue(':num', $_POST['numJeu'], PDO::PARAM_INT);
    $reponse->bindValue(':jeu', $_POST['jeu'], PDO::PARAM_STR);
    $reponse->bindValue(':categorie', $_POST['categorie'], PDO::PARAM_STR);
    $executeOk = $reponse->execute();

    $jeu = $reponse->fetch();
}
?>