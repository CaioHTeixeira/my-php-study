<?php 
    $cookie_nome = "usuario";
    $cookie_valor = "Caio";
    setcookie($cookie_nome, $cookie_valor, mktime(24), "/");

    #cookie: ele fica armazenado no lado cliente, uma pasta do navegador que dps é carregado junto com o navegador.  
    //OBS: LOCALSTORAGE DO JS É UMA OPÇÃO MELHOR E MAIS MODERNA Q O COOKIE.