<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 14/11/2018
 * Time: 11:34
 */
session_start();
$nom = $_POST['nom']??$_GET['nom']??'y a rien';
$prenom = $_POST['prenom']??$_GET['prenom']??'y a rien';
// On vérifie si la session contient le tableau ou si c'est la première visite
if (isset($_SESSION['users'])){
    $mesUsers = $_SESSION['users'];
    //
    //Si l'utilisateur existe déjà on en l'ajoute pas
    if(isset($mesUsers[$nom])){
        $message = "User existant";
        $_SESSION['error']=$message;
        header("location:register.php");
    } else {
        $mesUsers[$nom]=$prenom;
        $_SESSION['users']=$mesUsers;
        $_SESSION['connectedUser']=array('nom'=>$nom,
            'prenom'=>$prenom
        );
        $message = "Bienvenu";
        $_SESSION['success']=$message;
        header("location:home.php");
    }
} else {
    // Todo
    $mesUsers = array();
    // et ajouter le user
    $mesUsers[$nom]=$prenom;
    // ajouuter tableau
    $_SESSION['users']=$mesUsers;
    $message = "Bienvenu";
    $_SESSION['success']=$message;
    $_SESSION['connectedUser']=array('nom'=>$nom,
                                     'prenom'=>$prenom
);
    header("location:home.php");
}

