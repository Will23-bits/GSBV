<?php

include "controleur/controleurPrincipal.php";




if (isset($_POST["action"])){
    $action = $_POST["action"];
    
   
}elseif (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{

    $action = "default";
}

$fichier = controleurPrincipal($action);

include "Controleur/$fichier";


?>
