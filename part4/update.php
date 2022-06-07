<?php
    $db = new PDO(
        //  on donne le nom de l'hôte, de la base
        'mysql:host=localhost;dbname=recipes;charset=utf8',
        'root',
        'root'
    );
    $sqlQuery = 'UPDATE users SET email = :email, name = :name WHERE id = 2';
    $Statement = $db->prepare($sqlQuery);
    $Statement ->execute([
        'email' => $_POST['email'],
        'name' => $_POST['name'],
    ]);
    $Statement->fetchAll();
    // pour rediriger sur la page index ( quand on met seulement le ***/*** il va cherche la page index. php ou index.html si elles existent */)
    header('Location: /');
       
    // $sqlQuery = 'INSERT INTO recipes(title, recipe, author, is_enabled) value (:title, :recipes, :author, :is_enabled)'; 