<?php 
require('../inc/fonction.php');
session_start();
if(isset($_GET['nom']) && isset($_GET['ville']) && isset($_GET['birthdate']) && isset($_GET['mdp']) && isset($_GET['email']) && isset($_GET['genre']))
{
    $nom=$_GET['nom'];
    $ville=$_GET['ville'];
    $birthdate=$_GET['birthdate'];
    $mdp=$_GET['mdp'];
    $email=$_GET['email'];
    $genre=$_GET['genre'];
    $_SESSION['email']=$email;
    $insription=insertMembre($nom,$birthdate,$genre,$_SESSION['email'],$ville,$mdp) ;
    if($insription){
        echo 'yes' ;
       header('location:home.php');
    }
    else{
        echo 'no';
    }

}
/*var_dump($_GET['mdp']) ; 
var_dump($_GET['mail']);
var_dump($_GET['nom']);
/** */
    if(isset($_GET['mdp']) && isset($_GET['mail']) && isset($_GET['nom'])){
        //echo "ok";
        $mdp=$_GET['mdp'];
        $email=$_GET['mail'];
        $nom = $_GET['nom'] ; 
        $_SESSION['mail']=$email;
    // $login=login($email,$mdp) ;
        $check = checkInscrit(getInscrit(), $_SESSION['mail']); 
        if($check) 
        { 
            echo "vous etes connecte ";
            header('location:home.php'); 
        } 
    /* else if(!$check) 
        { 
            //$requete = insertMembre($_POST['e_mail']); 
                if($requete) 
                {
                    header('location:modele.php'); 
                }
                else 
                {
                    header("Location: .php?erreur=1");
                } 
        }
                /** */

    }
    if(isset($_GET['categorie']))
    {
        $objet = result_triage($_GET['categorie']) ;
        $_SESSION['objet'] = $objet ;  
        header('location:resultat.php') ; 
    }

?>
