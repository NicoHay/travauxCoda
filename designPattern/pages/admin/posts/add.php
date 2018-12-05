<?php


$posts = App::getInstance()->getTable('Post');


	if(!empty($_POST))
	{
		
	$result = $posts->create([
			'titre' 		=> 	$_POST['titre'],
			'contenu' 		=> 	$_POST['contenu'],
			'id_categorie'	=>	$_POST['categorie']
		]);
	
	if($result){

		header('Location: admin.php?p=posts.edit&id='.App::getInstance()->getDb()->lastInsertId());
		
		
		
		
		
		
	
	}
		
	}
	
    ?>



<form  method="post">
<div class="form-group">
<input class="form-control" type="text" value=""name="titre" placeholder="" >
</div>
<div class="form-group">
<input class="form-control" type="number" value=""name="categorie" placeholder="" >

</div>
<div class="form-group">
<textarea class="form-control" name="contenu"
          rows="5" cols="33" >

</textarea>
</div>


<button class="btn btn-primary"type="submit">Sauvegarder</button>





</form>
