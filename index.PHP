<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.CSS">
    <title>Page de connexion</title>
</head>
<body>
<form method="POST">
    <h2>Formulaire d'authentification</h2>
    <input type="text" name="Username" id="use" placeholder="Saisie du nom d'utilisateur" required><br><br>
    <input type="password" name="motpass" id="mp" placeholder="Saisie du mot de passe" required><br><br>
    <input type="submit" name="envoyer" value="authent" id="send">
</form>

<?php
require_once("utilconnect.php");

if (isset($_POST["envoyer"]) && $_POST["envoyer"] == 'authent') {
    $Username = $_POST['Username'];
    $motpass = $_POST['motpass'];

    // Création d'une instance de UserService
    $userService = new UserService();

    // Vérification de l'utilisateur
    if ($userService->verifierUtilisateur($Username, $motpass)) {
        header("Location: dashboard.php");
        exit;
    } else {
        // Si les informations sont incorrectes, rediriger vers la page de connexion
        echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
    }
}
?>
<a href="inscription.php">S'inscrire</a>

</body>
</html>
