<?php
include_once "modele/traitement.php";
include_once "modele/VisiteurDAO.php";
include_once "modele/Visiteur.php";





if(isset($_POST['login'])&&isset($_POST['mdp'])){
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
}
else{
    $login="";
    $mdp="";
}

login($login,$mdp);


if(isLoggedOn()){

    include "Vue/Vueaccueil.php";
}
else{
   
    include "Vue/Vueconnexion.php";
}

?>