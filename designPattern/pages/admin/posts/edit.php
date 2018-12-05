<?php


$posts = App::getInstance()->getTable('Post');
$postTable = $posts->find($_GET['id']);

	if(!empty($_POST))
	{
		
	$result = $posts->update($_GET['id'],[
			'titre' 	=> 	$_POST['titre'],
			'contenu' 	=> 	$_POST['contenu']
		]);
	
	if($result){
		?>
		
		<div class = "alert alert-success">L'article a été modifié</div>
		
		
		<?php 
		
	}
	}
	
    ?>



<form  method="post">
<div class="form-group">

<input class="form-control" type="text" value=""name="titre" placeholder="<?=$postTable->getTitre();?>" >


</div>
<div class="form-group">
<textarea class="form-control" name="contenu"
          rows="5" cols="33" >
<?=$postTable->getContenu();?>
</textarea>
</div>


<button class="btn btn-primary"type="submit">Sauvegarder</button>





</form>
