<?php 
     session_start();
     error_reporting(E_ALL);
     ini_set('display_errors', 1);
     require('../inc/fonction.php');
   var_dump($_POST['nom_objet']) ; 
     var_dump($_POST['categorie']);
   //  var_dump($_POST['image[]']) ;
 
     if(isset($_POST['nom_objet']) && isset($_POST['categorie'])) {
    $id_objet = insertNewObj($_POST['nom_objet'], $_POST['categorie'], $_SESSION['id_membre']);
    var_dump($id_objet) ; 
    if ($id_objet) {
        $nbImages = count($_FILES['images']['name']);
        var_dump($id_objet) ; 
        if ($nbImages > 0 && $_FILES['images']['name'][0] !== "") {
            for ($i = 0; $i < $nbImages; $i++) {
                $nom_temp = $_FILES['images']['tmp_name'][$i];
                var_dump($nom_temp) ; 
                $nom_fichier = basename($_FILES['images']['name'][$i]);
                var_dump($nom_fichier) ; 
                $chemin_destination = "../assets/images/". $nom_fichier;
                
                if (move_uploaded_file($nom_temp, $chemin_destination)) {
                    insertImabe($chemin_destination, $id_objet);
                    if( insertImabe($chemin_destination, $id_objet))
                    {
                        echo "image inserer ";
                    }
                } 
            } 
        } else {  
            insertImabe("../assets/defaut.png", $id_objet);
        } 
        echo "✅ Objet et images enregistrés avec succès.";
    } else {
        echo "❌ Échec lors de l'insertion de l'objet.";
    }
} else {
    echo "❌ Champs manquants.";
}

    // ----------------------------------------------- upload video et image 
   
       /* $uploadDir = __DIR__ . '/../assets/contenu/';
        $maxSize = 200 * 1024 * 1024; // 2 Mo 
        $allowedMimeTypes = [ 'video/mp4', 'image/jpeg', 'image/png'];
        // Vérifie si un fichier est so$publication=insert_photo($membre)umis
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media'])) {
        $file = $_FILES['media']; 
            if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
            } 
            // Vérifie la taille 
            if ($file['size'] > $maxSize) { 
            die('Le media est trop volumineux.');
            } 
            // Vérifie le type MIME avec `finfo`
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            
            finfo_close($finfo);
            if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de media non autorisé : ' . $mime); 
            }
            // renommer le media
            $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $newName = $originalName . '_' . uniqid() . '.' . $extension ;
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
                echo "fichier uploadé avec succès : ". $newName;
            } else {
                echo "Échec du déplacement du doc.";
            }
            //$_SESSION['type'] = $mime; 
        // var_dump() ; 
            $desc = $_POST['description'] ; 
            var_dump($desc) ; 
            $titre = $_POST['title'] ;
            var_dump($titre) ;  
            $user = $_SESSION['user'] ;
            var_dump($user) ;  
            $id = POSTmembre($user) ; 
            var_dump($id);
            var_dump($mime) ; 
            $insert = insert_contenu($newName ,$id['id_Membre'],$mime,$titre,$desc); 
            if($insert) 
            { 
                echo "Nety" ;
               header('location:accueil.php'); 
            }
            else 
            {
                echo "Tsy nety"; 
            }
        } else {
            echo "Aucun doc reçu."; 
        } 
            /** */ 
    
?>