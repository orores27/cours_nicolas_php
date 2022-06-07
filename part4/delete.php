<?php
    $db = new PDO(
        //  on donne le nom de l'hôte, de la base
        'mysql:host=localhost;dbname=recipes;charset=utf8',
        'root',
        'root'
    );
    // Requête qui permet de supprimer un utilisateur
    
    $sqlQuery = 'DELETE FROM users WHERE id=:id';
    $Statement = $db->prepare($sqlQuery);
    $Statement ->execute([
        'id' => $_POST['id']
    ]);
    $Statement->fetchAll();
    // pour rediriger sur la page index ( quand on met seulement le ***/*** il va cherche la page index. php ou index.html si elles existent */)
    header('Location: /');
       
    // $sqlQuery = 'INSERT INTO recipes(title, recipe, author, is_enabled) value (:title, :recipes, :author, :is_enabled)'; 

    //toute seule

    $sqlQuery = 'DELETE FROM users(email= :email, name= :name, age= :age) WHERE id= :id';
    $Statement= $db ->prepare($sqlQuery);
    $Statement->execute([
        'id'=> $_POST['id']
    ]);
    $Statement->fetchAll();
    header('Location: /');