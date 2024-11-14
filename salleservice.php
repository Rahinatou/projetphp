<?php
require_once('Connexion.php');

class SalleService {
    private $con;

    function __construct() {
        $p = new Connexion();
        $this->con = $p->getconnection();
    }

    public function add($nom, $capacite, $emplacement, $etat = 'occupée') {
        $requete = "INSERT INTO salle (nom, capacite, emplacement, etat) 
                    VALUES (:nm, :cap, :emp, :et)";
        
        $statement = $this->con->prepare($requete);
        
        $result = $statement->execute([
            ':nm' => $nom,
            ':cap' => $capacite,
            ':emp' => $emplacement,
            ':et' => $etat 
        ]);
        
        return $result;
    }
    
    public function edit($ids, $nom, $capacite, $emplacement, $etat) {
        $requete = "UPDATE salle SET nom = :nm, capacite = :cap, emplacement = :emp, etat = :et WHERE ids = :id";
        $statement = $this->con->prepare($requete);
    
        $result = $statement->execute([
            'id' => $ids,
            'nm' => $nom,
            'cap' => $capacite,
            'emp' => $emplacement,
            'et' => $etat
        ]);
    
        return $result;
    }
    
    public function delete($ids) {
        $requete = 'DELETE FROM salle WHERE ids = :id';
        $statement = $this->con->prepare($requete);
        $resultat = $statement->execute([
           'id' => $ids
        ]);
    }

    public function liste() {
        $requete = 'SELECT * FROM salle ORDER BY ids ASC';
        $statement = $this->con->query($requete);
        $salles = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $salles;
    }

    public function getById($ids) {
        $requete = 'SELECT * FROM salle WHERE ids = :id';
        $statement = $this->con->prepare($requete);
        $statement->execute([
            'id' => $ids]);
        $salle = $statement->fetch(PDO::FETCH_ASSOC);
        return $salle[0];
    }
}

