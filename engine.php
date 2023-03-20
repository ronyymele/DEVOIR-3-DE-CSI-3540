<?php
session_start();
// Creation de l'objet qui contient tout les element important de notre jeu
$etat = [0,0,0,0,0,0,0,0,0];
$joueurEnCours = 1;
$victoire = 0;

if( isset($_SESSION['etat']) && isset($_SESSION['joueurEnCours']) && isset($_SESSION['victoire'] ) ){
    $etat = $_SESSION['etat'];
    $joueurEnCours = $_SESSION['joueurEnCours'];
}



if(isset($_POST['reset'])){
    resetJeu($etat, $joueurEnCours, $victoire);
    $tableau;
    for($i = 0; $i < 9; $i++){
        $tableau[$i]=$etat[$i];
    }
    array_push($tableau, $victoire);
    array_push($tableau, $joueurEnCours);
    echo json_encode($tableau);
    exit();
}else{
    jouerT($_POST['id'], $joueurEnCours, $etat, $victoire);
    $tableau;
    for($i = 0; $i < 9; $i++){
        $tableau[$i]=$etat[$i];
    }
    array_push($tableau, $victoire);
    array_push($tableau, $joueurEnCours);
    echo json_encode($tableau);
    exit();
}




















?>