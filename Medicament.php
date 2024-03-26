<?php

class Medicament
{
    public $id;
    public $nomCommercial;
    public $idfamille;
    public $composition;
    public $effets;
    public $contreIndications;

    public function __construct($id, $nomCommercial, $idfamille, $composition, $effets, $contreIndications)
    {
        $this->id = $id;
        $this->nomCommercial = $nomCommercial;
        $this->idfamille = $idfamille;
        $this->composition = $composition;
        $this->effets = $effets;
        $this->contreIndications = $contreIndications;
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function getNomCommercial()
    {
        return $this->nomCommercial;
    }

    public function getIdFamille()
    {
        return $this->idfamille;
    }

    public function getComposition()
    {
        return $this->composition;
    }

    public function getEffets()
    {
        return $this->effets;
    }

    public function getContreIndications()
    {
        return $this->contreIndications;
    }

    
    public function setNomCommercial($nomCommercial)
    {
        $this->nomCommercial = $nomCommercial;
    }

    public function setIdFamille($idfamille)
    {
        $this->idfamille = $idfamille;
    }

    public function setComposition($composition)
    {
        $this->composition = $composition;
    }

    public function setEffets($effets)
    {
        $this->effets = $effets;
    }

    public function setContreIndications($contreIndications)
    {
        $this->contreIndications = $contreIndications;
    }
}



?>