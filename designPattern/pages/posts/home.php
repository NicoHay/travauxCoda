

<h1>home</h1>
<?php

?>
<div class="row">
    <div class="col-sm-8">
        <?php foreach (App::getInstance()->getTable('post')->All() as $posts) :

        ?>



            <h2>
            <a href = "" >
            <?= $posts['titre']; ?>
                    </a>
            </h2>
            <p>
                <em>
                <?= $posts['categorie']; ?>
                </em>
            </p>
            <p><?= $posts['contenu']; ?></p>

		

		<?php endforeach; ?>


			</div>
		
    <ul>
        <div class="col-sm-6">
    
            <?php foreach (App::getInstance()->getTable('category')->all() as $categorie) :

            ?>
                <li>
                    <a href="<?= $categorie->url; ?>">
                        <?= $categorie['titre']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </div>
    </ul>
</div>







