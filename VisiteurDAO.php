<?php
include_once("connexionPDO.php");
class VisiteurDAO{
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addVisiteur($visiteur){
        try{
            $req = $this->conn->prepare("INSERT INTO visiteur  VALUES (:id,:nom,:prenom,:adresse,:cp,:ville,:logins,:mdp,:departement,:dateEmbauche)");
            $req->bindValue(":id", $visiteur->getidV());
            $req->bindValue(":nom", $visiteur->getNom());
            $req->bindValue(":prenom", $visiteur->getPrenom());
            $req->bindValue(":adresse", $visiteur->getAdresse());
            $req->bindValue(":cp", $visiteur->getCp());
            $req->bindValue(":ville", $visiteur->getVille());
            $req->bindValue(":logins", $visiteur->getLogins());
            $req->bindValue(":mdp", $visiteur->getMdp());
            $req->bindValue(":departement", $visiteur->getDepartement());
            $req->bindValue(":dateEmbauche", $visiteur->getDateEmbauche());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function updateVisiteur($visiteur){
        try{
            $req = $this->conn->prepare("UPDATE visiteur SET nom=:nom,prenom=:prenom,logins=:login,mdp=:mdp,adresse=:adresse,cp=:cp,ville=:ville,dateEmbauche=:dateEmbauche WHERE id=:idVisiteur");
            $req->bindValue(":id", $visiteur->getidV());
            $req->bindValue(":nom", $visiteur->getNom());
            $req->bindValue(":prenom", $visiteur->getPrenom());
            $req->bindValue(":login", $visiteur->getLogins());
            $req->bindValue(":mdp", $visiteur->getMdp());
            $req->bindValue(":adresse", $visiteur->getAdresse());
            $req->bindValue(":cp", $visiteur->getCp());
            $req->bindValue(":ville", $visiteur->getVille());
            $req->bindValue(":dateEmbauche", $visiteur->getDateEmbauche());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteVisiteur($visiteur){
        try{
            $req = $this->conn->prepare("DELETE FROM visiteur WHERE id=:id");
            $req->bindValue(":id", $visiteur->getidV());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurs(){
        try{
            $req = $this->conn->prepare("SELECT * FROM visiteur");

            $req->execute();

            $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
            if($resultat){
                foreach($resultat as $ligne){
                    $visiteur = new Visiteur(
                    $ligne["id"],
                    $ligne["nom"],
                    $ligne["prenom"],
                    $ligne["adresse"],
                    $ligne["cp"],
                    $ligne["ville"],
                    $ligne["logins"],
                    $ligne["mdp"],                   
                    $ligne["departement"],
                    $ligne["dateEmbauche"]
                );
                
                    $visiteurs[] = $visiteur;
                }
                return $visiteurs;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }

    public function getVisiteurById($id){
        try{
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE id=:idVisiteur");
            $req->bindValue(":idVisiteur", $id);

            $req->execute();

            $resultat=$req->fetch(PDO::FETCH_ASSOC);
            if($resultat){
                $visiteur = new Visiteur(
                    $resultat["id"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["adresse"],
                    $resultat["cp"],
                    $resultat["ville"],
                    $resultat["logins"],
                    $resultat["mdp"],                   
                    $resultat["departement"],
                    $resultat["dateEmbauche"]
                );
                return $visiteur;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }

    public function getVisiteurByLogin($login){
        try{
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE logins=:logins");
            $req->bindValue(":logins", $login);

            $req->execute();

            $resultat=$req->fetch(PDO::FETCH_ASSOC);
            if($resultat){
                $visiteur = new Visiteur(
                    $resultat["id"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["adresse"],
                    $resultat["cp"],
                    $resultat["ville"],
                    $resultat["logins"],
                    $resultat["mdp"],                   
                    $resultat["departement"],
                    $resultat["dateEmbauche"]
                );
                return $visiteur;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }

    function Maxid(){
        try{
            $req = $this->conn->prepare("SELECT MAX(id) FROM visiteur");
            $req->execute();
    }catch(PDOException $e){
        print "Erreur !: ". $e->getMessage();
        die();
    }
    $resultat=$req->fetch();
    return $resultat[0];
    }


    
}