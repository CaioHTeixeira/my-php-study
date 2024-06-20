<?php

foreach($_REQUEST['adicionais'] as $adicional) {
    echo $adicional . PHP_EOL;
}
var_dump($_POST);

$diretorio = "anexos".DIRECTORY_SEPARATOR; //directory é uma contante q vai dar o caracter separador de diretorios.
    foreach($_FILES as $arquivo) {
        $nome = $arquivo['name'];
        $conteudo = $arquivo['tmp_name'] ? file_get_contents($arquivo['tmp_name']) : "";
        file_put_contents($diretorio.$nome, $conteudo);
    }
var_dump(($_FILES));