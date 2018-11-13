AJAX = {

    donneeColonne: '',
    btnColonne: '',

    init: function() {


        AJAX.btnColonne = document.querySelector('#tableDispo');
        AJAX.btnColonne.addEventListener('click', AJAX.recupColonne);

    },

    recupColonne: function() {
        AJAX.donneeColonne = document.querySelector('#nomTable').value;

        var xhttp = new XMLHttpRequest();
        xhttp.onload = function() {

            var retour = JSON.parse(xhttp.response); //  type de retour

            AJAX.affichage(retour, "reponseColonne"); // appel fonction affichage resultat dans une div passer en parametre
        }
        xhttp.open("POST", "controller/controller.php", true); // destination de l 'envoie controller.php
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var envoi = 'tableCrees='.concat(AJAX.donneeColonne); // valeurs envoyees avec le prefix POST pour recuperer dans le controller
        xhttp.send(envoi);

    },



    affichage: function(param1, param2) { // fonction qui affiche le resultat dans la page html 

        document.querySelector("." + param2).innerHTML = ''; // remise a zero de la div quand la fonction est appellee

        for (var i = 0; i < param1.length; i++) { // boucle sur la valeur de retour

            document.querySelector("." + param2).innerHTML += // ajout du contenu a la page 
                "<li>".concat(param1[i][0]).concat("</li>"); // acces au premier element du tableau de la boucle
        }

    },

}
window.onload = AJAX.init;