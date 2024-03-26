<?php
class visiteur{
    private $idV;
    private $nom;
    private $prenom;
    private $adresse;
    private $cp;
    private $ville;
    private $logins;
    private $mdp;
    private $departement;
    private $dateEmbauche;

    public function __construct($idV, $nom, $prenom, $adresse,$cp, $ville, $logins, $mdp,$departement, $dateEmbauche){ 
        $this -> idV = $idV;
        $this ->nom = $nom;
       $this ->prenom = $prenom;
       $this ->adresse = $adresse;
       $this->cp = $cp;
       $this->ville = $ville;
       $this->logins = $logins;
       $this->mdp = $mdp;
       $this->departement = $departement;
       $this->dateEmbauche = $dateEmbauche;
    }
    public function getIdV()
    {
        return $this->idV;
    }
    public function getNom(){ 
        return $this->nom; 
    }
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse(){ 
        return $this->adresse; 
    }
    public function getCp(){ 
       return $this->cp; 
    }
    public function getVille()
    {
        return $this->ville;
    }

    public function getLogins(){ 
       return $this->logins; 
    }

    public function getmdp()
    {
        return $this->mdp;
    }

    public function getDepartement(){ 
       return $this->departement; 
    }

    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    public function setidV($idV){
        $this->idV = $idV;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom){ 
       $this->prenom = $prenom; 
    }
    public function setAdresse($adresse){ 
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

    public function setLogins($logins){ 
        $this->logins = $logins; 
    }

    public function setmdp($mdp)
    {
        $this->mdp = $mdp;
    }
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

    public function setDateEmbauche($dateEmbauche){ 
       $this->dateEmbauche = $dateEmbauche; 
    }




}






?>