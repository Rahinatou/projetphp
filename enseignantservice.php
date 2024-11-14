<?php
require_once('Connexion.php');

class EnseignantService {
    private $con;

    function __construct() {
        $p = new Connexion();
        $this->con = $p->getconnection();
    }

    // Fonction pour ajouter un enseignant
    public function add($nom, $tel, $sexe, $titre, $email, $adresse, $departement) {
        $requete = "INSERT INTO enseignant (nom, tel, sexe, titre, email, adresse, departement) 
                    VALUES (:nom, :tel, :sexe, :titre, :email, :adresse, :departement)";
        
        $statement = $this->con->prepare($requete);
        
        // Exécute la requête avec les valeurs liées
        $result = $statement->execute([
            ':nom' => $nom,
            ':tel' => $tel,
            ':sexe' => $sexe,
            ':titre' => $titre,
            ':email' => $email,
            ':adresse' => $adresse,
            ':departement' => $departement
        ]);
        
        return $result;
    }

    // Fonction pour modifier un enseignant
    public function edit($ide, $nom, $tel, $sexe, $titre, $email, $adresse, $departement) {
        $requete = "UPDATE enseignant SET nom = :nom, tel = :tel, sexe = :sexe, titre = :titre, email = :email, adresse = :adresse, departement = :departement WHERE ide = :ide";
        $statement = $this->con->prepare($requete);
    
        // Exécution de la requête avec les valeurs fournies
        $result = $statement->execute([
            ':ide' => $ide, // Identifiant pour trouver l'enseignant
            ':nom' => $nom,
            ':tel' => $tel,
            ':sexe' => $sexe,
            ':titre' => $titre,
            ':email' => $email,
            ':adresse' => $adresse,
            ':departement' => $departement
        ]);
    
        return $result;
    }

    // Fonction pour supprimer un enseignant
    public function delete($ide) {
        $requete = "DELETE FROM enseignant WHERE ide = :ide";
        $statement = $this->con->prepare($requete);
        $resultat = $statement->execute([
           ':ide' => $ide
        ]);
        
        return $resultat;
    }

    // Fonction pour lister tous les enseignants
    public function liste() {
        $requete = "SELECT * FROM enseignant ORDER BY ide ASC";
        $statement = $this->con->query($requete);
        $enseignants = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $enseignants;
    }

    // Fonction pour obtenir un enseignant par identifiant
    public function getById($ide) {
        $requete = "SELECT * FROM enseignant WHERE ide = :ide";
        $statement = $this->con->prepare($requete);
        $statement->execute([
            'ide' => $ide
        ]);
        
        $enseignant = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $enseignant[0];
    }
}

