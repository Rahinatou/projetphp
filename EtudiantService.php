<?php
require_once('Connexion.php');

class Etudiantservice{
    private $con;

    function __construct() {
        $p=new Connexion();
        $this->con = $p->getconnection();
    }
    public function add($matricule, $nom, $prenom, $sexe, $tel, $datenaiss) {
        $requete = "INSERT INTO etudiant (matricule, nom, prenom, sexe, tel, datenaiss) 
                    VALUES (:mat, :nm, :pr, :sx, :tl, :ddn)";
        
        $statement = $this->con->prepare($requete);
        
        // Exécute la requête avec les valeurs liées
        $result = $statement->execute([
            ':mat' => $matricule,
            ':nm' => $nom,
            ':pr' => $prenom,
            ':sx' => $sexe,
            ':tl' => $tel,
            ':ddn' => $datenaiss
        ]);
        
        // Retourne le résultat de l'exécution pour savoir si l'insertion a réussi
        return $result;
    }
    
    public function edit($matricule, $nom, $prenom, $sexe, $tel, $datenaiss) {
        $requete = "UPDATE etudiant SET nom = :nm, prenom = :pr, sexe = :sx, tel = :tl, datenaiss = :ddn WHERE matricule = :mat";
        $statement = $this->con->prepare($requete);
    
        // Exécution de la requête avec les valeurs fournies
        $result = $statement->execute([
            'mat' => $matricule, // Identifiant pour trouver l'étudiant
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            'tl' => $tel,
            'ddn' => $datenaiss
        ]);
    
        return $result;
    }
    
    public function delete($matricule){
        $requete = 'delete from  etudiant where matricule = :m';
        $statement = $this->con->prepare($requete);
        $resultat = $statement->execute([
           'm' => $matricule
        ]);
    }
    public function liste(){
        $requete = 'SELECT * FROM etudiant order by matricule desc';
        $statement = $this->con->query($requete);
        $etudiant = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $etudiant;
    }
    public function getbymatricule($matricule){
        $requete = "SELECT * FROM etudiant WHERE matricule=:mat";
        $stmt = $this->con->prepare($requete);
        $res=$stmt->execute([
            'mat' => $matricule
        ]);
        $etudiant = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $etudiant[0];
    }
}


