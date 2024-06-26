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