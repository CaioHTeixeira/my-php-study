<?php

//var_dump(PDO::getAvailableDrivers());
//// phpinfo();
//
//$servidor = "mysql";
//$banco = "livraria";
//$usuario = "root";
//$senha = "";
//$porta = 3306;
//$dsn = "mysql:host=$servidor;port=$porta;dbname=$banco;charset=utf8";
//echo "oi";
//
//$opcoes = [
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //habilitar modo de erro para liberar uma exceção a cada erro
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //modo de recuperação atraves de arrays associativos pois é mais prático.
//    PDO::ATTR_EMULATE_PREPARES => false //evitar injeção de sql, melhor deixar desligado.
//];
//
//try {
//    $pdo = new PDO($dsn, $usuario, $senha, $opcoes);
//    $statement = $pdo->query("SELECT nome FROM funcionario");
//    $funcionario = $statement->fetch();
//    print($pdo);
//} catch (PDOException $e) {
//    "Erro de conexão:" . $e->getMessage();
//}


// Configurações do banco de dados
$servername = "db"; // Nome do serviço no Docker Compose
$username = "user";
$password = "123123";
$dbname = "livraria";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conectado com sucesso ao banco de dados.";

// Fecha a conexão
$conn->close();

