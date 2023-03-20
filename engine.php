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


function jouerT($id, &$joueurEnCours, &$etat, &$victoire){

    if($etat[$id] == 0){
        $etat[$id] = $joueurEnCours;
    }
    if( siVictoire($etat, $joueurEnCours) ){
        $victoire = 1;
        //resetJeu($etat, $joueurEnCours, $victoire);
    }
    else{
        if($joueurEnCours == 1) {$joueurEnCours = 2;}
        else {$joueurEnCours = 1;}     
    }
    $_SESSION['joueurEnCours'] = $joueurEnCours;
    $_SESSION['etat'] = $etat;
    $_SESSION['victoire'] = $victoire;
}

//j'etablis les condition d'une victoire
function siVictoire(&$etat, &$joueurEnCours){
    $ret = false;
    if( ($etat[0] == $joueurEnCours) & ($etat[1] == $joueurEnCours) & ($etat[2] == $joueurEnCours) ) $ret =  true;
    elseif( ($etat[3] == $joueurEnCours) & ($etat[4] == $joueurEnCours) & ($etat[5] == $joueurEnCours) ) $ret =  true;
    elseif( ($etat[6] == $joueurEnCours) & ($etat[7] == $joueurEnCours) & ($etat[8] == $joueurEnCours) ) $ret =  true;

    elseif( ($etat[0] == $joueurEnCours) & ($etat[3] == $joueurEnCours) & ($etat[6] == $joueurEnCours) ) $ret =  true;
    elseif( ($etat[2] == $joueurEnCours) & ($etat[4] == $joueurEnCours) & ($etat[7] == $joueurEnCours) ) $ret =  true;
    elseif( ($etat[3] == $joueurEnCours) & ($etat[5] == $joueurEnCours) & ($etat[8] == $joueurEnCours) ) $ret =  true;

    elseif( ($etat[0] == $joueurEnCours) & ($etat[4] == $joueurEnCours) & ($etat[8] == $joueurEnCours) ) $ret =  true;
    elseif( ($etat[2] == $joueurEnCours) & ($etat[4] == $joueurEnCours) & ($etat[6] == $joueurEnCours) ) $ret =  true;

    return $ret;
  };

  function resetJeu(&$etat, &$joueurEnCours, &$victoire){
    $etat = [0,0,0,0,0,0,0,0,0];
    $joueurEnCours = 1;
    $victoire = 0;
    $_SESSION['joueurEnCours'] = $joueurEnCours;
    $_SESSION['etat'] = $etat;
    $_SESSION['victoire'] = $victoire;
  }

















?>