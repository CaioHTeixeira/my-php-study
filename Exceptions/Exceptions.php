<?php

try {
    intdiv(10, 0);
    $x = (function():int {return "ss"; })();
} catch(\Throwable $t) {
    var_dump($t->getMessage());
} catch(TypeError $t) {
    echo "erro de tipagem";
} finally{
    echo "terminou nosso try";
}

function escolhaMcOferta(int $opcao) : ?string {
    $ofertas = ['big mac', 'mc cheddar', 'quarteirao', 'mc fish', 'mc chicken'];
    if(!in_array($opcao, range(1,5))) {
        throw new OutOfRangeException("Oferta inválida!");
    }

    return $ofertas[--$opcao];
}

try {
    escolhaMcOferta(6);
} catch(\Throwable $t) {
    echo "ocorreu um erro: ". $t->getMessage() . PHP_EOL;
}


#Erros não throwable: notice(const E_NOTICE), warning(const E_WARNING), deprecated, Error, parser error
error_reporting(0); //todos os erros não throwables serão desligados.
error_reporting(E_WARNING | E_PARSE); //aceitam apenas os erros warning e parse
 
#Dá pra criar o proprio manipulador de error com o set_error_handler
function meuManipulador($codigo, $mensagem, $arquivo, $linha) {
    if(error_reporting() & $codigo) {
        throw new Exception($mensagem, 0);
    }
}

set_error_handler('meuManipulador');
try {
    $array = ['maria', 'caio'];
    $b = $array[10];
} catch(Exception $e) {
    echo "Posição não encontrada\n";
} finally {
    restore_error_handler(); //devolve pro PHP o seu manipulador padrão.
}