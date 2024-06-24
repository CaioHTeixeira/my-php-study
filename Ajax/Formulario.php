<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Meu form fetch</title>
        <script src="curso.js"></script>
    </head>
    <body>
        <form id="meu_form" action="MeuFormData.php">
            <label>Nome</label>
            <input type="text" name="nome">
            <label>Email</label>
            <input type="email" name="email">
            <input type="submit" value="Cadastrar" />
        </form>
        <div id="mensagem"></div>
    </body>
    <script>
        const form = document.getElementById("meu_form");
        form.addEventListener('submit', meuFormData);
    </script>
</html>