<?php


$posts = App::getInstance()->getTable('Post');
echo'toto';

	if(!empty($_POST)){
		
	$posts->delete($_POST['id']);


		header('Location: admin.php');
	
	
		}