


<div class="admin">
<?php if ( $message ):?>
    <div class="alert-success">
   		Inscription ok. 
    </div>
<?php endif; ?>

<div class="formulaire">

    <form action="" method="post">
    <h2>Inscription</h2>



        <input type="text" name="nom_register" placeholder="Nom / Entreprise" required>
   		<input type="text" name="prenom_register" placeholder="prenom " >
     	<input type="email" name="email_register" placeholder="email" required>
        <input type="password" name="pass_register" placeholder="Mot de passe"required>
        <input type="password" name="confirm_pass_register" placeholder="Confirmation du mot de passe"required>

    	<input type="submit" name="registerForm"class="button">
    </form>
</div>

</div>