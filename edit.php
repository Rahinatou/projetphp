<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Salle</title>
    <style>
        /* Style de base */
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(240, 240, 240);
            justify-content: center;
            align-items: center;
            height: 10vh;
            margin: 0;
        }

        /* Container du formulaire */
        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 50px;
            text-align: right;
        }

        /* Titre */
        h1 {
            color: rgb(15, 108, 148);
            font-size: 24px;
            margin-top: 20px;
        }

        /* Tableau pour aligner les champs */
        table {
            width: 100%;
            margin-top: 10px;
        }

        td {
            text-align: center;
            font-weight: bold;
            color: rgb(60, 60, 60);
        }

        /* Champs de saisie */
        input[type="text"],
        input[type="number"],
        input[type="datetime-local"] {
            width: 50%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgb(180, 176, 176);
                   }

        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            width: 20%;
            color: white;
            background-color: rgb(15, 108, 148);
        }

   </style>
</head>
<body>
    <h1>Formulaire de modification de salle</h1>

    <form action="../../Controlleurs/sallectrl.php" method="post">
        <table>
            <tr>
                <td>Identifiant</td>
                <td><input type="number" name="ids" autocomplete="off" required></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" autocomplete="off" required></td>
            </tr>
            <tr>
                <td>Capacité</td>
                <td><input type="number" name="capacite" required></td>
            </tr>
            <tr>
                <td>Emplacement</td>
                <td><input type="text" name="emplacement" required></td>
            </tr>
            <tr>
                <td>État</td>
                <td><select name="etat">
                        <option value="">Veuillez choisir l'état de la salle</option>
                        <option value="occupée">Occupée</option>
                        <option value="libre">Libre</option>
                    </select></td>
            </tr>
            <input type="hidden" name="action" value="modifier">
            <tr>
                <td colspan="2">
                   <input type="submit" value="Modifier">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
