<?php
class Rapport{
    private $idrap;
    private $dates;
    private $bilan;
    private $motif;
    private $visiteur;
    private $medecin;

    public function __construct($idrap, $dates, $bilan, $motif, $visiteur, $medecin)
    {
        $this->idrap = $idrap;
        $this->dates = $dates;
        $this->bilan = $bilan;
        $this->motif = $motif;
        $this->visiteur = $visiteur;
        $this->medecin = $medecin;
    }

    public function getIdRapp(){ 
     return $this->idrap; 
    }
    public function getDates()
    {
     return $this->dates;
    }

    public function getBilan()
    {
     return $this->bilan;
    }

    public function getVisiteur(){ 
     return $this->visiteur; 
    }

    public function getMedecin()
    {
        return $this->medecin;
    }
    public function getmotif(){
        return $this->motif;
    }

    public function setId($idrap){
        $this->idrap = $idrap;
    }

    public function setDates($dates)
    {
        $this->dates = $dates;
    }

    public function setBilan($bilan)
    {
        $this->bilan = $bilan;
    }

    public function setVisiteur($visiteur){ 
       $this->visiteur = $visiteur; 
    }

    public function setMedecin($medecin){ 
       $this->medecin = $medecin; 
     }

     public function setmotif($motif){
        $this->motif = $motif;
     }



       








}








?>