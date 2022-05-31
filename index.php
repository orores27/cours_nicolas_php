<?php

var_dump($_POST);

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
    <!-- Crétaion d'un formulaire / action="bonjour.php" appelle le fichier qui traite le formulaire. On utilise la méthode "POST" pour cacher les infos dans l'URL; Si on veut afficher les infos on utilise la méthode "GET"  
    On entre la clé 'enctype' pour pouvoir ajouter la possibilté d'envoyer un fichier *** la method doit être en **POST**-->
    <form action="bonjour.php" method="POST" enctype="multipart/form-data">
        <label for="name">prénom</label>
        <!-- Le 'name="prénom" -ligne20-' correspond à la clé du paramètre qui sera envoyé par le formulaire ex : prénom entré-->
        <input type="text" id="name" name="prénom" value="defaut">
        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="nom">
        <!-- On utilise cette ligne pour que l'input soit invisible "HIDDEN". Son but : transmettre des données d'une page à une autre -->
        <input type="text" name="secret" value="utilisateur numéro 5" hidden>
        <!-- On met un "INPUT" pour que l'utilisateur puisse envoyer un fichier; On précise avec 'accept' quel fichier est accepté, ici = png et jpg -->
        <input type="file" name="monfichier" id="monfichier" accept="image/png, image/jpeg">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>