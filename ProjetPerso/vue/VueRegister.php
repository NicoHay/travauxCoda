


<div class="admin">
<h1>S'inscrire</h1>

<div class="formulaire">

    <form action="" method="post">


        <label for="username">Pseudo</label>
        <input type="text" name="username">




        <label for="email">Email</label>
        <input type="text" name="email" required>



        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>



        <label for="password_confirm">confirmation du mot de passe</label>
        <input type="password" name="password_confirm" required>


        <button type="submit" class="btn">S'inscrire</button>



    </form>
</div>
<h1>Se connecter</h1>

<div class="formulaire">
    <form action="" method="post">

        <label for="">Pseudo ou Email</label>
        <input type="text" name="username" class="champs">
        <label for="password">Mot de passe
            <a href="index.php?action=forget">( Mot de passe oublié? )</a>
        </label>
        <input type="password" name="password" class="champs" required>
        <label for="remenber">
            <input type="checkbox" name="remenber" value="1" />
            Se souvenir de moi</label>
        <button type="submit" class="button">Se Connecter</button>

    </form>
</div>




</div>