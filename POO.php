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
    abstract function exibirDocumento();
}

class CartaoCredito extends Cartao {
    public $parcelas;

    function exibirDocumento() { //metodos abstratos precisam ser implementados nas classes filhas.
        echo "documento credito\n";
    }
}

class CartaoDebito extends Cartao {
    public $valor;

    function exibirDocumento() {
        echo "documento debito\n";
    }
}

$cartaoCredito = new CartaoCredito();
$cartaoDebito = new CartaoDebito();

// $cartao = new Cartao(); //erro
$cartaoCredito->exibirDocumento();

#interface
interface CartaoImp {
    public function exibirCartao();
}

interface CartaoExtrato {
    public function exibeExtrato();
}

class Cartao2 implements CartaoImp, CartaoExtrato {
    function exibirCartao() {
        echo "meu cartão implementado\n";
    }

    function exibeExtrato() {
        echo "meu extrato\n";
    }
}

$cartao2 = new Cartao2();
$cartao2->exibirCartao();
$cartao2->exibeExtrato();

#trait: mecanismos para reutilização de código em linguagens de heranças multiplas, como PHP.
//aplicação de membros de classes sem exigir herança.
trait MinhaTrait {
    public function oi() {
        echo "oi\n";
    }
}
trait MinhaTrait2 {
    public function oi() {
        echo "oi2\n";
    }
}
class Test {
    use MinhaTrait;
} 

$t1 = new Test();
$t1->oi();

class Test2 {
    use MinhaTrait, MinhaTrait2 {
        MinhaTrait2::oi insteadof MinhaTrait; //Pega o oi() de MinhaTrait2 em vez de MinhaTrait 
        MinhaTrait2::oi as oi2; //chama o oi() de oi2().
    }
} 

$test2 = new Test2();
$test2->oi2();

#classe anonima
$pessoa = new class {
    public $nome = "caio";
    public $cpf = 123;

    public function getNome() {
        return strtoupper($this->nome);
    }
};

var_dump($pessoa->getNome());

#associação entre objetos: 1 Pessoa possuir 0 ou 1 veiculos:
class Person {
    public $nome;
    public $veiculo;
}
class Veiculo {
    public $placa;
    public $modelo;
}

$p1 = new Person();
$p1->nome = "caio";

$v1 = new Veiculo();
$v1->placa = "ABC 123\n";

$p1->veiculo = $v1;
echo $p1->veiculo->placa;

#composição: é um tipo de associação onde o objeto composto é o único responsável pela disposição das partes componentes.
//o relacionamento entre o composto e o componente é um relacionamento forte "tem um", pois o objeto composto apropria-se do componente.
//a composição impõe o encapsulamento e ela é caracterizada na UML pelo uso do losango preenchido.
//se tirar o todo as partes deixam de existir.

#agregação: é um tipo de associação que especifica um relacionamento de tod / parte entre a parte agregada(todo) e o componente.
//esse relacionamento é um "tem um" fraco, pois o componente pode sobreviver ao objeto agregado.
//é o losango em vazio no UML.

#associação(1..*): 1 do lado esquerdo tem zero ou mais do direito.
//Para representar essa relação podemos utilizar uma coleção(ex: array) para "armazenar" / "intermediar" esta relação.

#classe associativa: é uma classe que faz parte de um relacionamento de associação entre duas outras classes.
class Ator {
    public $nome;
    public $atuacoes = [];
}

class Atuacao {
    public $ator;
    public $filme;
    public $papel;

    public function __construct(Ator $ator, Filme $filme, string $papel) {
        $this->ator = $ator;
        $this->filme = $filme;
        $this->papel = $papel;
    }
}

class Filme {
    public $titulo;
    public $atuacoes = [];
}

$ator1 = new Ator();
$ator1->nome = "caio";
$ator2 = new Ator();
$ator2->nome = "maria";

$filme1 = new Filme();
$filme1->titulo = "007";
$filme2 = new Filme();

$filme1->atuacoes[] = new Atuacao($ator1, $filme1, "Mocinho");
$filme1->atuacoes[] = new Atuacao($ator2, $filme1, "Donzela");
var_dump($filme1->atuacoes);

#autoload(carregamento automático de classe): interessante usar qdo trabalhar com mais de uma classe, trait ou interface, carregando
//automaticamente as estruturas em seus respectivos arquivos .php.
//possui 2 funções de registro automático: __autoload() que foi depreciado(em 7.2+) e o spl_autoload_register();
//spl_autoload_register(): permite q varios carregadores automaticos sejam registrados, q serao executados ate q uma classe, interf ou trait 
//seja localizada e carregada.
// function meu_autoloader($class) { //deu pau
//     echo "chamando a classe" . $class;
//     include_once 'classes/' . $class . '.php'; //criaria uma pasta classes com as classes Computador e Radio nela
// }

// spl_autoload_register('meu_autoloader');

// $c1 = new Computador();
// $r1 = new Radio();

#reflection: auxilia a criar bibliotecas genéricas p exibir dados, processar diferentes formatos, realizar serialização, agrupar dados..
//pode ser usado para observar e modificar a exec do prog em tempo de execução.

class Animal {}
class Felino extends Animal {}
class Gato extends Felino {}

$classe = new ReflectionClass(Gato::class);
while ($parent = $classe->getParentClass()) {
    $parents[] = $parent->getName();
    $classe = $parent;
}

var_dump($parents);

//obs: é possivel mudar a visibilidade de atributos e metodos com o reflection tbm.
//tambem tem como pegar as propriedades de uma classe, ou só as públicas por exemplo.
