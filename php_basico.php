<?php

echo "ola mundo";

#comentarios: #, //, /* */

#require_once e include
/*funcionam com caminhos: 
    -absolutos: "c:\\apache24\\aula\\teste.php"
    -relativos: "..\aula\teste.php" "teste.php"
    -quando o arquivo não existe: 
        include: gera erro mas script continua.
        require: erro fatal e programa encerrado.
    -require_once: verifica se o arquivo já foi incluído alguma vez.

*/

#variáveis
$minha_variavel = 1;
$nome = "caio";
$tem_saldo = true;
$valor = 99.50;
$nulo = null;