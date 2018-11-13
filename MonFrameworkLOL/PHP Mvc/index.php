<?php

require 'Models/class/autoloader.php';
require 'Controllers/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();