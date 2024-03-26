<?php
class RapportDAO{

    private $conn;

    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();

    }

    public function ajout($Rapport){
        try{
            $req=$this->conn->prepare("INSERT INTO Rapport values(:id,:idvisiteur,:idMedecin,:dates,:bilan,:motif)");
            $req->bindValue(":id",$Rapport->getIdRapp());
            $req->bindValue(":idvisiteur", $Rapport-> getVisiteur());
            $req->bindValue(":idMedecin", $Rapport->getMedecin());
            $req->bindValue(":dates", $Rapport->getDates());
            $req->bindValue(":bilan", $Rapport->getBilan());
            $req->bindValue(":motif", $Rapport->getmotif());
           
            $req->execute();




            }catch (PDOException $e){

            print "Erreur !;" . $e->getMessage();

            die();
        }
    }

    public function update($Rapport){
        try {
            $req = $this->conn->prepare("UPDATE Rapport SET  idvisiteur :idvisiteur ,idMedcin=:idMedecin,dates=:dates,bilan=:bilan, motif=:motif where id=:id)");
            $req->bindValue(":id",$Rapport->getIdRapp());
            $req->bindValue(":idvisiteur", $Rapport-> getVisiteur());
            $req->bindValue(":idMedecin", $Rapport->getMedecin());
            $req->bindValue(":dates", $Rapport->getDates());
            $req->bindValue(":bilan", $Rapport->getBilan());
            $req->bindValue(":motif", $Rapport->getmotif());
            $req-> execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }


    public function deleteRapport($Rapport) {
        try {
            $req = $this->conn->prepare("delete from Rapport where id=:id) ");
            $req->bindValue(":id",$Rapport->getIdRapp());
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }

    public function getRapport()
    {
        try {
            $req = $this->conn->prepare("SELECT* FROM Rapport");
            $req->execute();

            $resultat = array();
            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = new Rapport($row["id"], $row["idvisiteur"], $row["idMedecin"], $row["Dates"],$row["Bilan"], $row["motif"]);

            }

        } catch (PDOException $e) {
            print "Erreur" . $e->getMessage();
            die();
        }
        return $resultat;


    }

    public function getRapportParID($id)
    {

        try {
            $req = $this->conn->prepare("SELECT*FROM Rapport WHERE id=:id");
            $req->bindvalue(":id", $id);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                $Rapport= new Rapport($resultat["id"],  $resultat["idvisiteur"], $resultat["idMedecin"], $resultat["Dates"],$resultat["Bilan"], $resultat["Motif"]);

                return $Rapport ;
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