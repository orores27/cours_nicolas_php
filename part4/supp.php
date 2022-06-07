<?php
    $db = new PDO(
        //  on donne le nom de l'hôte, de la base
        'mysql:host=localhost;dbname=recipes;charset=utf8',
        'root',
        'root'
    );

    $sqlQuery = 'DELETE FROM users WHERE id = :id';
    $Statement = $db ->prepare($sqlQuery);
    $Statement ->execute([
        'id' = $_POST['id']
    ])
    $Statement->fetchAll($sqlQuery);
    header('Location: /');