<!DOCTYPE html>
<html>
<head>
    <title>Jeu aléatoire</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="pageaj.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <ul>
        <li>
            <a href="#">ACCUEIL</a>
        </li>
        <li>
            <a href="ajout.php">AJOUTER UN JEU</a>
        </li>
        <li>
            <a href="choix.php">JEU ALEATOIRE</a>
        </li>
        <li>
            <a href="list.php">LISTE</a>
        </li>
        <li>
            <a href="#">CONNEXION</a>
        </li>
    </ul>
</nav>

<fieldset>
    <legend>Jeu aléatoire</legend>
    <br />
    <p id="jeu" style="text-align: center;">
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=queljeujouer;charset=utf8','root','');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

                if ($_POST['SWITCH']) {

                    $SWITCH = $bdd->query("SELECT * FROM app WHERE categorie = 'SWITCH' ORDER BY RAND() LIMIT 1");
                    while ($donnees = $SWITCH->fetch()) {
                        echo $donnees['jeu'];
                    }
                    $SWITCH->closeCursor();

                }

        ?>
    </p>
    <input type="button" value="Changer de jeu" Onclick="javascript:location.reload()">
    <br />
</fieldset>
</body>
</html>