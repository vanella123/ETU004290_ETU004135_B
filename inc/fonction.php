<?php
    require("connection.php") ; 
    function insertMembre($nom,$birthdate,$genre,$email,$ville,$mdp) 
    {
        $sql = "INSERT INTO emprunt_membre (nom, date_naissance, genre, email, ville, mdp) VALUES ('%s' , '%s' ,'%s' ,'%s' ,'%s' ,'%s' )"; 
        $remplacer=sprintf($sql,$nom,$birthdate,$genre,$email,$ville,$mdp); 
        $requete = mysqli_query(dbconnect(), $remplacer); 
        return $requete ; 
    } 
     function getInscrit()
    {
        $request = "SELECT * FROM emprunt_membre" ; 
        $sql = mysqli_query(dbconnect() , $request) ; 
        $tab = [] ;
        while($row = mysqli_fetch_assoc($sql)) 
        {
            $tab[] = $row ;
        }
        return $tab;
    }
    
    function checkInscrit($row , $membre)
    {
        for($i=0 ; $i<count($row); $i++)
        {
            if($row[$i]['email'] == $membre)
            {
                return true ;
            } 
        } 
        return false ; 
    }

    function get_infomembre_byemail($email)
    {
        $sql = "select * from emprunt_membre where email = '$email'" ; 
        $request = mysqli_query(dbconnect() , $sql ) ; 
        $reponse = mysqli_fetch_assoc($request) ; 
        return $reponse ; 
    }
    function mesObjets($id) 
    {  
        $sql = "select * from v_objets_membre_details where id_membre='$id'" ; 
        $rep=mysqli_query(dbconnect(),$sql);
        $tab = [] ; 
        while($row = mysqli_fetch_assoc($rep)) 
        {
            $tab[] = $row ;
        }
        return $tab; 
    }
    function result_triage($nom_categorie)
    {
        $sql = "SELECT nom_categorie , id_categorie , nom_objet 
                FROM v_objet_emprunt_categorie 
                WHERE nom_categorie='$nom_categorie' "; 
        $request = mysqli_query(dbconnect() , $sql ) ; 
        $tab = [] ;
        while($row = mysqli_fetch_assoc($request)) 
        {
            $tab[] = $row ;
        } 
        return $tab; 
    }
    function get_all_categorie()
    {
        $sql = "select * from emprunt_categorie_objet" ; 
        $requete = mysqli_query(dbconnect() , $sql ) ; 
        $tab = [] ;
        while($row = mysqli_fetch_assoc($requete)) 
        {
            $tab[] = $row ;
        } 
        return $tab;    
    }
    function get_idCategorie_byNom($nom)
    {
        $sql = "select * from emprunt_categorie_objet where nom_categorie='$nom' " ; 
        $request = mysqli_query(dbconnect() , $sql ) ; 
        $reponse = mysqli_fetch_assoc($request) ; 
        return $reponse ;  
    }
    function get_idOjb_byNom($nom_obj)
    {
        $sql = "select * from emprunt_objet where nom_objet='$nom_obj'" ; 
        $request = mysqli_query(dbconnect() , $sql ) ; 
        $reponse = mysqli_fetch_assoc($request) ; 
        return $reponse ;  
    }
    function get_image_byId($id_objet)
    {
        $sql = "select * from emprunt_images_objet where id_objet='$id_objet'";
        $requete = mysqli_query(dbconnect() , $sql ) ; 
        $tab = [] ; 
        while($row = mysqli_fetch_assoc($requete)) 
        {
            $tab[] = $row ;
        } 
        return $tab; 
    }

    function insertNewObj($nom_obj , $nom_categorie , $id)
    {
        var_dump($nom_obj) ; 
        var_dump($nom_categorie) ; 
        var_dump($id) ;
        $id_cate = get_idCategorie_byNom($nom_categorie);
        if (!$id_cate) return false;
        $conn = dbconnect();
        $sql = "INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) 
                VALUES ('%s', '%s', '%s')";
        $requete = sprintf($sql, $nom_obj, $id_cate['id_categorie'], $id);
        $result = mysqli_query($conn, $requete);
        if ($result) { 
            return mysqli_insert_id($conn); 
        } else {
            return false;
        } 
    }
   function insertImabe($nom_image, $id_objet)
    {
        $conn = dbconnect(); 
        $sql = "INSERT INTO emprunt_images_objet (id_objet, nom_image) VALUES ('%s','%s')";
        $requete = sprintf($sql, $id_objet, $nom_image);

        return mysqli_query($conn, $requete);
    }
    function getImagesByIdObjet($id_objet) {
    $conn = dbconnect();
    $sql = "SELECT nom_image FROM emprunt_images_objet WHERE id_objet = $id_objet ORDER BY id_image ASC";
    $result = mysqli_query($conn, $sql);
    $images = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = $row['nom_image'];
    }
    return $images;
    }
        function fiche_objet_emprunte ($id_objet){
        $sql = "select * from v_emprunt_images_objet_categorie_membre  where id_objet='$id_objet' " ; 
        $rep=mysqli_query(dbconnect(),$sql);
        $tab = [] ;
        while($row = mysqli_fetch_assoc($rep)) 
        {
            $tab[] = $row ;
        }
        return $tab;

        }

    function fiche_membre($email){
        $sql = "select * from v_emprunt_images_objet_categorie_membre  where email = '$email' " ; 
        $rep=mysqli_query(dbconnect(),$sql);
        $tab = [] ;
        while($row = mysqli_fetch_assoc($rep)) 
        {
            $tab[] = $row ;
        }
        return $tab;
    }

    function get_liste_objet(){
        $sql = "select * from  v_emprunt_images_objet_categorie_membre " ; 
        $rep=mysqli_query(dbconnect(),$sql);
        $tab = [] ;
        while($row = mysqli_fetch_assoc($rep)) 
        {
            $tab[] = $row ;
        }
        return $tab;

    }

    function emprunter($id_objet, $id_membre, $date_emprunt, $date_retour){
        $sql = " INSERT INTO emprunt_emprunt (id_objet, id_membre, date_emprunt, date_retour) values VALUES ('%s' , '%s' ,'%s' ,'%s' )" ; 
        $remplacer=sprintf($sql,$id_objet, $id_membre, $date_emprunt, $date_retour); 
        $requete = mysqli_query(dbconnect(), $remplacer); 
        return $requete ; 
    }

    


    