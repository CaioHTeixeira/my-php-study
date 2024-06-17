<?php

function meu_autoloader($class) {
    // Converte o namespace da classe em um caminho de arquivo
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    
    // Verifica se o arquivo existe antes de incluir
    if (file_exists($path)) {
        include_once $path;
    } else {
        echo "Classe $class não encontrada<br>";
    }
}

spl_autoload_register('meu_autoloader');
