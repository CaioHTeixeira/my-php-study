<?php
// namespace Modelo;

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

//*getDocComment(): para pegar o comentario e documentação de um método.

#namespace: são uma maneira de organizar as classes PHP e evitar conflito de código;
//é possível referenciar usando o "use" para evitar escrever o namespace completo novamente;
//apelidos e conflitos podem ser resolvidos com o uso do "as".
//OBS: ELE PRECISA SER A PRIMEIRA COISA NO CÓDIGO.
class Produto {}

// require "Modelo/Fruta/Manga.php"; //não precisa pois já tem o 'use'.
// require "Modelo/Literatura/Manga.php";
// require "Modelo/Literatura/Conto.php";

// $manga1 = new Modelo\Fruta\Manga(); //pode usar o "use" para simplificar o caminho do fully qualified name.
// $manga2 = new Modelo\Literatura\Manga();

#autoload + namespace:
require_once('autoload.php');

use Modelo\Fruta\Manga as MangaFruta;
// use Modelo\Literatura\Manga as MangaLiteratura;
use Modelo\Literatura\{Manga as MangaLiteratura, Conto}; //Group use PHP 7+

$manga1 = new MangaFruta(); 
$manga2 = new MangaLiteratura();
$conto = new Conto();

var_dump($manga1);
var_dump($manga2);
var_dump($conto);

#iterator
class People {
    public $nome = "caio";
    private $cpf = "22222222";
    protected $idade = 28;

    public function iterar () {
        foreach($this as $key => $value) {
            echo "$key - $value" . PHP_EOL;
        }
    }
}

$people = new People();
$people->iterar();

//o iterator implementa a classe default do PHP '\Iterator'
// class Fibonacci implements \Iterator {} //possui as funções: current(), key(), next(), rewind() e valid() q devem ser implementadas.

#Generator
function meuGenerator() {
    echo "Um". PHP_EOL;
    yield 1;
    echo "Dois". PHP_EOL;
    yield 2;
    echo "Três". PHP_EOL;
    yield 3;
}

$iterator = meuGenerator();
$value = $iterator->current();
$value = $iterator->next();
$value = $iterator->next();

#Iterator to array: a função iterator_to_array() converte um objeto iterável em array.

#Date time: a classe tem métodos que permitem realizar operações com data e hora. Ela é uma classe.
date_default_timezone_set('America/Sao_Paulo'); //usado para definir o padrão de hora de acordo com um local.
echo date_default_timezone_get(). PHP_EOL;

$dateTime = new DateTime('2024-01-31');
echo $dateTime->format('Y-m-d H:i:s') . PHP_EOL; //H maiusculo é formato 24 hrs, minusculo é 12 hrs.

$dateTimeAgora = new DateTime();
echo $dateTimeAgora->format('Y-m-d H:i:s') . PHP_EOL;

$dateTimeSp = new DateTime("", new DateTimeZone('America/Sao_Paulo')); //trabalha com a data atual e o fuso horário SP.
var_dump($dateTimeSp);

#create from format: define um tipo de formato especifico a ser seguido.
$dateBr = DateTime::createFromFormat('d/m/Y', '31/12/2024');
echo $dateBr->format('d/m/Y') .PHP_EOL;

#modify: modifica a data atraves de string.
$dateBr->modify('+1 day');
$dateBr->modify('+10 weekdays'); //+10 dias da semana, exceto sab e dom.
echo $dateBr->format('d/m/Y') .PHP_EOL;

#diff: diferença entre duas datas.
$interval = $dateTimeAgora->diff($dateTime);
echo "Anos: $interval->y, Meses: $interval->m, dias: $interval->d, horas: $interval->h, minutos: $interval->i, segundos: $interval->s \n";

#operações de comparação com datas:
echo (new DateTime('today') > new DateTime('yesterday')) .PHP_EOL;
echo (new DateTime('today') == new DateTime('yesterday')) .PHP_EOL;

//Typed properties (PHP 7.4+): Usado para definir tipo para as variáveis, restringindo seus valores. 

#declare(strict_types = 1); //usado para definir que será fortemente tipado os tipos.
//Se for = 0 ele tentará fazer a conversão dos valores mesmo que não sejam dos tipos originais definidos!
//OBS: Ele precisa ser a primeira parte do codigo(topo).

#StdClass: classe nativa com propósito de ser uma classe para objetos frutos de coerção.
$objeto = new StdClass();
$objeto->nome = "caio";
var_dump($objeto);

$json = '{"nome": "caio", "idade": 28}';
$objeto2 = json_decode($json); //tipo vai ser StdClass tbm.
var_dump($objeto2);
#TypeCast: conversão explicita de tipo.

#input de dados:
echo "digite seu nome: ";
$nome = fgets(STDIN);
echo "bem vindo $nome";

#Variáveis HTTP: $_GET: array de variaveis com os parametros da URL; 
//$_POST: array de variaveis com valores enviados do HTTP POST, $_REQUEST, $_FILES.
//$_REQUEST: por default possui o conteúdo de $_GET e $_POST e $_COOKIE.
//$_FILES: array de arquivos enviados via HTTTP POST.