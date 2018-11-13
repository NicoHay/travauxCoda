COUNTDOWN = {

  recup       : {},
  heure       : 0,
  minute      : 0,
  seconde     : 0,
  continuer   : null,
 
  
  
  init: function() {

    COUNTDOWN.recup = document.getElementsByClassName('inputs');
    var valide      = document.querySelector('#valider').addEventListener('click', COUNTDOWN.recupereValeur);
    var go          = document.querySelector('#go').addEventListener('click', COUNTDOWN.lance_decompte);
  },

  recupereValeur: function() {


    COUNTDOWN.heure   = parseInt(COUNTDOWN.recup[0].value);
    COUNTDOWN.minute  = parseInt(COUNTDOWN.recup[1].value);
    COUNTDOWN.seconde = parseInt(COUNTDOWN.recup[2].value);

    COUNTDOWN.traitementValeur();

  },

  traitementValeur: function() {

    

    if (COUNTDOWN.heure < 0 || COUNTDOWN.minute < 0 || COUNTDOWN.seconde < 0) {
      alert("Veuillez entrer un temps superieur à 0 ou valide  ... Hey Oui j'avais anticipé ce piège !")
    }
    if  (COUNTDOWN.heure > 23 || COUNTDOWN.minute > 59 || COUNTDOWN.seconde > 59 ){
      alert("hey oui xavier je l'avais prévu aussi ")

    }
     else {
    
      if ( (isNaN(COUNTDOWN.heure)) || (isNaN(COUNTDOWN.minute)) || (isNaN(COUNTDOWN.seconde)) ){

        alert("Veuillez entrer quelque chose et arretez de chercher la petite bête ")
  
      }else{
      document.getElementById('affichage').innerHTML = COUNTDOWN.formatageTime(COUNTDOWN.heure) + " H " + COUNTDOWN.formatageTime(COUNTDOWN.minute) + " M " + COUNTDOWN.formatageTime(COUNTDOWN.seconde) + " S ";
    }}
  },

  decompte: function() {



    COUNTDOWN.seconde -- ;

    if ((COUNTDOWN.heure == 0) && (COUNTDOWN.minute == 0) && (COUNTDOWN.seconde == 0) ){
      clearInterval(COUNTDOWN.continuer);
      
      var audio  = new Audio('ding.mp3');
      audio.play();
      
      
    }

    if (COUNTDOWN.seconde < 0) {
      COUNTDOWN.minute -- ;
      COUNTDOWN.seconde = 59;
    }
    if (COUNTDOWN.minute < 0) {
      COUNTDOWN.heure -- ;
      COUNTDOWN.minute = 59;
    }
      document.getElementById('affichage').innerHTML = COUNTDOWN.formatageTime(COUNTDOWN.heure) + " H " + COUNTDOWN.formatageTime(COUNTDOWN.minute) + " M " + COUNTDOWN.formatageTime(COUNTDOWN.seconde) + " S ";
  },

  lance_decompte: function() {
    COUNTDOWN.continuer = setInterval(COUNTDOWN.decompte, 50);
  },


  formatageTime : function(heure){

    if( heure <10 ){
    
     return "0" + heure;

    }else {
      return heure;
    }


  },



};  window.onload = COUNTDOWN.init;






