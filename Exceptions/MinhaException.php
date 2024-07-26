<?php

class MinhaException extends Exception {
    public function __construct($mensagem = "") {
        parent::__construct($mensagem);
        file_put_contents("log.txt", 
            (new DateTime())->format('d/m/Y') . $this->getTraceAsString(),
            FILE_APPEND | LOCK_EX);
    }
}

function testar(int $x) {
    if($x == 0) {
        throw new MinhaException('Zero não pode');
    }
}

try {
    testar(0);
} catch (Exception $exc) {
    echo $exc->getMessage();
}