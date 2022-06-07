<?php

try
{
    // $db = base de données ( c'est un objet de la classe PDO ) 
    // PDO est une classe toute faite de PHP qui sert à gérer les bases de données
    // **db** est un objet qui permet la connexion à la base de données
    //***PDO est une classe de PHP déjà existante */
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
    //  3 étapes obligatoires à faire systématiquement : préparer/executer/et fetch
    $usersStatement = $db->prepare($sqlQuery);
    $usersStatement->execute();
    $users = $usersStatement->fetchAll();

    //METHODE 2
    //  On fait la requête : on selectionne toutes les recettes de la table **recipes** où l'auteur correspond à gaga@didi.org et où la valeur est **true**
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

        <form action="delete.php" method="POST">
        <input type="number" name="id" value="<?= $user['id'] ?>" hidden>
        <button type="submit">Supprimer l'utilisateur</button>
        </form>
        <!-- on ferme la boucle -->
    <?php endforeach ?>

    <!--  je crée une boucle afin d'afficher le titre de la recette et les étapes -->
    <?php foreach($recipes as $recipe): ?>

        <p>Voici la recette : <?= $recipe['title'] ?></p>
        
        <p>Voici les étapes : <?php echo $recipe['recipe'] ?></p>
    <?php endforeach ?>

    <!--  formulaire pour modifier les données de l'utilisateur -->
        <form action="update.php" method='POST'>
        <label for="name">Nom</label>    
        <!-- le **for** du label sert à faire le lien entre l'**id** de l'input
        name = 'name' est la clé que l'on envoie, pareil pr name = 'email' 
        value= ***récupération des données existantes qui s'affichent dans l'input*** -->
        <input type="text" id="name" name="name" placeholder="Votre nom" value="<?= $user['name'] ?>">
        <label for="email">Votre adresse email</label>
        <input type="email" id="email" name="email" placeholder="Votre adresse email" value="<?= $user['email'] ?>" >
        <button type="submit">Soumettre</button>
        </form>

        <h3>Création de compte</h3>
        <form action="create.php" method='POST'>
        <label for="name">Nom</label>
        <input type="text" id="name" name="name">
        <label for="email">Votre mail</label>
        <input type="email" id="email" name="email" >
        <label for="age">Votre âge</label>
        <input type="number" name="age" id="age">
        <button type="submit">Envoyer</button>
        </form>

</body>
</html>