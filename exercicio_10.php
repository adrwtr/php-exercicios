<?php
# 10 - Algoritmos de busca
# php exercicio_10.php

$ds_enter = "\n";
$time_start = 0;
$time_end = 0;
$execution_time = 0;

function iniciarTimer() {
    $GLOBALS['time_start'] = microtime(true);
}

function verificarTimer() {
    $GLOBALS['time_end'] = microtime(true);

    $GLOBALS['execution_time'] = ($GLOBALS['time_end'] - $GLOBALS['time_start']);

    // Tempo de execução
    echo 'Total Execution Time: '. $GLOBALS['execution_time'] . "\n";
}


/**
 * Lista duplamente encadeada
 * É uma lista que conhece o proximo elemento, e também o elemento anterior
 */
class ElementoEncadeado {
    private $valor;
    private $objElementoPai;
    private $objElementoFilho;

    public function __construct($valor) {
        $this->valor = $valor;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setElementoPai($objElemento) {
        $this->objElementoPai = $objElemento;
    }

    public function getElementoPai() {
        return $this->objElementoPai;
    }

    public function setElementoFilho($objElemento) {
        $this->objElementoFilho = $objElemento;
    }

    public function getElementoFilho() {
        return $this->objElementoFilho;
    }
}


class ListaEncadeada {
    private $objElementoAtual;
    private $objElementoAnterior;
    public $objElementoInicial;
    private $nr_tamanho = 0;

    public function __construct() {
        // vamos iniciar nosso vetor
        $this->objElementoInicial = null;
        $this->objElementoAtual = null;
        $this->objElementoAnterior = null;
        $this->nr_contador = 0;
        $this->nr_tamanho = 0;
    }

    public function add($valor) {
        // cria o valor atual
        $this->objElementoAtual = new ElementoEncadeado($valor);

        // joga dentro do anterior, o elemento atual
        if ($this->objElementoAnterior != null) {
            $this->objElementoAnterior->setElementoFilho(
                $this->objElementoAtual
            );
        }

        $this->objElementoAtual->setElementoPai($this->objElementoAnterior);

        // logica para ter sempre um anterior
        $this->objElementoAnterior = $this->objElementoAtual;

        // seta o elemento inicial
        if ($this->objElementoInicial == null) {
            $this->objElementoInicial = $this->objElementoAtual;
        }

        $this->nr_tamanho++;

        return $this;
    }

    public function getTamanho() {
        return $this->nr_tamanho;
    }

    public function getElementos() {
        $objElemento = $this->objElementoInicial;
        $valor = $objElemento->getValor();

        while ($valor != null) {
            echo $valor . ' ';
            $objElemento = $objElemento->getElementoFilho();
            $valor  = null;

            if ($objElemento  != null) {
                $valor = $objElemento->getValor();
            }
        }

        return $this;
    }

    public function getElementosFromTop() {
        $objElemento = $this->objElementoAtual;
        $valor = $objElemento->getValor();

        while ($valor != null) {
            echo $valor . ' ';
            $objElemento = $objElemento->getElementoPai();
            $valor  = null;

            if ($objElemento  != null) {
                $valor = $objElemento->getValor();
            }
        }

        return $this;
    }

    public function getNext() {
        $objElemento = $this->objElementoInicial;

        for ($i = 0; $i < $this->nr_contador; $i++) {
            if ($i == $this->nr_contador) {
                $this->nr_contador++;
                return $objElemento->getValor();
            }

            $objElemento = $objElemento->getElementoFilho();

            if ($objElemento == null) {
                $this->nr_contador = 0;
                return null;
            }
        }

        $this->nr_contador++;
        return $objElemento->getValor();
    }

    public function getNextObject() {
        $objElemento = $this->objElementoInicial;

        for ($i = 0; $i < $this->nr_contador; $i++) {
            if ($i == $this->nr_contador) {
                $this->nr_contador++;
                return $objElemento;
            }

            $objElemento = $objElemento->getElementoFilho();

            if ($objElemento == null) {
                $this->nr_contador = 0;
                return null;
            }
        }

        $this->nr_contador++;
        return $objElemento;
    }

    public function getElemento($nr_posicao) {
        $objElemento = $this->objElementoInicial;

        for ($i = 0; $i <= $nr_posicao; $i++) {
            if ($i + 1 == $nr_posicao) {
                $this->nr_contador = $nr_posicao;
                return $objElemento->getValor();
            }

            $objElemento = $objElemento->getElementoFilho();

            if ($objElemento == null) {
                return null;
            }
        }

        return null;
    }

    public function getElementoObjeto($nr_posicao) {
        $objElemento = $this->objElementoInicial;

        for ($i = 0; $i <= $nr_posicao; $i++) {
            if ($i + 1 == $nr_posicao) {
                $this->nr_contador = $nr_posicao;
                return $objElemento;
            }

            $objElemento = $objElemento->getElementoFilho();

            if ($objElemento == null) {
                return null;
            }
        }

        return null;
    }

