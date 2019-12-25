<?php
# 9 - estruturas de dados ou avançadas
# php exercicio_9.php

$ds_enter = "\n";

// vetor com array
// permite incluir coisas no vetor
// permite saber o tamanho
// permite recuperar o proximo elemento ou elemento desejado
// permite apagar um elemento

class VetorArray {
    private $arrMemoria;
    private $nr_contador = 0;

    public function __construct() {
        // vamos iniciar nosso vetor
        $this->arrMemoria = array();
        $this->nr_contador = 0;
    }

    public function add($valor) {
        $this->arrMemoria[] = $valor;

        return $this;
    }

    public function getTamanho() {
        return count($this->arrMemoria);
    }

    public function getNext() {
        $valor = isset($this->arrMemoria[$this->nr_contador]) 
            ? $this->arrMemoria[$this->nr_contador]
            : null ;

        $this->nr_contador++;

        return $valor;
    }

    public function getElemento($i) {
        $valor = isset($this->arrMemoria[$i-1]) 
            ? $this->arrMemoria[$i-1]
            : null ;

        if ($valor != null) {
            $this->nr_contador = $i;
        }

        return $valor;
    }

    public function removeElemento($i) {
        unset($this->arrMemoria[$i-1]);

        // refaz os indices, pois perde o contador
        $arrNovo = array();

        forEach($this->arrMemoria as $valor) {
            $arrNovo[] = $valor;
        }

        $this->arrMemoria = $arrNovo;

        return $this;
    }
}

$objVetorArray = new VetorArray();

$objVetorArray->add(10)
    ->add(20)
    ->add(30);

echo $objVetorArray->getTamanho();
echo $ds_enter;

echo $objVetorArray->getNext();
echo $ds_enter;

echo $objVetorArray->getNext();
echo $ds_enter;

echo $objVetorArray->getElemento(2);
echo $ds_enter;

echo $objVetorArray->getNext();
echo $ds_enter;

echo $objVetorArray->getNext();
echo $ds_enter;

echo $objVetorArray->removeElemento(2)
    ->getTamanho();
echo $ds_enter;

echo $objVetorArray->getElemento(2);
echo $ds_enter;



// vetor com classes
// permite incluir coisas no vetor
// permite saber o tamanho
// permite recuperar o proximo elemento ou elemento desejado
// permite apagar um elemento
class Elemento {
    private $valor;
    private $objProxElemento;

    public function __construct($valor) {
        $this->valor = $valor;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setProxElemento($objElemento) {
        $this->objProxElemento = $objElemento;
    }

    public function getProxElemento() {
        return $this->objProxElemento;
    }
}

class Vetor {
    private $objElementoAtual;
    private $objElementoAnterior;
    private $objElementoInicial;
    private $nr_contador = 0;
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
        $this->objElementoAtual = new Elemento($valor);

        // joga dentro do anterior, o elemento atual
        if ($this->objElementoAnterior != null) {
            $this->objElementoAnterior->setProxElemento(
                $this->objElementoAtual
            );
        }

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

    public function getNext() {
        $objElemento = $this->objElementoInicial;

        for ($i = 0; $i < $this->nr_contador; $i++) {
            if ($i == $this->nr_contador) {
                $this->nr_contador++;
                return $objElemento->getValor();
            }

            $objElemento = $objElemento->getProxElemento();

            if ($objElemento == null) {
                return null;
            }
        }

        $this->nr_contador++;
        return $objElemento->getValor();
    }

    public function getElemento($nr_posicao) {
        $objElemento = $this->objElementoInicial;

        for ($i = 0; $i <= $nr_posicao; $i++) {
            if ($i + 1 == $nr_posicao) {
                $this->nr_contador = $nr_posicao;
                return $objElemento->getValor();
            }

            $objElemento = $objElemento->getProxElemento();

            if ($objElemento == null) {
                return null;
            }
        }

        return null;
    }

    public function removeElemento($nr_posicao) {
        if ($nr_posicao == 0) {
            $this->objElementoInicial = $this->objElementoInicial->getProxElemento();
            $this->nr_tamanho--;
            return $this;
        }

        $objElemento = $this->objElementoInicial;
        $objAnterior = null;

        for ($i = 0; $i <= $nr_posicao; $i++) {

            if ($i + 1 == $nr_posicao) {
                $this->nr_contador = $nr_posicao;

                $objAnterior->setProxElemento(
                    $objElemento->getProxElemento()
                )
                ;
                $this->nr_tamanho--;
                return $this;
            }

            $objAnterior = $objElemento;
            $objElemento = $objElemento->getProxElemento();

            if ($objElemento == null) {
                return $this;
            }
        }

        return $this;
    }
}

$objVetor = new Vetor();

$objVetor->add(10)
    ->add(20)
    ->add(30);

echo $objVetor->getTamanho();
echo $ds_enter;

echo $objVetor->getNext();
echo $ds_enter;

echo $objVetor->getNext();
echo $ds_enter;

echo $objVetor->getElemento(2);
echo $ds_enter;

echo $objVetor->getNext();
echo $ds_enter;

echo $objVetor->getNext();
echo $ds_enter;

echo $objVetor->removeElemento(2)
    ->getTamanho();
echo $ds_enter;

echo $objVetor->getElemento(2);
echo $ds_enter;



// DEQUE
// O deque é uma estrutura linear, similar a um vetor, 
// mas com informação mantida internamente sobre a posição das 
// suas duas extremidades, inicial e final



