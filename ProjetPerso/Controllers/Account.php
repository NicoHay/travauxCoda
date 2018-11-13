<?php 



class Account{


    public function controlAccount(){

        App::getAuth()->restrict();

        $vue = new Vue('Account');
        $vue->genererAdmin();


    }
}