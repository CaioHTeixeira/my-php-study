<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Meu form fetch</title>
        <script src="Curso.js"></script> <!-- pra chamar o script aqui é bom por o defer pra esperar carregar, mas é melhor usar o <script> no final do body -->
    </head>
    <body>
        <form id="meu_form" action="MeuFormData.php" enctype=multipart/form-data>
            <label>Nome</label>
            <input type="text" name="nome"/>
            <label>Email</label>
            <input type="email" name="email"/><br/><br/>
            <input type="file" name="anexo" multiple="multiple"/>
            <input type="submit" value="Cadastrar" />
        </form>
        <div id="mensagem"></div>
        <script>
            const form = document.getElementById("meu_form"); //pode colocar em Curso.js
            form.addEventListener('submit', meuFormData); // se colocar no Curso.js tem q usar o defer no script pra esperar carregar.
        </script>
    </body>
</html>