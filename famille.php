<?php
class famille{
    public $idf;
    public $libelle;

    public function __construct($idf, $libelle)
    {
        $this->idf = $idf;
        $this->libelle = $libelle;

    }
    public function getId(){ 
        return $this->idf; 
    }
    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle){ 
        $this->libelle = $libelle; 
    }

    public function setidFam($idf)
    {
        $this->idf = $idf;
    }
     

    }

?>