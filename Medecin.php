<?php

/**
 * Class short summary.
 *
 * Class description.
 *
 * @version 1.0
 * @author ferre
 */
class Medecin
{
    public $id;
    public $nom;
    public $prenom;
    public $adresse;
    public $cp;
    public $ville;
    public $tel;
    public $specialiteComplementaire;
    public $departement;

    public function __construct($id, $nom, $prenom, $adresse, $cp, $ville, $tel, $specialiteComplementaire, $departement)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->tel = $tel;
        $this->specialiteComplementaire = $specialiteComplementaire;
        $this->departement = $departement;
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getSpecialiteComplementaire()
    {
        return $this->specialiteComplementaire;
    }

    public function getDepartement()
    {
        return $this->departement;
    }

    
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function setSpecialiteComplementaire($specialiteComplementaire)
    {
        $this->specialiteComplementaire = $specialiteComplementaire;
    }

    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }
}