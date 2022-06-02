<?php

try
{
    // $db = base de données ( c'est un objet de la classe PDO ) 
    // PDO est une classe toute faite de PHP qui sert à gérer les bases de données
	$db = new PDO(
        //  on donne le nom de l'hôte, de la base
        'mysql:host=localhost;dbname=recipes;charset=utf8',
        'root',
        'root'
    );
    //  message qui apparaît si la connexion a réussi
    echo 'Vous êtes connecté';
    // ligne 18 : on demande à la db de préparer la requête sql
    // ligne 17 : on fait une requête sql / l19 : on execute te l20 : on récupère les données

    //METHODE 1
    $sqlQuery = 'SELECT * FROM users';
    $usersStatement = $db->prepare($sqlQuery);
    $usersStatement->execute();
    $users = $usersStatement->fetchAll();

    //METHODE 2
    //  On fait la requête : on selectionne toutes les recette de la table **recipes** où l'auteur correspond à gaga@didi.org et où la valeur est **true**
    $sqlQuery = 'SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled';
    // on prépare la requête 
    $recipesStatement = $db->prepare($sqlQuery);
    // on exécute la requête en entrant les paramètres de la requête : **author** correspond au mail user et **is_enabled** correspond à true ou false
    $recipesStatement ->execute([
        'author' => 'nicolas@boss.com',
        'is_enabled' => true,
    ]);
    // On récupère les données
    $recipes = $recipesStatement->fetchAll();

    var_dump($recipes);
 
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--  Boucle ****FOREACH*** on prend la table users et dedans chaque user -->
    <?php foreach($users as $user): ?>
        <!-- ici on veut afficher le nom de l'user : on selectionne la table user et son nom = name -->
        <p>Bonjour <?= $user['name'] ?></p>
        <!-- ici on veut afficher le mail de l'user : on selectionne la table user et son mail = email -->
        <p>Votre adresse mail est : <?= $user['email'] ?></p>
        <!-- on ferme la boucle -->
    <?php endforeach ?>


        <form action="update.php" method='POST'>
        <label for="name">Nom</label>    
        <input type="text" id="name" name="name" placeholder="Votre nom" value="<?= $user['name'] ?>">
        <label for="email">Votre adresse email</label>
        <input type="email" id="email" name="email" placeholder="Votre adresse email" value="<?= $user['email'] ?>" >
        <button type="submit">Soumettre</button>
        </form>


</body>
</html>