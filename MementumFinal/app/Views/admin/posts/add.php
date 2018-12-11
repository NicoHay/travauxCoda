<div class="admin">

    <div class="formulaire">
    
    <?php if ( $errors ):?>
        <div class="alert alert-danger">
        Identifiant ou password incorrect.
        </div>
    <?php endif; ?>
    
    
        <form action="" method="post">
        
    	<h2>Ajoutez un article</h2>
    
			<input class="champs" type="text" name="titre_add" placeholder="Titre" >
     		<textarea id="montext" name="contenu_add" placeholder="Contenu du message" ></textarea>
     		<input type="submit" name="add_form" class="button">
    
		</form>

    </div>
</div>