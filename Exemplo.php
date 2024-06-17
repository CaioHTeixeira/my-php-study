<?php

require "POO.php";

// $produto = new Produto(); //não funciona pois tem o Namespace Modelo.
$produto1 = new Modelo\Produto(); //funciona

var_dump($produto1);