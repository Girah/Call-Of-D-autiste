<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=pokemon;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$req = $bdd->prepare('SELECT * FROM pokemon WHERE nom LIKE  ?');
$req->execute(array('%'.$_GET['rechercheUnPokemon'].'%'));
// On affiche chaque entrée une à une
?>
<table class="table">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Type</th>
        <th>Faiblesses</th>
    </tr>

    <?php
    while ($donnees = $req->fetch())
    {
    ?>
    <p>
        <tr>
            <td><?php echo $donnees['nom']; ?></td>
            <td><?php echo $donnees['type']; ?></td>
            <td><?php echo $donnees['faiblesses']; ?></td>
        </tr>
    </p>
</table>
<?php
}

$req->closeCursor(); // Termine le traitement de la requête

?>

</body>
</html>