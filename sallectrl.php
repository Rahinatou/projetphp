<?php
require_once('../Modeles/SalleService.php');
$salleService = new SalleService();

$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

if ($action == 'form') {
    header("Location: ../Vues/Salle/ajout.php");
}

if ($action == 'liste') {
    header("Location: ../Vues/Salle/liste.php");
}

if ($action == 'delete') {
    $ids = $_GET['ids'];

    $salleService->delete($ids);

    header("Location: ../Vues/Salle/liste.php?message=Salle supprimée");
}

if ($action == 'ajout') {
    if (isset($_POST['nom'], $_POST['capacite'], $_POST['emplacement'], $_POST['etat'])) {
        $nom = $_POST['nom'];
        $capacite = $_POST['capacite'];
        $emplacement = $_POST['emplacement'];
        $etat = $_POST['etat'];

        $salleService->add($nom, $capacite, $emplacement, $etat);
            header("Location: ../Vues/Salle/liste.php?message=Salle ajoutée");
            exit();
        } 
}

if ($action == "modifier") {
    if (isset($_POST['ids'], $_POST['nom'], $_POST['capacite'], $_POST['emplacement'], $_POST['etat'])) {
        $ids = $_POST['ids'];
        $nom = $_POST['nom'];
        $capacite = $_POST['capacite'];
        $emplacement = $_POST['emplacement'];
        $etat = $_POST['etat'];

        $salleService->edit($ids, $nom, $capacite, $emplacement, $etat);
              header("Location: ../Vues/salle/liste.php?message=Salle modifiée");

            exit;
        } else {
            echo "Erreur lors de la modification.";
        }
} 
