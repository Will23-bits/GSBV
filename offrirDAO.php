<?php
class OffrirDAO
{
    private $conn;

    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();

    }

    public function ajoutOffrir($Offrir){
        try{
            $req=$this->conn->prepare("INSERT INTO Offrir values(:idrapport,:idMedicament,:quantite)");
            $req->bindValue(":idrapport",$Offrir->getIdRapport());
            $req->bindValue(":idMedicament", $Offrir->getIdMedicament());
            $req->bindValue(":quantite", $Offrir->getQuantite());
            $req->execute();




            }catch (PDOException $e){

            print "Erreur !;" . $e->getMessage();

            die();
        }
    }

    public function updateoffrir($Offrir){
        try {
            $req = $this->conn->prepare("UPDATE Offrir SET quantite=:quantite where idrapport=:idrapport and idMedicament=:idMedicament)");
            $req->bindValue(":idrapport",$Offrir->getIdRapport());
            $req->bindValue(":idMedicament", $Offrir->getIdMedicament());
            $req->bindValue(":quantite", $Offrir->getQuantite());
            $req-> execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }


    public function deleteOffrir($Offrir)
    {
        try {
            $req = $this->conn->prepare("DELETE from Offrir where idrapport=:idrapport and idMedicament=:idMedicament) ");
            $req->bindValue(":idrapport",$Offrir->getIdRapport());
            $req->bindValue(":idMedicament", $Offrir->getIdMedicament());
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }

    public function getOffrir()
    {
        try {
            $req = $this->conn->prepare("SELECT* FROM Offrir");
            $req->execute();

            $resultat = array();
            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = new offrir($row["idrapport"], $row["idMedicament"], $row["quantite"]);

            }

        } catch (PDOException $e) {
            print "Erreur" . $e->getMessage();
            die();
        }
        return $resultat;


    }

    public function getOffrirParID($idRapport, $idMedicament)
    {

        try {
            $req = $this->conn->prepare("SELECT*FROM Offrir where idrapport=:idrapport and idMedicament=:idMedicament");
            $req->bindvalue(":idrapport", $idRapport);
            $req->bindvalue(":idMedicament", $idMedicament);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                $Offrir = new Offrir($resultat["idrapport"], $resultat["idMedicament"],$resultat["quantite"]);
               
                return $Offrir;
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