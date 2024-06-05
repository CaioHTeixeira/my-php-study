<?php
#declare(strict_types = 1); //usado para obrigar a receber os valores de acordo com o definido.
declare(strict_types=1);

#tipos de exibição de conteudo: echo, print, print_r, var_dump
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
function escreveMensagem(string $nome, string $sobrenome = "Teixeira") : string { //default como Teixeira
    return "mensagem do " . $nome . $sobrenome . PHP_EOL; 
}

$mensagem = escreveMensagem("caio", "teixeira");
echo $mensagem;

#splat operator "..." na funçao:
function soma(int ...$numeros) {
    echo array_sum($numeros) . PHP_EOL;
    print_r($numeros) . PHP_EOL; #ou var_dump
}

soma(1,2,3,4);

#nullable types: "?"
function sub(int $num, ?int $num2) : ?int {
    return $num - $num2;
}

print(sub(4,2) . PHP_EOL);
print(sub(4,null) . PHP_EOL); #result = 4

#passagem por referencia: &
function mult($num, &$num2) {
    $num2 += 2; #afeta o valor do $z pois faz referencia para ele.
    return $num * $num2;
}

$z = 3;
$result = mult(3, $z);
print($result . PHP_EOL);
print($z . PHP_EOL); 

#função anonima
$x = function($txt) {
    echo "hello $txt" . PHP_EOL;
};
$x("world");
//não consegue imprimir uma variavel de fora lá dentro da função.
//para isso, precisa utilizar: function($txt) use ($x) {} para ter acesso ao $x dentro dela.
$x = function($txt, $y) {
    echo "hello $txt" . $y() . PHP_EOL;
};
$x("world", function(){return 5;});

#constantes:
define("MINHA_CONSTANTE", "nunca vai mudar");
// define("OUTRA_CONSTANTE", "Não importa o case", true);
define("PI", 3.1415);
echo MINHA_CONSTANTE;

#date: função nativa do PHP
date_default_timezone_set('America/Sao_Paulo');
//data
echo date("d") .PHP_EOL;
echo date("d/m/y") .PHP_EOL;
//hora
echo date("h:i:s") .PHP_EOL;
echo date("d/m/y h:i:s") .PHP_EOL; //combinando data e hora