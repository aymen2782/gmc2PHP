<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 14/11/2018
 * Time: 12:14
 */

session_start();
$nom = $_POST['nom']??$_GET['nom']??'y a rien';
$prenom = $_POST['prenom']??$_GET['prenom']??'y a rien';

if (!isset($_SESSION['users'])) {
    header("location:register.php");
} else {
    if(isset($mesUsers[$nom]) && $mesUsers[$nom]==$prenom ){
        $_SESSION['connectedUser']=array('nom'=>$nom,
            'prenom'=>$prenom
        );
        header("location:home.php");
    }else{
        $message = "User existant";
        $_SESSION['error']=$message;
        header("location:register.php");
    }
}