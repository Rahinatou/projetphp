<?php
require_once('../Modeles/EnseignantService.php');
$ensService = new EnseignantService();

$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

if ($action == 'form') {
    Header("Location:../Vues/Enseignant/ajout.php");
}

if ($action == 'liste') {
    Header("Location:../Vues/Enseignant/liste.php");
}

if ($action == 'delete') {
    $ide = $_GET['ide'];

    $ensService->delete($ide);

    Header("Location:../Vues/Enseignant/liste.php?message=Enseignant supprimé");
}

if ($action == 'ajout') {
    if (isset($_POST['nom'], $_POST['tel'], $_POST['sexe'], $_POST['titre'], $_POST['email'], $_POST['adresse'], $_POST['departement'])) {
        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        $sexe = $_POST['sexe'];
        $matiere = $_POST['titre'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $departement = $_POST['departement'];

        $ensService->add($nom, $tel, $sexe, $matiere, $email, $adresse, $departement);
            header("Location: ../Vues/Enseignant/liste.php?message=Enseignant ajouté");
            exit();
        } 
        }
else 
    echo "Erreur lors de l'ajout de l'enseignant. Veuillez réessayer.";

if ($action == "modifier") {
    if (isset($_POST['ide'], $_POST['nom'], $_POST['tel'], $_POST['sexe'], $_POST['titre'], $_POST['email'], $_POST['adresse'], $_POST['departement'])) {
        $ide = $_POST['ide'];
        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        $sexe = $_POST['sexe'];
        $matiere = $_POST['titre'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $departement = $_POST['departement'];

        $ensService->edit($ide, $nom, $tel, $sexe, $titre, $email, $adresse, $departement);
            header("Location: ../Vues/Enseignant/liste.php?message=Enseignant modifié");
            exit;
        } 
} 
else 
    echo "Action non reconnue.";

