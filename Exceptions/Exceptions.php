<?php

// try {
//     intdiv(10, 0);
//     $x = (function():int {return "ss"; })();
// } catch(\Throwable $t) {
//     var_dump($t->getMessage());
// } catch(TypeError $t) {
//     echo "erro de tipagem";
// } finally{
//     echo "terminou nosso try";
// }

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