<?php
    $db = new PDO(
        //  on donne le nom de l'hôte, de la base
        'mysql:host=localhost;dbname=recipes;charset=utf8',
        'root',
        'root'
    );
        $sqlQuery = 
        'UPDATE users
        SET email = ' . $_POST['email'] . ',
        name = ' . $_POST['name'] . ',
        WHERE id = 2;'
        
        $usersStatement = $db->prepare($sqlQuery);
        $usersStatement->execute();
        $users = $usersStatement->fetchAll();

        // UPDATE client
        //     SET rue = '49 Rue Ameline',
        //     ville = 'Saint-Eustache-la-Forêt',
        //     code_postal = '76210'
        //     WHERE id = 2

          //METHODE 2
    
    // $sqlQuery = 'UPDATE users SET email = $_POST['email'], name = $_POST['name'], WHERE id = 2;';
    // // 
    // $usersStatement = $db->prepare($sqlQuery);
    // // 
    // $usersStatement ->execute([
    //     'email' => 'sabah@perdu.com',
    //     'id' => 2,
    // ]);
    // // 
    // $users = $usersStatement->fetchAll();
       