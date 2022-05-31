<?php

// Avant toute écriture de code, il faut écrire ****session_start() pour démarrer la session et avoir accès à la variable globale ***$_SESSION*** (qui est aussi une super variable)
session_start();
var_dump($_SESSION);
$users = [
    [
        'name' => 'Sabah',
        'email' => 'sabah@truc.org',
        'password' => 'truc'
    ], [
        'name' => 'Christophe',
        'password' => 'prof'
    ]
];

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
    <?php
        // On fait une condition : si on reçoit bien un login et un mot de passe alors on exécute : 
        if (isset($_POST["login"]) && isset($_POST["mdp"])) {
            // On ajoute une fonction PHP 'empty" et on place un point d'exclamation avant pr dire le contraire : cela nous sert à : si le champ login n'est pas vide et si le champ mdp n'est pas vide on continue l'exécution du script  ***A preciser*** on demande que la première condition se fasse puis ENSUITE la 2ème condition
            if(!empty($_POST["login"]) && !empty($_POST["mdp"])) {
                // on cherche l'utilisateur qui correspond à l'entrée utilisateur
                foreach ($users as $user) {
                    // On vérifie que le nom d'utilisateur et le bon mdp correspondent au entrées dans le formulaire
                    if ($user['name'] === $_POST["login"] && $user['password'] === $_POST["mdp"]) {
                        // On crée une variable qui correspond à l'utilisateur qui se connecte ( but = que le site garde ses infos comme nom, âge, mail etc)
                        $_SESSION['loggedUser'] = ['nom' => $user['name']];
                        // Création d'un ***COOKIE***  avec nom du cookie = LOGGED_USER
                        setcookie(
                            'LOGGED_USER',
                            // la valeur de la clé
                            $user['email'],
                            //  Tableau d'options ici expiration
                            [
                                'expires' => time() + 365*24*3600
                            ]
                        );
                    } else {
                        // si aucun match on affiche un message
                        $message = 'Vos informations ne vous permettent pas de vous connecter';
                    }
                }
            } else {
                // On affiche un message d'erreur si le mdp et le login ne sont pas reçus
                $message = "Merci de remplir tous les champs";
            } 
        }
    ?>
    <!-- si l'utilisateur existe on affiche le message : 'Bienvenue ! Bonjour +nom utilisateur -->
    <?php if (isset($_SESSION['loggedUser'])): ?>

        <h1>Bienvenue !</h1>
        <p>Bonjour <?= $_SESSION['loggedUser']['nom']; ?></p>
        <!-- on insert un lien cliquable qui permet de se déconnecter -->
        <a href="/logout">Me déconnecter</a>
<!-- sinon on n'affiche le message d'erreur et le formulaire à remplir de nouveau -->
    <?php else: ?>

        <!--  On affiche un message s'il existe et sinon on n'affiche rien -->
        <p><?php echo isset($message) ? $message : ''?></p>
        <!--  On appelle le formulaire ici (raccourci au lieu de mettre le formulaire en entier) -->
        <?php include('connexion.php'); ?>
        <!-- On met fin à la condition -->
    <?php endif; ?>
        <!-- On affiche la suite de la page / sans le ***endif***, on continuerait la condition et la suite ne s'afficherait pas. -->
    <p>Recettes !</p>

    <form action="" method="GET">
        <input type="checkbox" name="check" id="">
        <button type="submit"></button>
    </form>

    <?= var_dump($_COOKIE); ?>
</body>
</html>