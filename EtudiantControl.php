<?php
require_once('../Modeles/EtudiantService.php');
$etService = new EtudiantService();


$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');
/*if(isset($_GET['action']))
    $action = $_GET['action'];
if(isset($_POST['action']))
    $action = $_POST['action'];*/

if ($action == 'form'){
    Header("Location:../Vues/Etudiant/ajout.php");
}

if($action == 'liste'){
    Header("Location:../Vues/Etudiant/liste.php");
}

if($action == 'delete'){
    $matricule = $_GET['matricule'];

    $etService->delete($matricule);

    Header("Location:../Vues/Etudiant/liste.php?message=Etudiant supprimé");
}

if ($action == 'ajout') {
    if (isset($_POST['matricule'], $_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['tel'], $_POST['datenaiss'])) {
        $matricule = $_POST['matricule'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $tel = $_POST['tel'];
        $datenaiss = $_POST['datenaiss'];

        // Appelle le service d'ajout et vérifie le résultat
        //if (
        $etService->add($matricule, $nom, $prenom, $sexe, $tel, $datenaiss);//) {
            header("Location: ../Vues/Etudiant/liste.php?message=Etudiant ajouté");
            exit(); // S'assure que la redirection se fait sans exécuter le code suivant
       // } else {
       //     echo "Erreur lors de l'ajout de l'étudiant. Veuillez réessayer.";
       // }
   // } else {
    //    echo "Erreur : informations de l'étudiant incomplètes. Vérifiez que tous les champs sont remplis.";
    }
}
if ($action == "modifier") {
          // Logique pour la modification
        // Appeler la fonction de mise à jour (update) ou rediriger vers la page de modification
        if (isset($_POST['matricule'], $_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['tel'], $_POST['datenaiss'])) {
            $matricule = $_POST['matricule'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $tel = $_POST['tel'];
            $datenaiss = $_POST['datenaiss'];
    
            // Appel à la fonction edit dans le service
            $etService->edit($matricule, $nom, $prenom, $sexe, $tel, $datenaiss); 
                // Redirection après la modification
                header("Location: ../Vues/Etudiant/liste.php?message= Etudiant modifié");
                exit;
            } else {
                echo "Erreur lors de la modification.";
            }

}
else
    echo "Action non reconnue.";