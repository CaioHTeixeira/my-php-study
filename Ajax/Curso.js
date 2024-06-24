function meuFetch() {
    window.fetch("MeuFetch.php?nome='Maria'")
        .then(response => response.text()
        .then(data => {
            document.getElementById('mensagem').innerHTML = data;
        }).catch(error => alert('erro !' + error)));
}

function meuAjax() {
    var xhr = new XMLHttpRequest();
    
    xhr.open('GET', 'MeuAjax.php?nome=Maria');
    xhr.onload = function () {
        if(xhr.status == 200) {
            document.getElementById('mensagem').innerHTML = xhr.responseText;
        } else {
            alert('Erro! status: ' + xhr.status);
        }
    };

    xhr.send();
}

function meuFormData() {
    
}