<?php
require_once('Connexion.php');

class CoursService {
    private $con;

    function __construct() {
        $p = new Connexion();
        $this->con = $p->getconnection();
    }

    public function add($niveau, $idens, $idsall, $mat, $horaire, $duree) {
        $requete = "INSERT INTO cours (niveau, idens, idsall, mat, horaire, duree) 
                    VALUES (:nv, :idens, :idsall, :mat, :hr, :dur)";
        
        $statement = $this->con->prepare($requete);
        
        $result = $statement->execute([
            ':nv' => $niveau,
            ':idens' => $idens,
            ':idsall' => $idsall,
            ':mat' => $mat,
            ':hr' => $horaire,
            ':dur' => $duree
        ]);
        
        return $result;
    }
    
    public function edit($idc, $niveau, $idens, $idsall, $mat, $horaire, $duree) {
        $requete = "UPDATE cours SET niveau = :nv, idens = :idens, idsall = :idsall, mat = :mat, horaire = :hr, duree = :dur WHERE idc = :id";
        $statement = $this->con->prepare($requete);
    
        $result = $statement->execute([
            'id' => $idc,
            'nv' => $niveau,
            'idens' => $idens,
            'idsall' => $idsall,
            'mat' => $mat,
            'hr' => $horaire,
            'dur' => $duree
        ]);
    
        return $result;
    }
    
    public function delete($idc) {
        $requete = 'DELETE FROM cours WHERE idc = :id';
        $statement = $this->con->prepare($requete);
        $resultat = $statement->execute([
           'id' => $idc
        ]);

        return $resultat;
    }

    public function liste() {
        $requete = 'SELECT * FROM cours ORDER BY idc DESC';
        $statement = $this->con->query($requete);
        $cours = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cours;
    }

    public function getById($idc) {
        $requete = 'SELECT * FROM cours WHERE idc = :id';
        $statement = $this->con->prepare($requete);
        $statement->execute([
            'id' => $idc]);
        $cours = $statement->fetch(PDO::FETCH_ASSOC);
        return $cours[0];
    }
}

