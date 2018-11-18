<?php

require 'Models/Class/autoloader.php';
require 'Controllers/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();