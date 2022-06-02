<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- On utilise la ****SUPER variable***** $_FILES  qui affiche les données du fichier envoyé par le formulaire -->
    <?= var_dump($_FILES); ?>
    <!-- Pour afficher la valeur d'une clé associée au fichier, on ouvre le premier tableau (crochet) et à la suite l'autre tableau à l'intérieur  -->
    <?= $_FILES['monfichier']['name'] ?>
    <!-- On utilise 'move_uploaded_file' pour récupérer le fichier enregistré de manière temporaire et l'enregistrer dans un dossier (ici= /uploads) / on note le chemin du fichier temporaire et sa destination (jusqu'à la virgule)
    'uploads/' . basename($_FILES['monfichier']['name']) == ceci est le nom du fichier -->
    <?php move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name'])); ?>

    <!-- On récupère les infos du fichier index.php. isset correspond à 'est-ce que ça existe?' / la ****SUPER variable**** $_POST est un tableau avec la clé+valeur. Elle permet de cacher les infos dans l'URL
    On fait une condition avec le 'if', on affiche 'bonjour+la valeur de la clé entrée -->
    <?php if (isset($_POST['prénom'])): ?>
        <!-- Les trois lignes en dessous sont présentes afin de bloquer tout code malveillant 
    le premier enlève les balises et les deux autres transforme le code entré en chaîne de caratères-->
        <p>Bonjour <?= strip_tags($_POST['prénom']);?></p>
        <p>Bonjour <?= htmlentities($_POST['prénom']);?></p>
        <p>Bonjour <?= htmlspecialchars($_POST['prénom']);?></p>
        <!-- Si aucune valeur n'est entrée, on affiche une valeur par défaut -->
    <?php else: ?>
        <p>Bonjour personne</p>
        <!-- On met fin à la condition avec 'ENDIF' -->
    <?php endif; ?>

</body>
</html>