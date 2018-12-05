<?php
$posts = App::getInstance()->getTable('Post')->all();




?>

<h3> Partie admin</h3>
<h2>Administrer les articles</h2>

<p>
 <a href="?p=posts.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">

    <thead>
        <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
        </tr>
    </thead>
    <tbody>

        <?php 
        echo "ypppp";
        foreach ($posts as $post):?>
        <tr>
            <td><?= $post->id;?></td>
            <td><?= $post->titre;?></td>
            <td>
            <a href="?p=posts.edit&id=<?=$post->id;?>" class="btn btn-primary">Editer</a>
        
            	<form action="?p=posts.delete" method="POST" style="display: inline-block;">

            		<input type="hidden" name="id" value="<?=$post->id;?>">

            		<button type="submit" href="?p=posts.delete&id=<?=$post->id;?>" class="btn btn-danger">Supprimer</a></button>
            	</form>
       
            
            </td>
        </tr>

        <?php endforeach ; ?>
    </tbody>

</table>