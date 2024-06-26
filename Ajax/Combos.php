<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Formulário Assíncrono</title>
</head>
<body>
    <form>
        <label>Região: </label>
        <select id="regioes">
            <option value="">Selecione...</option>
            <option value="norte">Norte</option>
            <option value="nordeste">Nordeste</option>
        </select>
        <label>Estado: </label>
        <select id="estados"></select>
    </form>
    <script src="Curso.js"></script> <!-- só funciona se for aqui no final ou com o defer no <head> --> 
</body>
</html>