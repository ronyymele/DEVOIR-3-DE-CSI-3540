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






















?>