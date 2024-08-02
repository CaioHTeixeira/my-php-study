<?php

var_dump(PDO::getAvailableDrivers());
// phpinfo();

$servidor = "localhost";
$banco = "livraria";
$usuario = "root";
$senha = "";
$porta = 3306;
$dsn = "mysql:host=$servidor;port=$porta;dbname=$banco;charset=utf8";

$opcoes = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //habilitar modo de erro para liberar uma exceção a cada erro
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //modo de recuperação atraves de arrays associativos pois é mais prático.
    PDO::ATTR_EMULATE_PREPARES => false //evitar injeção de sql, melhor deixar desligado. 
];

$pdo = new PDO($dsn, $usuario, $senha, $opcoes);
var_dump($pdo);

