<?php
//require('traitement.php');
//$_SESSION['']
session_start();
if(isset($_SESSION['liste_objet']))
{
    $categorie = $_SESSION['liste_objet'] ; 
}
//var_dump($categorie) ; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Filtrer par catégorie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <form action="traitement.php" method="get">
        <label for="categorie">Choisir une catégorie :</label>
        <select name="categorie" id="categorie" required>
            <option value="">-- Sélectionner --</option>
            <?php foreach($categorie as $ca ) {?>
                <option value="<?php echo $ca['nom_categorie']?>"><?php echo $ca['nom_categorie']?></option>
            <?php }?>
        </select>
        <input type="submit" value="Filtrer">
    </form>

</body>
</html>
