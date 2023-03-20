const blocks = [...document.getElementsByClassName("block")];
let joueur = document.getElementById("joueur");
let nouveauJeu = document.getElementById("nouveauJeu");
let joueurEnCours = 1;

const jouerBlock = (e) => {
  let idblock = e.target.id;

  let req = {
    id: parseInt(idblock)
  };
