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
    //dividing with 60 will give the execution time in minutes otherwise seconds
    $GLOBALS['execution_time'] = ($GLOBALS['time_end'] - $GLOBALS['time_start']);

    //execution time of the script
    echo 'Total Execution Time: '. $GLOBALS['execution_time'] . ' Mins' . "\n";
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


// preencher a lista
var_dump(time() / (60*60*24));
srand(floor(time() / (60*60*24)));

$valor_busca = 0;

for ($i = 1; $i <= 100; $i++) {
    $valor = rand(1, 100);
    $objListaEncadeada->add($valor);

    if ($i == 50) {
        $valor_busca = $valor;
    }
}

$objListaEncadeada->getElementos();
echo $ds_enter;



// busca simples
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
echo "Buscar : " . $valor_busca . " - " . buscar($valor_busca, $objListaEncadeada);
echo $ds_enter;
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


ordenar($objListaEncadeada);
$objListaEncadeada->getElementos();
echo $ds_enter;

