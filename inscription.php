<?php
include_once 'modele/traitement.php';
include_once 'modele/VisiteurDAO.php';
include 'modele/visiteur.php';
$dao=new VisiteurDAO();


if($action=='creerCompte'){
    include 'Vue/VueInscription.php';
}elseif($action=='valideCompte'){
    


    if(isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['logins']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['departement']) && isset($_POST['dateEmbauche'])) {
    
    
        if($dao->getVisiteurByLogin($_POST['logins'])!=null){
        echo "login existe deja";
        include "Vue/VueInscription.php";
        return;
        }else{    
        $id=$dao->Maxid()+1;
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['logins'];
        $mdp = $_POST['mdp'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $département = $_POST['departement'];
        $dateembauche = $_POST['dateEmbauche'];

        $visiteur = new Visiteur($id, $nom, $prenom, $adresse, $cp, $ville,$login, $mdp, $département, $dateembauche);
        $dao->addVisiteur($visiteur);
       
       
        
        header("Location: Vue/Vueconfirmation.php");
        exit();
   

        
    
   
    
        
        }
    }
}








   