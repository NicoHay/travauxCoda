
<div class="admin">
	
	<h1>Bienvenu dans votre espace Membre </h1>
	<p> A partir de cette section vous pouvez ajouter et gérer vos enregistrements</p>
	
	<a href="?p=admin.posts.add" class="btn-success">Ajouter</a>
	
	<table>
		<thead>
            <tr>
                <td>ID</td>
                <td>Titre</td>
                <td>Actions</td>
            </tr>
		</thead>
	
    	<tbody>
    
            <?php foreach ($posts as $post):?>
            <tr>
                <td><?= $post->id;?></td>
                <td><?= $post->titre;?></td>
                <td><?= $post->extrait;?></td>
                <td>
                <a href="?p=admin.posts.edit&id=<?=$post->id;?>" class="btn-info">Editer</a>
            
                	<form action="?p=admin.posts.delete" method="POST" style="display: inline-block;">
    
                		<input type="hidden" name="id" value="<?=$post->id;?>">
                   		<button type="submit" href="?p=admin.posts.delete&id=<?=$post->id;?>" class="btn-danger">Supprimer</a></button>
                	</form>   
                </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
	</table>
	