<?php
$posts = App::getInstance()->getTable('Post')->all();




?>

<h3> Partie admin</h3>
<h2>Administrer les articles</h2>

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
        foreach ($posts as $post):?>
        <tr>
            <td><?= $post->id;?></td>
            <td><?= $post->titre;?></td>
            <td>
            <a href="?p=post.edit&id=<?=$post->id;?>" class="btn btn-primary">Editer</a>
            
            </td>
        </tr>

        <?php endforeach ; ?>
    </tbody>

</table>