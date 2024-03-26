<?php
class MedicamentDAO{

    private $conn;

    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();

    }

    public function ajoutMedicament($Medicament){
        try{
            $req=$this->conn->prepare("INSERT INTO Meddicament values(:id,:nomComercial,:idfamille,:compositiont,:effects,:contreIndications)");
            $req->bindValue(":id",$Medicament->getId());
            $req->bindValue(":nomcomercial", $Medicament-> getNomCommercial());
            $req->bindValue(":idfamille", $Medicament->getIdFamille());
            $req->bindValue(":compositiont", $Medicament->getComposition());
            $req->bindValue(":effect", $Medicament->getEffets());
            $req->bindValue(":contreIndications", $Medicament->getContreIndications());
           
            $req->execute();




            }catch (PDOException $e){

            print "Erreur !;" . $e->getMessage();

            die();
        }
    }

    public function updateMedicament($Medicament){
        try {
            $req = $this->conn->prepare("UPDATE Medecin SET nomComercial= :nomComercial , idfamille= :idfamille ,compositiont=:compositiont,effects=:effects,contreIndications=:contreIndications where id=:id)");
            $req->bindValue(":id",$Medicament->getId());
            $req->bindValue(":nomcomercial", $Medicament-> getNomCommercial());
            $req->bindValue(":idfamille", $Medicament->getIdFamille());
            $req->bindValue(":compositiont", $Medicament->getComposition());
            $req->bindValue(":effect", $Medicament->getEffets());
            $req->bindValue(":contreIndications", $Medicament->getContreIndications());
            $req-> execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }


    public function deleteMedicament($Medicament) {
        try {
            $req = $this->conn->prepare("delete from Medicament where id=:id) ");
            $req -> bindValue(":id", $Medicament->getId());
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }

    public function getMedicament()
    {
        try {
            $req = $this->conn->prepare("SELECT* FROM Medicament");
            $req->execute();

            $resultat = array();
            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = new Medicament($row["id"], $row["nomcomercial"], $row["idfamille"], $row["compositiont"],$row["effects"], $row["contreIndications"]);

            }

        } catch (PDOException $e) {
            print "Erreur" . $e->getMessage();
            die();
        }
        return $resultat;


    }

    public function getMedicamentParID($id)
    {

        try {
            $req = $this->conn->prepare("SELECT*FROM Medicament WHERE id=:id");
            $req->bindvalue(":id", $id);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                $Medicament= new Medicament($resultat["id"],  $resultat["nomcomercial"], $resultat["idfamille"], $resultat["compositiont"],$resultat["effects"], $resultat["contreIndications"]);

                return $Medicament ;
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