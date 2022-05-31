<?php

$users = [
    [
        'name' => 'Sabah',
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
    <?php var_dump($_POST);
        // On fait une condition : si on reçoit bien un login et un mot de passe alors on exécute : 
        // On ajoute une fonction PHP 'empty" et on place un point d'exclamation avant pr dire le contraire : cela nous sert à : si le champ login n'est pas vide et si le champ mdp n'est pas vide on continue l'exécution du script
        if (isset($_POST["login"]) && isset($_POST["mdp"]) && !empty($_POST["login"]) && !empty($_POST["mdp"])) {
            // on cherche l'utilisateur qui correspond à l'entrée utilisateur
            foreach ($users as $user) {
                // On vérifie que le nom d'utilisateur et le bon mdp correspondent au entrées dans le formulaire
                if ($user['name'] === $_POST["login"] && $user['password'] === $_POST["mdp"]) {
                    // On crée une variable qui correspond à l'utilisateur qui se connecte ( but = que le site garde ses infos comme nom, âge, mail etc)
                    $utilisateur = ['nom' => $user['name']];
                } else {
                    // si aucun match on affiche un message
                    $message = 'Vos informations ne vous permettent pas de vous connecter';
                }
            }
        // On affiche un message d'erreur si le mdp et le login ne sont pas reçus
        } else {
            $message = "Merci de remplir tous les champs";
        }
    ?>

    
    <h1>Bienvenue !</h1>
    <!--  On affiche un message s'il existe et sinon on n'affiche rien -->
    <p><?php echo isset($message) ? $message : ''?></p>

    <h1>Erreur !</h1>
    <form action="home.php" method="POST">
        <label for="login">Identifiant</label>
        <input type="text" id="login" name="login">
        <label for="mdp">Mot de passe</label>
        <input type="password" id="mdp" name="mdp">
        <button type="submit">Connexion</button>
    </form>

</body>
</html>