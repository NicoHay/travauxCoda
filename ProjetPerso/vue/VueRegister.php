<?php
    if(!empty($errors)){

        echo'<div class="alert-danger">';
        echo'<p>vous navez pas bien remplis le formulaire'
        .' merci de verifié le(s) point(s) suivant :</p>';

        foreach($errors as $error){

            echo '<ul><li>'.$error.'</li></ul>';
        }
            echo'</div>';
    }
?>


<div class="admin">
<h1>S'inscrire</h1>

<div class="formulaire">

    <form action="" method="post">


        <label for="username">Pseudo</label>
        <input type="text" name="username">




        <label for="email">Email</label>
        <input type="text" name="email" required>



        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>



        <label for="password_confirm">confirmation du mot de passe</label>
        <input type="password" name="password_confirm" required>


        <button type="submit" class="btn">S'inscrire</button>



    </form>
</div>




</div>