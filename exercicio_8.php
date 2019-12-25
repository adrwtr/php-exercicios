<?php
# 8 - classes
# php exercicio_8.php

# tipos definidos pelo programador
# esturuta de dados que podemos definir

$ds_enter = "\n";

// exemplo classe simples

class CarroModeloA {
    private $ds_marca;
    private $ds_cor;

    public function __construct($ds_marca, $ds_cor) {
        $this->ds_marca = $ds_marca;
        $this->ds_cor = $ds_cor;
    }

    public function getCarro() {
        return "Carro da marca: "
            . $this->ds_marca
            . ' da cor: '
            . $this->ds_cor;
    }
}

$objCarroModeloA = new CarroModeloA(
    'ford', 
    'preto'
);

echo $objCarroModeloA->getCarro();
echo $ds_enter;


// exemplo de extends 
// sobrecarga
// utilização de objetos

class Motor {
    private $nr_potencia;

    public function setPotencia($nr_valor) {
        $this->nr_potencia = $nr_valor;
    }

    public function getPotencia() {
        return $this->nr_potencia . ' cv';
    }
}

class CarroModeloB extends CarroModeloA {
    private $objMotor;

    public function setMotor($objMotor) {
        $this->objMotor = $objMotor;
    }

    public function getCarro() {
        return parent::getCarro()
            . ' com motor: '
            . $this->objMotor->getPotencia();
    }
}

$objMotor = new Motor();
$objMotor->setPotencia(12);

$objCarroModeloB = new CarroModeloB(
    'Fiat',
    'Vermelho'
);

$objCarroModeloB->setMotor($objMotor);

echo $objCarroModeloB->getCarro();
echo $ds_enter;