<!DOCTYPE html>
<head>
    <title>Formulario sanduba</title>
</head>
<body>
    <form action="Sanduba.php" method="POST" enctype="multipart/form-data">
        Quais adicionais vc deseja?<br/><br/>
        <input type="checkbox" name="adicionais[]" value="queijo"/>Queijo <br/> <!-- recebe do outro lado array de array por causa do name -->
        <input type="checkbox" name="adicionais[]" value="bacon">Bacon <br/>
        <input type="checkbox" name="adicionais[]" value="ovo">ovo <br/><br/>
        <input type="file" name="anexo" /> <br/><br/>
        <input type="submit" value="Cadastrar"/>
    </form>
</body>
</html>