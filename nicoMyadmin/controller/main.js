AJAX = {

  donneeColonne: '',
  btnColonne: '',
  btnEntree: '',
  entreeTable: '',
  entreeColonne: '',




  init: function () {


    AJAX.btnColonne = document.querySelector('#tableDispo');
    AJAX.btnColonne.addEventListener('click', AJAX.recupColonne);
    AJAX.btnEntree = document.querySelector('#entreeDispo');
    AJAX.btnEntree.addEventListener('click', AJAX.recupEntree);

  },

  recupColonne: function () {
    AJAX.donneeColonne = document.querySelector('#nomTable').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {

      var retour = JSON.parse(xhttp.response);
      AJAX.affichage(retour, "reponseColonne");
    }
    xhttp.open("POST", "controller/controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var envoi = 'tableCrees='.concat(AJAX.donneeColonne);
    xhttp.send(envoi);

  },

  recupEntree: function () {
    AJAX.entreeTable = document.querySelector('#nomTable1').value;
    AJAX.entreeColonne = document.querySelector('#nomColonne1').value;

    var tableau = [AJAX.entreeTable, AJAX.entreeColonne];

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {

      var retour = JSON.parse(xhttp.response);

      AJAX.affichage(retour, "reponseEntree");
    }
    xhttp.open("POST", "controller/controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    tableau = JSON.stringify(tableau);
    var envoi = 'table='.concat(tableau);


    xhttp.send(envoi);

  },


  affichage: function (param1, param2) {

    document.querySelector("." + param2).innerHTML = '';

    for (var i = 0; i < param1.length; i++) {

      document.querySelector("." + param2).innerHTML += "<li>".concat(param1[i][0]).concat("</li>");
    }

  },

}
window.onload = AJAX.init;