<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.CSS">
    <title>Page d'inscription</title>
</head>
<body>
<form method="POST" action="inscription.php">
    <h2>Formulaire d'inscription</h2>
    <input type="text" name="Username" id="use" placeholder="Choisissez un nom d'utilisateur" required><br><br>
    <input type="password" name="motpass" id="mp" placeholder="Choisissez un mot de passe" required><br><br>
    <input type="submit" name="inscrire" value="S'inscrire" id="register">
</form>

<?php
require_once("utilconnect.php");

if (isset($_POST["inscrire"])) {
    $Username = $_POST['Username'];
    $motpass = $_POST['motpass'];

    // Création d'une instance de UserService
    $userService = new UserService();

    // Inscription de l'utilisateur
    if ($userService->inscrire($Username, $motpass)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<p>Erreur lors de l'inscription. Le nom d'utilisateur est peut-être déjà pris.</p>";
    }
}
?>
</body>
</html>
