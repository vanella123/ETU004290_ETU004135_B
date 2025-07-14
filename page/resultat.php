<?php 
    require('traitement.php');
   $liste =  $_SESSION['objet'] ;
   //var_dump($liste); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>Nom categorie</th>
            <th>ID </th>
            <th>Nom objet </th>
        </tr>
        <?php foreach($liste as $li ) {?>
        <tr>
            <td><?php echo $li['nom_categorie'] ?></td>
            <td><?php echo $li['id_categorie'] ?></td>
            <td><?php echo $li['nom_objet'] ?></td>
        </tr>
        <?php }?>

    </table>
</body>
</html>
