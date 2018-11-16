<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 14/11/2018
 * Time: 11:46
 */
session_start();

if(!isset($_SESSION['connectedUser'])){
    header("location:login.php");
} else {
    $user = $_SESSION['connectedUser'];
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $user['prenom'].' '.$user['nom']  ?> </title>
    </head>
    <body>
        <h1>Home</h1>
        <?php
        // si on a un message on l'affiche
        if(isset($_SESSION['success'])){
        ?>
        <h2>Bienvenu <?= $user['prenom'].' '.$user['nom']  ?></h2>
        <?php
           // et on le supprime de la session pour qu'il apparaisse une seule fois
           unset($_SESSION['success']);
        } ?>

    </body>
    </html>

<?php
}
?>
