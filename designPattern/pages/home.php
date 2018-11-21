

<h1>home</h1>


<div class="row">
    <div class="col-sm-8">

		<?php foreach (App\Table\Article::getLast() as $posts):  ?>


 <h2>
            <a href="<?= $posts->url; ?>"><?= $posts->titre; ?>
                </a>
            </h2>
            <p>
                <em>
                <?= $posts->categorie; ?>
                </em>
            </p>
            <p><?= $posts->extrait; ?></p>

		

		<?php endforeach; ?>


			</div>
		
    <ul>
        <div class="col-sm-4">
    
			<?php foreach (App\Table\Categorie::getAll() as $categorie):  ?>
                <li>
                    <a href="<?= $categorie->url; ?>">
                        <?= $categorie->titre; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </div>
    </ul>
</div>







