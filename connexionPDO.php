<?php
class connexionPDO
{
   private $conn;
    public function __construct(){
        $login="root";
        $mdp="LxQYKQahV4u)C@s_";
        $bd="medical_william";
        $hote="localhost";

        try{
            $this->conn = new PDO("mysql:host=$hote;dbname=$bd",$login,$mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\''));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           

        }catch(PDOException $e){
            print"Erreur !:" . $e->getMessage();
        die();
        }
       

        
    }
   
    public function getconn(){
        return $this->conn;
    }
        
}   




?>