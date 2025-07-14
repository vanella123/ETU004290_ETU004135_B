<?php
require('traitement.php');
//session_start();
if (isset($_SESSION['mail'])) {
    $info = get_infomembre_byemail($_SESSION['mail']);
} elseif (isset($_SESSION['email'])) {
    $info = get_infomembre_byemail($_SESSION['email']);
}
$infoemprunt = mesObjets($info['id_membre']);
$id = $info['id_membre'] ; 
$_SESSION['liste_objet'] = $infoemprunt ; 
$liste_objet = get_objet($id) ; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes emprunts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 mb-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="formulaire_trier.php">Formulaire triage </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="fiche_membre.php">Formulaire triage </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h2>Liste objet </h2>
    <table border="2">
        <tr>
            <th>Nom de l'objet</th>

            <th>Date emprunt</th>
            <th>Date retour</th>
        </tr>
        <?php 
        foreach($liste_objet as $liste ) {?>
            <tr>
                <td><?= $liste['nom_objet']  ?></td>
                <td><?= $liste['date_emprunt']  ?></td>
                <td><?= $liste['date_retour']  ?></td>
            </tr>
        <?php }?>
    </table>
    <h2>Liste de mes emprunts</h2>
    <table>
        <tr>
            <th>Nom de l'objet</th>
            <th>Image</th>
            <th>Catégorie</th>
            <th>Date emprunt</th>
            <th>Date retour</th>
        </tr>
        <?php foreach ($infoemprunt as $emprunt): ?>
            <?php $image = getImagesByIdObjet($emprunt['id_objet'])?>
            <tr>
                <td><a href="traitement.php?id=<?= $emprunt['id_objet'] ?>"><?= $emprunt['nom_objet'] ?>
                </a>
                    <form action="traitement_retour.php" method="get">
                    <input type="hidden" name ="id_objet" value="<?php echo $emprunt['id_objet']?>">
                    <input type="submit" value="Retourner objet">
                </form> 
            </td>                
                <td><img src="../assets/images/<?php echo $image[0]['nom_image'] ?>" /></td>
                <td><?= $emprunt['nom_categorie'] ?></td>
                <td><?= $emprunt['date_emprunt']?></td>
                <td><?= $emprunt['date_retour'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <a href="formulaire_ajout.php?id=<?php echo $info['id_membre'] ?>">Ajouter objet </a>
</body>
</html>
