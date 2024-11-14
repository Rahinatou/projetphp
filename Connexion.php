<?php

class Connexion{
    private $host = 'localhost';
    private $dbname = 'scolarite';
    private $user = 'root';
    private $password = '';

    public function getconnection() {
        try {
            $con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->password);
        if($con){
            echo "Connecting to batabase";
            return $con;
            }
        else
        {
            echo'Erreu de connexion';
            return null;
        }
        
         } catch (PDOException $e) {
    
          echo "No connection" . $e->getMessage();
        }
    }
}

$p=new Connexion();
$p->getconnection();
