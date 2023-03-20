const blocks = [...document.getElementsByClassName("block")];
let joueur = document.getElementById("joueur");
let nouveauJeu = document.getElementById("nouveauJeu");
let joueurEnCours = 1;

const jouerBlock = (e) => {
  let idblock = e.target.id;

  let req = {
    id: parseInt(idblock)
  };
  
  $.ajax({
    type: 'POST',
    url: "engine.php",
    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
    data: jQuery.param(req),
    success: function (response) {
      let arr = JSON.parse(response);
      console.log(arr);
      draw(arr);

      if (arr[9] == 1) {

        // cette commande indique quel est le joueur qui a gagné
        alert("FELICITATION Le gagnant est le joueur " );
        resetJeu();
        
        //reset

        blocks.forEach((c) => (c.textContent = ""));
      }
      else if (arr[9] === 2) {
        alert("Match null RESSAYER!");
        resetetat();
        blocks.forEach((c) => (c.textContent = ""));
      }
    }

  });


};

