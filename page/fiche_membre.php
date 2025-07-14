<?php 
require('../inc/fonction.php');
session_start();

if (isset($_SESSION['mail'])) {
    //var_dump($_SESSION['mail']);
    $info = fiche_membre($_SESSION['mail']);
} elseif (isset($_SESSION['email'])) {
    
    $info = fiche_membre($_SESSION['email']);
}
//var_dump($info);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Membre</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9fbfd;
        }

        tr:hover {
            background-color: #e1efff;
        }

        th {
            background-color: #2980b9;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            color: #555;
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
                            <a class="nav-link active" href="fiche_membre.php">fiche</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <h1>Informations du Membre</h1>
    <table>
        <thead>
            <tr>
                <th>Champ</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
        
            <tr><td>ID Membre</td><td><?php echo $info[0]['id_membre'] ?></td></tr>
            <tr><td>Date de Naissance</td><td><?php echo $info[0]['date_naissance'] ?></td></tr>
            <tr><td>Nom</td><td><?php echo $info[0]['nom'] ?></td></tr>
            <tr><td>Genre</td><td><?php echo $info[1]['genre'] ?></td></tr>
            <tr><td>Email</td><td><?php echo $info[0]['email'] ?></td></tr>
            <tr><td>Ville</td><td><?php echo $info[0]['ville'] ?></td></tr>
            <tr><td>Mot de passe</td><td><?php echo $info[0]['mdp'] ?></td></tr>
            <tr><td>Image Profil</td><td><?php echo $info[0]['image_profil'] ?></td></tr>
            </tbody>
        </table>
            <h1>listes des objets</h1>
        <table>
        <thead>
            <tr>
                <th>Categorie</th>
                <th>objets</th>
                <th>images</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($info as $inf ) { ?>
            <tr>
                <td><?php echo $inf['nom_categorie'] ?></td>
                <td><?php echo $inf['nom_objet'] ?></td>
                <td><?php echo $inf['nom_image'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    
</body>
</html>
