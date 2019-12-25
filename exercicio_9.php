<?php
# 9 - estruturas de dados ou avançadas
# php exercicio_9.php

$ds_enter = "\n";

# vetor
# permite incluir coisas no vetor
# permite saber o tamanho
# permite recuperar o proximo elemento ou elemento desejado

class Vetor {
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
        $valor = isset($this->arrMemoria[$i]) 
            ? $this->arrMemoria[$i]
            : null ;

        if ($valor != null) {
            $this->nr_contador = $i + 1;
        }

        return $valor;
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

echo $objVetor->getElemento(1);
echo $ds_enter;

echo $objVetor->getNext();
echo $ds_enter;

echo $objVetor->getNext();
echo $ds_enter;




