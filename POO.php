<?php

class Pessoa {
    public $nome;
    public $cpf;

    function __construct(string $nome, int $cpf) {
        echo "nasci em 96 \n";
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    function falar() {
        return "oi, meu nome é $this->nome ";
    }
}

$pessoa1 = new Pessoa("caio", 123321);
$pessoa1->nome = "igor";
$pessoa1->cpf = 321321;
echo $pessoa1->falar();
var_dump($pessoa1);

$pessoa2 = $pessoa1;
$pessoa2->nome = "fulano"; //pessoa1 é alterado também.

var_dump($pessoa1);

#clone
$pessoa3 = clone $pessoa1; //pessoa1 permanece intacta;
$pessoa3->nome = "ciclano";

var_dump($pessoa1);

#extends
class PessoaJuridica extends Pessoa {
    public $cnpj;

    public function __construct() {}
    public function falar() { //overriding, usa o parent e acrescenta outras ações.
        return parent::falar() . "e eu falo bastante.";
    }
}

$pessoaJuridica = new PessoaJuridica(); //acrescenta o cnpj, pessoa não precisa ter cpf, apenas pessoa física.

#overriding e parent
$pessoaJuridica->nome = "frade";
$pessoaJuridica->cpf = 222;
echo $pessoaJuridica->falar();