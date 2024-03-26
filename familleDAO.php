<?php
class FamilleDAO
{
    private $conn;

    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();

    }

    public function ajoutfamille($famille){
        try{
            $req=$this->conn->prepare("INSERT INTO famille values(:id,:libelle)");
            $req->bindValue(":id",$famille->getId());
            $req->bindValue(":libelle", $famille->getlibelle());
            $req->execute();




            }catch (PDOException $e){

            print "Erreur !;" . $e->getMessage();

            die();
        }
    }

    public function updatefamille($famille){
        try {
            $req = $this->conn->prepare("UPDATE famille SET libelle= :libelle where id=:id)");
            $req -> bindValue(":id", $famille->getId());
            $req -> bindValue(":libelle", $famille->getlibelle());
            $req-> execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }


    public function deletefamille($famille)
    {
        try {
            $req = $this->conn->prepare("delete from famille where id=:id) ");
            $req -> bindValue(":id", $famille->getId());
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !;" . $e->getMessage();
            die();
        }
    }

    public function getfamille()
    {
        try {
            $req = $this->conn->prepare("SELECT* FROM famille");
            
            $req->execute();

            $resultat = array();
            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = new famille($row["id"], $row["libelle"]);

            }

        } catch (PDOException $e) {
            print "Erreur" . $e->getMessage();
            die();
        }
        return $resultat;


    }

    public function getfamilleParID($id)
    {

        try {
            $req = $this->conn->prepare("SELECT*FROM Famille WHERE id=:id");
            $req->bindvalue(":id", $id);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                $famille = new famille($resultat["id"], $resultat["libelle"]);
                return $famille;
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



?>