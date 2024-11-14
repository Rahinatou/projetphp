<?php
require_once("Modeles/Connexion.php");

class UserService {
    private $con;

    public function __construct() {
        $connexion = new Connexion();
        $this->con = $connexion->getconnection();
    }

    public function verifierUtilisateur($Username, $motpass) {
        $verif = "SELECT Username, motpass FROM users WHERE Username = :username AND motpass = :motpass";
        $statement = $this->con->prepare($verif);
        $statement->execute(['username' => $Username, 'motpass' => $motpass]);
        $recupUser = $statement->fetch();

        return $recupUser && $recupUser['Username'] == $Username && $recupUser['motpass'] == $motpass;
    }public function inscrire($Username, $motpass) {
        try {
            // Vérification si l'utilisateur existe déjà
            $verif = "SELECT Username FROM users WHERE Username = :username";
            $statement = $this->con->prepare($verif);
            $statement->execute(['username' => $Username]);
    
            if ($statement->fetch()) {
                echo "<p>Erreur : Ce nom d'utilisateur existe déjà.</p>";
                return false;
            }
    
            // Insertion du nouvel utilisateur avec un mot de passe haché
            $insert = "INSERT INTO users (Username, motpass) VALUES (:username, :motpass)";
            $statement = $this->con->prepare($insert);
            $hashedPassword = password_hash($motpass, PASSWORD_DEFAULT); // Sécuriser le mot de passe
            if ($statement->execute(['username' => $Username, 'motpass' => $hashedPassword])) {
                return true;
            } else {
                echo "<p>Erreur lors de l'insertion des données.</p>";
                return false;
            }
        } catch (PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage() . "</p>";
            return false;
        }
    }
    
}