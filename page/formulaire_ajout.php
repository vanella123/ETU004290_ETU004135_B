<?php 
    require('traitement.php');
    $all_categorie = get_all_categorie() ; 
    $_SESSION['id_membre'] = $_GET['id'] ; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un objet</title>
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

    <form action="traitement_upload.php" method="post" enctype="multipart/form-data">
        <h2>Ajouter un objet</h2>

        <label for="nom_objet">Nom de l'objet :</label>
        <input type="text" name="nom_objet" id="nom_objet" required>

        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie" required>
            <option value="">-- Choisir une catégorie --</option>
            <?php foreach($all_categorie as $categorie) {?>
                <option value="<?php echo $categorie['nom_categorie'] ?>"><?php echo $categorie['nom_categorie'] ?></option>
            <?php }?>
        </select>
        <label for="images">Images (vous pouvez en sélectionner plusieurs) :</label>
        <input type="file" name="images[]" id="images" multiple accept="image/*">

        <input type="submit" value="Ajouter l'objet">
    </form>

    
</body>
</html>
