<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke; /* Fond gris clair */
            color: black;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Titre centré */
        h1 {
            color: rgb(180, 176, 176); /* Bleu foncé */
            font-size: 24px;
            margin-top: 20px;
        }

        /* Message de confirmation */
        .message {
            color: green;
            font-size: large;
            margin-bottom: 20px;
        }

        /* Tableau */
        table {
            width: 90%;
            max-width: 800px;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            border: 1px solid rgb(15, 108, 148); /* Bordure bleue */
            text-align: center;
        }

        th {
            background-color: rgb(15, 108, 148); /* En-tête bleu foncé */
            color: white;
            font-weight: bold;
        }

        td {
            background-color: white;
            color: black;
        }

        /* Boutons dans les cellules */
        input {
            background-color: rgb(15, 108, 148);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .action-input:hover {
            background-color: rgb(10, 90, 125);
        }

        a {
            color: red;
            font-weight: bold;
            text-decoration: none;
                   }
        .lien{
            color:  rgb(15, 108, 148);
            font-weight: bold;
            text-decoration: none;
                  }

    </style>
</head>
<body>
    <h1>Liste des salles</h1>
    <a href="../../Controlleurs/sallectrl.php?action=form" class="lien">Ajouter une salle</a>
   
    <?php 
        if(isset($_GET['message'])){
            ?>
              <span style="color: green; font-size: large"><?php echo $_GET['message']; ?></span>
        <?php }
    ?>

    <?php
    require_once('../../modeles/salleservice.php');
    $salleService = new SalleService();
    $salles = $salleService->liste();
    ?>    

    <table border="1" align="center">
    <tr>
        <th>Identifiant</th><th>Nom</th><th>Capacité</th><th>Emplacement</th><th>État</th><th>Action</th>
    </tr>
    <?php 
    foreach ($salles as $s) {
    ?>
        <tr>
            <td><?php echo $s['ids']; ?></td>
            <td><?php echo $s['nom']; ?></td>
            <td><?php echo $s['capacite']; ?></td>
            <td><?php echo $s['emplacement']; ?></td>
            <td><?php echo $s['etat']; ?></td>
            <td>
                <input form="f2" type="submit" value="Modifier" />
                <a href="../../Controlleurs/sallectrl.php?action=delete&ids=<?php echo $s['ids']; ?>" 
                   onclick="return window.confirm('Etes-vous sûr de vouloir supprimer cette salle ?')">Supprimer</a>
            </td>
        </tr>
    <?php } ?>
    </table>
    <form action="edit.php" method="post" id="f2"></form>

</body>
</html>
