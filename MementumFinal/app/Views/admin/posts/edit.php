
<div class="admin">

    <div class="formulaire">
    
   
        <form action="" method="post">
        
    	<h2>Editez ou Modifiez votre article</h2>

    
			<input class="champs" type="text" name="titre_edit" value="<?=$post->getTitre();?>" >
     		<textarea id="montext" name="contenu_edit" placeholder="Contenu du message" >
     		<?=$post->getContenu();?>
     		</textarea>
     		<input type="submit" name="edit_form" class="button">
    
		</form>

    </div>
</div>


