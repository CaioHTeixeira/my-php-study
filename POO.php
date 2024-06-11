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

#visibilidade: public, protected, private
//public: visivel de qualquer lugar(de outras classes e instancias de objeto).
//protected: visivel na classe e em todas as classes que estendem a atual.
//private: visivel apenas na classe.
class Pai {
    public string $publico;
    protected string $protegido;
    private string $privado;

    function setProtegido($protegido) {
        $this->protegido = $protegido;
    }
    function getProtegido() {
        return $this->protegido;
    }
}

class Filho extends Pai {}

$pai = new Pai();
$filho = new Filho(); 
$pai->publico = "publico";
$filho->setProtegido("protegido"); //acessivel na classe que herda(filho) e pai.
// $pai->privado = "privado"; #não consegue atribuir(só na classe)
var_dump($pai);
var_dump($filho);

#atributo e metodo estático
class Teste {
    public static $status = "online";

    public static function getStatus() {
        return Teste::$status;
    }
}

$teste = new Teste();
Teste::$status = "offline";
var_dump(Teste::$status);
var_dump(Teste::getStatus());
echo $teste->getStatus() . PHP_EOL; //para o método tbm dá certo, consegue acessar.
// echo $teste->status; //para o atributo não dá.

#constantes, self
class Matematica {
    const PI = 3.14; //similar as constantes usando o define()

    function valorDePI() {
        return self::PI . "\n"; //ou Matematica::PI
    }
}

$matematica = new Matematica();
echo $matematica->valorDePI();

#final
class Pai2 { //se a classe fosse final o Filho2 tbm n poderia estender.
    final public function fazAlgo() {
        echo 'oi';
    }
}

class Filho2 extends Pai2 {
    // public function fazAlgo() { //não deixa sobrescrever o método pois é final
    //     echo 'ola';
    // }
}

#classe abstrata
abstract class Cartao {
    public $nome;
}

class CartaoCredito extends Cartao {
    public $parcelas;
}

class CartaoDebito extends Cartao {
    public $valor;
}

$cartaoCredito = new CartaoCredito();