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
$nome = 'caio';
$tem_saldo = true;
$valor = 99.50;
$nulo = null;
$nome2 = "Sant'anna";

$nome_completo = "\n$nome $nome2";
print($nome_completo);

#concatenação string
$nome_completo = "\n" . $nome . "Teixeira" . PHP_EOL;
print($nome_completo);
$nome .= "Teixeira"; #concatena, similar ao +=
print($nome);

#unset: remove a variavel da memoria
unset($nome);

#estruturas condicionais (if, else)
if ($valor > 100) {
    echo "\ntem saldo";
} elseif ($valor == 0) {
    echo "\nnao tem saldo";
} else {
    "pouco saldo";
}

#operador ternario:
$resultado = $tem_saldo ? "\ntem saldo" : "\nnão tem saldo";
echo $resultado;
#operadores de comparação: >, >=, !=, ==, <>, <=> (spaceship, retorna 0 se ambos valores são iguais, 1 se esquerda maior, -1 se direita maior)
// $a ?? $b ?? $c (primeiro valor não nulo da esquerda p direita sera o resultado).

#operadores logicos: &&, ||, xor, and, or, !;
#operadores incremento/decremento(pós e pré): ++, --;

#switch:
switch($tem_saldo) {
    case 0: 
        echo "\nnão tem saldo";
        break;
    case 1:
        echo "\ntem saldo";
        break;
    default:
        echo "\nnão é 0 nem 1";
}

#estrutura laço(loop): for, while
for($i=0; $i <= 10; $i++) {
    echo $i . PHP_EOL;
}

$i = 0;
while($i < 5) {
    print("oi" . PHP_EOL);
    $i++;
}

$i = 0;
do{
    print("oi" . PHP_EOL);
    $i++;
} while($i < 5);

#funções
