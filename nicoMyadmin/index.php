<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nico My Admin</title>
    <link rel="stylesheet" href="view/style.css">
    <script src="controller/main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
  </head>
<body>


<h1>Bienvenue sur NicoMyAdmin</h1>
<h2>Creez ou supprimez vos tables :</h2>

<form action="controller/controller.php" method="post">

    <div class="champ"><label for="table"> Nom de la table : </label><input type="text" name="table" ></div> 
    <div class="champ"><label for="key"> Nom la key : </label><input type="text" name="key" ></div> 

    <div class="champ"><button  name="createTable" type="submit">Creez la table</button>
<button name="deleteTable" type="submit">Supprimer la table</button>

</div>  
</form>

<h2>Connaitre les colonnes d'une table en particulier</h2>

<div class="champ">
  <label for="table"> Nom de la table : </label>
  <input id="nomTable" type="text" name="table" >
  </div> 
  <div class="champ">
  <div class="reponseColonne"></div>
  </div>
<div class="champ">
  <button id="tableDispo">Les colonnes de cette table</button>
  </div>



<h2>Creez ou supprimez vos colonnes :</h2>

<form action="controller/controller.php" method="post">
<div class="champ"><label for="table"> Nom de la table : </label>
<input type="text" name="table" >
</div> 
    <div class="champ"><label for="column"> Nom de la colonne : </label>
      <input type="text" name="column" >
    </div>
    <div class="champ"><label for="type"> Type : </label>
      <select name="type">
          <option value="INT">INT</option>
          <option value="VARCHAR">VARCHAR</option>
          <option value="DATETIME">DATETIME</option>
          <option value="TEXT">TEXTE</option>
          <option value="DATE">DATE</option>
      </select></div>
    <div class="champ"><label for="longueur"> Longueur : </label>
      <input type="text" name="longueur" >
    </div>
   <div class="champ"><label for="null"> NULL : </label>
      <input type="radio" name="null" value="NULL">
      <label for="notnull"> NOT NULL : </label>
      <input type="radio" name="null" value="NOT NULL">
    </div> 
     <div class="champ"><label for="increment"> Auto Incrément : </label>
      <select name="increment">
        <option value="AUTO_INCREMENT">Oui</option>
        <option value="">Non</option>
      </select> 
    </div>

   <div class="champ"><button name="createColonne" type="submit">Creez la colonne</button>
<button name="deleteColonne" type="submit">Supprimer la colonne</button></div>  

</form>

<h2>Connaitre les entrées d'une colonne en particulier</h2>

<div class="champ">
  <label for="table1"> Nom de la table : </label>
  <input id="nomTable1" type="text" name="table1" ></div> 
  <div class="champ">
  <label for="colonne1"> Nom de la colonne : </label>
  <input id="nomColonne1" type="text" name="colonne1" ></div> 
  <div class="champ"><div class="reponseEntree"></div></div>
<div class="champ"><button id="entreeDispo">Les entrées de cette colonne</button></div>



<h2>Inserez ou supprimez des Entrées :</h2>

<form action="controller/controller.php" method="post">

<div class="champ"><label for="table"> Nom de la table : </label><input type="text" name="table" ></div> 
<div class="champ"><label for="column"> Nom de la colonne : </label><input type="text" name="column" ></div> 
<div class="champ"><label for="value"> Entrée à ajouter : </label><input type="text" name="value" ></div> 

<div class="champ"><button name="createEntree" type="submit">Creer l'entrée'</button>
<button name="deleteEntree" type="submit">Supprimer l'entrée</button></div>  

</form>
</body>
</html>