    public function zerarContador() {
        $this->nr_contador = 0;
    }
}

$objListaEncadeada = new ListaEncadeada();
$objListaEncadeadaClone = new ListaEncadeada();

// preencher a lista
var_dump(time() / (60*60*24));
srand(floor(time() / (60*60*24)));

$valor_busca = 0;

for ($i = 1; $i <= 100; $i++) {
    $valor = rand(1, 100);
    $objListaEncadeada->add($valor);
    $objListaEncadeadaClone->add($valor);

    if ($i == 99) {
        $valor_busca = $valor;
    }
}


echo "Nossa lista: \n";
$objListaEncadeada->getElementos();
echo $ds_enter;


// busca simples
// varremos o array em busca de nosso elemento
function buscar($valor_busca, $objLista) {
    $valor_atual = $objLista->getNext();

    while ($valor_atual != null) {
        if ($valor_atual == $valor_busca) {
            return $valor_busca;
        }

        $valor_atual = $objLista->getNext();
    }

    return "valor nao encontrado";
}

iniciarTimer();
echo "Resultado busca simples: " . $valor_busca . " - " . buscar($valor_busca, $objListaEncadeada);
echo $ds_enter;
echo "####################\n\n";
verificarTimer();



// Busca binaria
// para fazer a busca binaria, os valores precisam estar ordenados

function ordenar($objLista) {
    $nr_tamanho = $objLista->getTamanho();

    for ($i = 1; $i <= $nr_tamanho; $i++) {
        $objAtual = $objLista->getElementoObjeto($i);

        for ($a = 1; $a <= $nr_tamanho; $a++) {
            $objTeste = $objLista->getElementoObjeto($a);

            if ($objAtual->getValor() < $objTeste->getValor()) {
                // fazer a troca
                $nr_temp = $objAtual->getValor();
                $objAtual->setValor($objTeste->getValor());
                $objTeste->setValor($nr_temp);
            }
        }
    }
}


// pela busca binaria
// se verifica o elemento do meio do array
// se ele nao for igual, verificamos se ele é maior e diminuimos pela metade o local a ser verificado
function pesquisaBinaria ($valor_buscar, $objLista, $esquerda, $direita)
{
    $meio = floor(($esquerda + $direita) / 2);
    $valor_posicao = $objLista->getElemento($meio);

    if ($valor_posicao == $valor_buscar) {
        return "Buscar: " . $valor_posicao;
    }

    if ($esquerda >= $direita) {
        return -1; // não encontrado
    } else {
        if ($valor_posicao < $valor_buscar) {
            return PesquisaBinaria($valor_buscar, $objLista, $meio + 1, $direita);
        } else {
            return PesquisaBinaria($valor_buscar, $objLista, $esquerda, $meio - 1);
        }
    }
}


echo "Nossa lista: \n";
$objListaEncadeada->getElementos();
echo $ds_enter;

// cuidado com o contador interno

echo $objListaEncadeada->getNextObject()->getValor();
echo $ds_enter;

echo $objListaEncadeada->getNextObject()->getValor();
echo $ds_enter;

$objListaEncadeada->zerarContador();

echo $objListaEncadeada->getNextObject()->getValor();
echo $ds_enter;

echo $objListaEncadeada->getNextObject()->getValor();
echo $ds_enter;

$objListaEncadeada->zerarContador();

iniciarTimer();
echo "Ordenacao do array: \n";
ordenar($objListaEncadeada);

verificarTimer();
echo "####################\n\n";


iniciarTimer();

echo "Pesquisa Binaria\n";

echo pesquisaBinaria(
    $valor_busca,
    $objListaEncadeada,
    0,
    $objListaEncadeada->getTamanho()
);
echo $ds_enter;

verificarTimer();
echo $ds_enter;


// se quiser ver a lista ordenada
$objListaEncadeada->getElementos();
echo $ds_enter;

echo "####################\n\n";



function swap($objLista, $a, $b) {
    $valor_temp = $objLista->getElementoObjeto($a)->getValor();

    $objLista->getElementoObjeto($a)->setValor(
        $objLista->getElementoObjeto($b)->getValor()
    );

    $objLista->getElementoObjeto($b)
        ->setValor($valor_temp);
}

function partition ($objLista, $low, $high)
{
    // $pivot (Element to be placed at right position)
    $pivot = $objLista->getElemento($high);

    $i = ($low - 1);  // Index of smaller element

    for ($j = $low; $j <= $high - 1; $j++)
    {
        // If current element is smaller than the $pivot
        if ($objLista->getElemento($j) < $pivot)
        {
            $i++;    // increment index of smaller element
            swap($objLista, $i, $j);
        }
    }

    swap($objLista, $i + 1, $high);

    return ($i + 1);
}

function quickSort($objLista, $low, $high)
{
    if ($low < $high)
    {
        /* pi is partitioning index, arr[p] is now
        at right place */
        $pi = partition($objLista, $low, $high);

        // Separately sort elements before
        // partition and after partition
        quickSort($objLista, $low, $pi - 1);
        quickSort($objLista, $pi + 1, $high);
    }
}

echo "iniciando quick sort:";

// se quiser ver a lista ordenada
$objListaEncadeadaClone->getElementos();
echo $ds_enter;

$objListaEncadeadaClone->zerarContador();

iniciarTimer();

quickSort($objListaEncadeadaClone, 1, $objListaEncadeadaClone->getTamanho() - 1);

verificarTimer();
echo $ds_enter;

// se quiser ver a lista ordenada
$objListaEncadeadaClone->getElementos();
echo $ds_enter;

echo "####################\n\n";