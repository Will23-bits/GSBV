<?php
class MedecinDAO{

    private $conn;

    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();

    }

    public function ajoutMedecin($Medecin){
        try{
            $req=$this->conn->prepare("INSERT INTO Medecin values(:id,:nom,:prenom,:adresse,:cp,:ville,:tel,:specialiteComplementaire,:departement)");
            $req->bindValue(":id",$Medecin->getId());
            $req->bindValue(":nom", $Medecin->getNom());
            $req->bindValue(":prenom", $Medecin->getPrenom());
            $req->bindValue(":adresse", $Medecin->getAdresse());
            $req->bindValue(":cp", $Medecin->getCp());
            $req->bindValue(":ville", $Medecin->getVille());
            $req->bindValue(":tel", $Medecin->getTel());
            $req->bindValue(":specialiteComplementaire", $Medecin->getSpecialiteComplementaire());
            $req->bindValue(":departement", $Medecin->getDepartement());
            $req->execute();




            }catch (PDOException $e){

            print "Erreur !;" . $e->getMessage();

            die();
        }
    }

    public function updateMedecin($Medecin){
        try {
            $req = $this->conn->prepare("UPDATE Medecin SET nom= :nom , prenom= :prenom ,adresse= :adresse ,cp= :cp ,ville= :ville ,tel= :tel ,specialiteComplementaire= :specialiteComplementaire ,departement= :departement where id=:id)");
            $req -> bindValue(":id", $Medecin->getId());
            $req -> bindValue(":nom", $Medecin->getNom());
            $req -> bindValue(":prenom", $Medecin->getPrenom());
            $req -> bindValue(":adresse", $Medecin->getAdresse());
            $req -> bindValue(":cp", $Medecin->getCp());
            $req -> bindValue(":ville", $Medecin->getVille());
            $req -> bindValue(":tel", $Medecin->getTel());
            $req -> bindValue(":specialiteComplementaire", $Medecin->getSpecialiteComplementaire());
            $req -> bindValue(":departement", $Medecin->getDepartement());

            $req-> execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }


    public function deleteMedecin($Medecin)
    {
        try {
            $req = $this->conn->prepare("delete from Medecin where id=:id) ");
            $req -> bindValue(":id", $Medecin->getId());
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }

    public function getMedecin()
    {
        try {
            $req = $this->conn->prepare("SELECT* FROM Medecin");
            $req->execute();

            $resultat = array();
            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = new Medecin($row["id"], $row["nom"], $row["prenom"], $row["adresse"], $row["cp"], $row["ville"], $row["tel"], $row["specialiteComplementaire"], $row["departement"]);

            }

        } catch (PDOException $e) {
            print "Erreur" . $e->getMessage();
            die();
        }
        return $resultat;


    }

    public function getMedecinParID($id)
    {

        try {
            $req = $this->conn->prepare("SELECT*FROM Medecin WHERE id=:id");
            $req->bindvalue(":id", $id);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                $Medecin= new Medecin($resultat["id"], $resultat["nom"], $resultat["prenom"], $resultat["adresse"], $resultat["cp"], $resultat["ville"], $resultat["tel"], $resultat["specialiteComplementaire"], $resultat["departement"]);
                return $Medecin ;
            }
            else{
                return null;
            }
             }catch (PDOException $e) {
            print "Erreur !:" . $e->getMessage();
            die();
             }
             
    }













}