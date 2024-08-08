<?php

include_once __DIR__ . '../conexao.php';

$login = $REQUEST['login'];
$senha = $REQUEST['senha'];

$query = "SELECT * FROM usuario where login = ? and senha = ?"; //previne injeção sql

$statement = $pdo->prepare($query);
#uma forma, garante essa "coerção" de tipo. Tem tbm bindValue para passar com o valor direto 'Edson' e tbn dá por variavel.
$statement->bindParam(1, $login, PDO::PARAM_STR); //se passar :login em vez de '?' aí n precisa do 1 e sim de 'nome' no primeiro parametro.
$statement->bindParam(2, $senha, PDO::PARAM_STR);
#outra forma de passar os parametros.
$statement->execute([$login, $senha]); //previne injeção sql

$usuario = $statement->fetch();
//outro tipo com all: $usuario = $statement->fetch(PDO::FETCH_ALL);

if ($usuario) {
    echo "Usuario {$usuario['login']} logado(a) com sucesso!";
} else {
    echo "Usuario não encontrado ou senha errada!";
}