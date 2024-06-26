function meuFormData(event) {
    event.preventDefault();
    const formData = new FormData(this);
    
    var fileInput = document.querySelector('input[type="file"]');
    formData.delete('anexo');
    for(var i = 0; i < fileInput.files.length; i++) {
        formData.append('anexo'+i, fileInput.files.item(i));
    }

    window.fetch(this.getAttribute('action'), { //o primeiro argumento é URL, em vez de pegar de forma estática, pegamos do atributo action. 
        method: 'post',
        body: formData
    }).then(function(response) {
        return response.text();
    }).then(function(text) {
        document.getElementById('mensagem').innerHTML = text;
    }).catch(function (error) {
        alert('erro !' + error);
    });
}

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

function selectEstados(fonte_id, alvo_id) {
    fonte = document.getElementById(fonte_id);
    alvo = document.getElementById(alvo_id);
    alvo.length = 0;

    let regiao_selecionada = fonte.options[fonte.selectedIndex].value;
    if (regiao_selecionada == "") {
        return;
    }

    window.fetch("Estados.php?regiao_selecionada="+regiao_selecionada)
        .then(response => response.json())
        .then(data => {
            for (var i = 0; i < data.length; i++) {
                var option = document.createElement('option');
                option.innerHTML = data[i].nome;
                option.value = data[i].id;
                alvo.options.add(option);
            }
        }).catch(error => alert(error));
}

const select = document.getElementById('regioes');
select.addEventListener('change', selectEstados.bind(this, 'regioes', 'estados')); 