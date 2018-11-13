COUNTDOWN = {

    recup: {},
    heure: 0,
    minute: 0,
    seconde: 0,
    continuer: null,
    choixJoueur: 0,
    timer: 0,
    millis: 0,
    delai: 0,





    init: function() {

        var timetogo = Date.now() + COUNTDOWN.choixJoueur;
        COUNTDOWN.recup = document.getElementsByClassName('inputs');
        var valide = document.querySelector('#valider').addEventListener('click', COUNTDOWN.recupereValeur);
        var go = document.querySelector('#go').addEventListener('click', COUNTDOWN.lance_decompte);
    },

    recupereValeur: function() {
        COUNTDOWN.delai = parseInt(((COUNTDOWN.recup[0].value) * 3600000) + ((COUNTDOWN.recup[1].value) * 60000) + ((COUNTDOWN.recup[2].value) * 1000));

        COUNTDOWN.timetogo = Date.now() + COUNTDOWN.delai;

        COUNTDOWN.traitementValeur();


    },

    traitementValeur: function() {



        if (COUNTDOWN.timer < 0) {
            alert("Veuillez entrer un temps superieur à 0 ou valide  ... Hey Oui j'avais anticipé ce piège !")
        } else {
            document.getElementById('affichage').innerHTML = (COUNTDOWN.timetogo - Date.now()) / 1000;
        }


    },

    decompte: function() {



        COUNTDOWN.millis = COUNTDOWN.timetogo - Date.now();

        COUNTDOWN.timer = Math.round(COUNTDOWN.millis / 1000);





        if (COUNTDOWN.timer == 0) {
            clearInterval(COUNTDOWN.continuer);

            var audio = new Audio('ding.mp3');
            audio.play();
        }


        document.getElementById('affichage').innerHTML = COUNTDOWN.timer
    },

    lance_decompte: function() {
        COUNTDOWN.continuer = setInterval(COUNTDOWN.decompte, 1000);
    },


    formatageTime: function(heure) {

        if (heure < 10) {

            return "0" + heure;

        } else {
            return heure;
        }


    },



};
window.onload = COUNTDOWN.init;