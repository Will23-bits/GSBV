<?php

class Offrir
{
    public $idRapport;
    public $idMedicament;
    public $quantite;
    
   

    public function __construct($idRapport, $idMedicament, $quantite)
    {
        $this->idRapport = $idRapport;
        $this->idMedicament = $idMedicament;
        $this->quantite = $quantite;
    }

    public function getIdRapport(){ 
        return $this->idRapport; 
    }
    public function getIdMedicament()
    {
        return $this->idMedicament;
    }
    public function getQuantite()
    {
        return $this->quantite;
    }
    public function setquantite($quantite ){
        $this->quantite = $quantite;
    }
    

    
}

?>