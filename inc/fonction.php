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
        $sql = "select * from v_objet_emprunt_categorie where id_membre='$id' " ; 
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
                WHERE nom_categorie=$nom_categorie "; 
        $request = mysqli_query(dbconnect() , $sql ) ; 
        $tab = [] ;
        while($row = mysqli_fetch_assoc($request)) 
        {
            $tab[] = $row ;
        }
        return $tab; 
    }


    