<!DOCTYPE html>
<html>
<head>
    <title>Liste des jeux</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="pageaj.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <ul>
        <li>
            <a href="accueil.php">ACCUEIL</a>
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
            <a href="inscription.php">CONNEXION</a>
        </li>
    </ul>
</nav>
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=queljeujouer;charset=utf8','root','');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->prepare ('SELECT * FROM app ORDER BY jeu ASC');
        $executeOk = $reponse->execute();

        $jeux = $reponse->fetchAll();

        ?>

<h1>Liste des jeux</h1>

<table>
    <thead align="left" style="display: table-header-group">
    <tr>
        <th>Jeux </th>
        <th>Categories </th>
        <th>Actions
            <form method="post" action="">
                <select name="trier">
                    <option value="tri_dateASC" >Trier par categorie</option>
                    <option value="tri_dateASC" >Trier par ordre alphabétique</option>
                </select>
                <input type="submit" value="ok" />
            </form>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($jeux as $jeu) :?>
    <tr class="item_row">
        <td> <?php echo $jeu['jeu']; ?></td>
        <td> <?php echo $jeu['categorie']; ?></td>
        <td> <a href="supprimer.php?numJeu=<?= $jeu['id']?>"><button>Supprimer</button></a> </br> </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>