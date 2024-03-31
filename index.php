<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ace Agency JCF</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <img src="https://ace-agency.io/wp-content/uploads/2024/02/Logotype_Degrade.svg" alt="Logo" class="logo">

    <div class="container">

        <h1> Ace Agency | Moyenne </h1>

        <form method="post" action="index.php">
            <table>
                <tr>
                    <td><label for="prenom">Prénom</label></td>
                    <td><input type="text" name="prenom" id="prenom" /></td>
                </tr>
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" id="nom" /></td>
                </tr>
                <tr>
                    <td><label for="note1">Note 1</label></td>
                    <td><input type="number" name="note" id="note1" min="0" max="20" /></td>
                </tr>
                <tr>
                    <td><label for="note2">Note 2</label></td>
                    <td><input type="number" name="note2" id="note2" min="0" max="20" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" value="Calculer la moyenne">Calculer la moyenne</button></td>
                </tr>
            </table>
        </form>

      

    </div>

</body>

</html>




<?php

//ace_agency
//login: root

try {
    $bdd = new PDO('mysql:host=localhost;dbname=ace_agency;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Fonction pour vérifier si un champ est vide
function estVide($champ)
{
    return empty(trim($champ));
}

// Vérifie l'existence d'un formulaire
if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['note']) && isset($_POST['note2'])) {
    // Vérifie si les champs ne sont pas vides
    if (!estVide($_POST['prenom']) && !estVide($_POST['nom']) && !estVide($_POST['note']) && !estVide($_POST['note2'])) {
        // Vérifie si les notes sont comprises entre 0 et 20
        $note1 = $_POST['note'];
        $note2 = $_POST['note2'];
        if ($note1 >= 0 && $note1 <= 20 && $note2 >= 0 && $note2 <= 20) {
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $note1 = $_POST['note'];
            $note2 = $_POST['note2'];

            $requete = $bdd->prepare('INSERT INTO users (prenom, nom, note, note2) VALUES (?, ?, ?, ?)');
            $requete->execute(array($prenom, $nom, $note1, $note2));

            echo "Notes ajoutées avec succès !";

              header("Location: ".$_SERVER['PHP_SELF']); // Redirection vers la même page après le traitement du formulaire
            exit(); // Arrêt de l'exécution du script
            //pour ne pas renvoyer le formulaire


            
        } else {
            echo "Les notes doivent être comprises entre 0 et 20.";
        }
    } else {
        echo " * Tous les champs sont obligatoires.";
    }
}

$moyenne = 0;

$requete = $bdd->query('SELECT * FROM users ORDER BY id DESC LIMIT 4');

echo '<div class="container2"> <div class="data-table">
<table>
<tr>
<th> Prénom </th>
<th> Nom </th>
<th> Note 1 </th>
<th> Note 2 </th>
<th> Moyenne </th>
</tr>';


while ($donnees = $requete->fetch()) {

    $note1 = $donnees['note'];
    $note2 = $donnees['note2'];

    echo '<tr> 
    <td>' . htmlspecialchars($donnees['prenom']) . '</td>
    <td>' . htmlspecialchars($donnees['nom']) . '</td>
    <td>' . htmlspecialchars($donnees['note']) . '</td>
    <td>' . htmlspecialchars($donnees['note2']) . '</td>';

    //htmlspecialchars: pour éviter de rentrer un script dans les champs, éviter le hack

    $moyenne = ($note1 + $note2) / 2;
    echo '<td>' . $moyenne . '</td>
    </tr>';
}

$requete->closeCursor();

echo '</table>';

?>



