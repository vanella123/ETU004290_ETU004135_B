<?php 
require('../inc/fonction.php');
session_start();
$liste=get_liste_objet();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement.php" method="get">
        <?php foreach($liste as $list){ ?>
            <h6>proprietaire:<?php echo $list['nom'] ?></h6>
            <p>categorie:<?php echo $list['nom_categorie'] ?></p>
            <h6>personne qui a emprunter:<?php echo $list['empperso'] ?></h6>
            <p>objet:<?php echo $list['nom_objet'] ?></p>
            <p>date de retour :<?php echo $list['date_retour'] ?></p>
            <p>date de emprunt :<?php echo $list['date_emprunt'] ?></p>
            <?php if($list['empperso'] == null){ ?>
                <input type="submit" value="emprunter">
            <?php } ?>   
        <?php } ?>  
    </form>
</body>
</html>