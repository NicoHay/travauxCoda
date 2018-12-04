<?php
use Core\Auth\DBAuth;

$posts = App::getInstance()->getTable('Post')->find($_GET['id']);


    
    ?>



<form  method="post">
<div class="form-group">

<input class="form-control" type="text" value=""name="titre" placeholder="<?=$posts->getTitre();?>" >


</div>
<div class="form-group">
<textarea class="form-control" name="contenu"
          rows="5" cols="33" >
<?=$posts->getContenu();?>
</textarea>
</div>


<button class="btn btn-primary"type="submit">Sauvegarder</button>





</form>
