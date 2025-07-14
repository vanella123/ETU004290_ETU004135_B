<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }

        form p {
            margin-bottom: 15px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2ecc71;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <form action="traitement.php" method="get">
        <p>Mail : <input type="email" name="email" required></p>
        <p>Date de naissance : <input type="date" name="birthdate" required></p>
        <p>Mot de passe : <input type="password" name="mdp" required></p>
        <p>Nom : <input type="text" name="nom" required></p>
        <p>Ville : <input type="text" name="ville" required></p>
        <p>Genre : <input type="text" name="genre" required></p>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
