<?php
    $db = new PDO(
        //  on donne le nom de l'hôte, de la base
        'mysql:host=localhost;dbname=recipes;charset=utf8',
        'root',
        'root'
    );

    $sqlQuery = 'UPDATE users SET email = :email, name= :name WHERE id= 4';
    $Statement = $db->prepare($sqlQuery);
    $Statement ->execute([
        'email' => $_POST['email'],
        'name' => $_POST['name'],
    ]);
    $Statement->fetchAll();
    header('Location: /');


    // DEMANDER à Nicolas pourquoi cette requête ne fonctionne pas et comment elle pourrait servir
    $sqlQuery = 'UPDATE users SET is_enabled = 0 WHERE name= "yo"';
    $Statement = $db->prepare($sqlQuery);
    $Statement ->execute([
        'name'=> $_POST['name']
    ]);
    header('Location: /')
    