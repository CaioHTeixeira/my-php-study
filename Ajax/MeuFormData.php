<?php

echo "Email {$_REQUEST['email']} cadastrado com sucesso! <br/>";

$diretorio = "anexos" . DIRECTORY_SEPARATOR;

foreach($_FILES as $arquivo) {
    $nome = $arquivo['name'];
    $conteudo = file_get_contents($arquivo['tmp_name']);
    file_put_contents($diretorio.$nome, $conteudo);
    if(file_exists($diretorio.$nome)) {
        echo "Arquivo {$nome} salvo com sucesso ! <br/>";
    }
} 