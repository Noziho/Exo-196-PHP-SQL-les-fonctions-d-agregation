<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.
require __DIR__ . '/Config.php';
require __DIR__ . '/DB_Connect.php';

$stmt = DB_Connect::dbConnect()->prepare("SELECT MIN(age) as min_age FROM user");
    if ($stmt->execute()) {
        $min = $stmt->fetch();
        echo "Age minimum: " . $min['min_age'] . "<br>";
    }

    $stmt = DB_Connect::dbConnect()->prepare("SELECT MAX(age) as max_age FROM user");
    if ($stmt->execute()) {
    $max = $stmt->fetch();
    echo "Age maximum: " . $max['max_age'] . "<br>";
    }

    $stmt = DB_Connect::dbConnect()->prepare("SELECT count(*) as number FROM user");
    if ($stmt->execute()) {
    $nbr_user = $stmt->fetch();
    echo "Nombre d'utilisateurs:  " . $nbr_user['number'] . "<br>";
    }

    $stmt = DB_Connect::dbConnect()->prepare("SELECT count(*) as number FROM user WHERE numero >= 5");
    if ($stmt->execute()) {
    $nbr_user = $stmt->fetch();
    echo "Utilisateurs ayant un numéro de rue plus grand ou égal à 5:  " . $nbr_user['number'] . "<br>";
    }

    $stmt = DB_Connect::dbConnect()->prepare("SELECT AVG(age) as moy_age FROM user");
    if ($stmt->execute()) {
    $moy_age = $stmt->fetch();
    echo "La moyenne d'âge est de :  " . $moy_age['moy_age'] . "<br>";
    }

    $stmt = DB_Connect::dbConnect()->prepare("SELECT SUM(numero) as add_num FROM user");
    if ($stmt->execute()) {
    $add_age = $stmt->fetch();
    echo "Le résultat de l'addition entre les numéros de maison est de :  " . $add_age['add_num'] . "<br>";
    }
    ?>
</body>
</html>

