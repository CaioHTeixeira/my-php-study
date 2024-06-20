<?php

var_dump($_COOKIE); //mostra o valor dos cookies em um array.

if(isset($_COOKIE['usuario'])) {
    echo "seja bem vindo {$_COOKIE['usuario']}";
} else {
    echo "cookie sem valor";
}