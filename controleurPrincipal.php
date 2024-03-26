<?php
function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["default"] = "connexion.php";
    $lesActions["menuPrincipal"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php"; 
    $lesActions["creerCompte"] = "inscription.php";
    $lesActions["valideCompte"] = "inscription.php";
    

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["default"]; 
    }
}













?>