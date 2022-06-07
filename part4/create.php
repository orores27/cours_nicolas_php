<?php
    $db = new PDO(
        //  on donne le nom de l'hôte, de la base
        'mysql:host=localhost;dbname=recipes;charset=utf8',
        'root',
        'root'
    );
    // Requête qui permet de créer un nouvel utilisateur
    
    $sqlQuery = 'INSERT INTO users (name, email, age) value (:name, :email, :age)';
    $Statement = $db->prepare($sqlQuery);
    $Statement ->execute([
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'age' => $_POST['age']
    ]);
    $Statement->fetchAll();
    // pour rediriger sur la page index ( quand on met seulement le ***/*** il va cherche la page index. php ou index.html si elles existent */)
    header('Location: /');
       
    // $sqlQuery = 'INSERT INTO recipes(title, recipe, author, is_enabled) value (:title, :recipes, :author, :is_enabled)'; 


    // Ma méthode : 
   // <?php
    //$db = new PDO(
        //  on donne le nom de l'hôte, de la base
       // 'mysql:host=localhost;dbname=recipes;charset=utf8',
      //  'root',
      //  'root'
   // );

   // $sqlQuery = 'INSERT INTO users(name, email, age) value(:name, :email, :age)';
    //$Statement = $db -> prepare($sqlQuery);

    //$Statement -> execute ([
      //  'email' => 'email',
       // 'name' => 'name',
      //  'age' => 'age'
   // ]);

    //$Statement ->fetchAll();
    //header('Location: /'); 


    $sqlQuery= 'INSERT INTO recipes(title, recipe, author) value(:title, :recipe, :author)';
    $Statement = $db ->prepare($sqlQuery);
    $Statement ->execute([
        'title' = $_POST['title'],
        'recipe' = $_POST['recipe'],
        'author' = $_POST['author']
    ]);
    $Statement->fetchAll();
    header('Location: /');