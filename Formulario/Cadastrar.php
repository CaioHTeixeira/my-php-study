<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>dados recebidos</h2>
    <?php
    // var_dump($_POST);

    $diretorio = "anexos".DIRECTORY_SEPARATOR; //directory é uma contante q vai dar o caracter separador de diretorios.

    foreach($_FILES as $arquivo) {
        $nome = $arquivo['name'];
        $conteudo = file_get_contents($arquivo['tmp_name']);
        file_put_contents($diretorio.$nome, $conteudo);
    }
    var_dump(($_FILES));
    ?>
</body>
</html>