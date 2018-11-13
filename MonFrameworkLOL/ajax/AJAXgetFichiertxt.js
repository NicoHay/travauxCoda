AJAXOU = {

    donneeTxt: '',
    btnAffichage: '',
    zoneAffichage: '',


    init: function() {

        AJAXOU.btnAffichage = document.querySelector("#btn");
        AJAXOU.btnAffichage.addEventListener('click', AJAXOU.recupFichier);
        AJAXOU.zoneAffichage = document.querySelector(".affichage");


    },

    recupFichier: function() {


        var xhttp = new XMLHttpRequest();

        xhttp.open("GET", "fichier.txt", true); // adresse du fichier texte a lire 

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState === 4) {

                if (xhttp.status === 200 || xhttp.status == 0) {

                    var retour = (xhttp.response);

                    AJAXOU.verifFichier(retour);
                }
            }
        }
        xhttp.send();
    },




    verifFichier: function(param) {

        AJAXOU.afficheFichier(retour);
    },

    afficheFichier: function(param) {



        AJAXOU.zoneAffichage.innerHTML = param;
    },

}
window.onload = AJAXOU.init;