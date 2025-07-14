<?php
require('../inc/fonction.php');
session_start();
if(isset($_GET['id_objet']))
{
    $delete = retour($_GET['id_objet']);
    if($delete)
    {
        echo "Emprunt effacer" ; 
    }
} 
?>