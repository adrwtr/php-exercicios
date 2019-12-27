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



// LISTA simples
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

class Lista {
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

$objLista = new Lista();

$objLista->add(10)
    ->add(20)
    ->add(30);

echo $objLista->getTamanho();
echo $ds_enter;

echo $objLista->getNext();
echo $ds_enter;

echo $objLista->getNext();
echo $ds_enter;

echo $objLista->getElemento(2);
echo $ds_enter;

echo $objLista->getNext();
echo $ds_enter;

echo $objLista->getNext();
echo $ds_enter;

echo $objLista->removeElemento(2)
    ->getTamanho();
echo $ds_enter;

echo $objLista->getElemento(2);
echo $ds_enter;



// DEQUE
// O deque é uma estrutura linear, similar a um vetor,
// mas com informação mantida internamente sobre a posição das
// suas duas extremidades, inicial e final
// permite incluir coisas
// permite saber o tamanho
// permite recuperar o proximo elemento do inicio e do fim
// permite recuperar o elemento desejado
// permite apagar um elemento


class Deque {
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

    public function push_front($valor) {
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

    public function push_back($valor) {
        // cria o valor atual
        $objElemento = new Elemento($valor);

        // fala que o proximo dele é o inicial, para ficar a frente
        $objElemento->setProxElemento($this->objElementoInicial);

        // seta ele como sendo o inicial
        $this->objElementoInicial = $objElemento;

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

$objDeque = new Deque();

$nr_pos = 0;

// preechendo o DEQUE na frente e atraz
while ($nr_pos < 10) {
    $nr_pos = $nr_pos + 1;
    $objDeque->push_front($nr_pos);
    $nr_pos = $nr_pos + 1;
    $objDeque->push_back($nr_pos);
}

$nr_valor = $objDeque->getNext();

// imprimindo o DEQUE
while ($nr_valor != null) {
    echo $nr_valor . ' ';
    // echo $ds_enter;

    $nr_valor = $objDeque->getNext();
}




/*
Stack
stack ou pilha,  uma estrutura linear com restrição na política de
acesso aos seus elementos — a ordem de saída é inversa á ordem de entrada.
Esta política é usualmente denominada LIFO (last in, first out), ou seja, último que entra é o primeiro que
sai.

push para inserir um elemento no topo da pilha
pop para remover o elemento no topo da pilha.
top para inspecionar o elemento que está no topo,
empty para testar se a pilha está vazia
size para obter a quantidade de elementos na pilha.
*/

class ElementoStack {
    private $valor;
    private $objElementoAnterior;

    public function __construct($valor) {
        $this->valor = $valor;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setElementoAnterior($objElemento) {
        $this->objElementoAnterior = $objElemento;
    }

    public function getElementoAnterior() {
        return $this->objElementoAnterior;
    }
}

class Stack {
    private $objElementoAtual;
    private $objElementoAnterior;

    private $nr_contador = 0;
    private $nr_tamanho = 0;

    public function __construct() {
        // vamos iniciar nosso vetor
        $this->objElementoAtual = null;
        $this->objElementoAnterior = null;
        $this->nr_contador = 0;
        $this->nr_tamanho = 0;
    }

    public function push($valor) {

        if ($this->objElementoAtual != null) {
            $this->objElementoAnterior = $this->objElementoAtual;
        }

        // cria o valor atual
        $this->objElementoAtual = new ElementoStack($valor);
        $this->nr_tamanho++;

        $this->objElementoAtual->setElementoAnterior($this->objElementoAnterior);

        return $this;
    }


    public function pop() {
        $valor = $this->objElementoAtual->getValor();

        if ($valor = null) {
            return null;
        }

        // remove da memoria
        unset($this->objElementoAtual);

        $this->objElementoAtual = $this->objElementoAnterior;
        $this->objElementoAnterior = $this->objElementoAtual->getElementoAnterior();

        $this->nr_tamanho--;

        return $valor;
    }

    public function getTamanho() {
        return $this->nr_tamanho;
    }

    public function top() {
        return $this->objElementoAtual->getValor();
    }
}

$objStack = new Stack();

$objStack->push(10)
    ->push(20)
    ->push(30)
    ->push(40);

echo $objStack->getTamanho();
echo $ds_enter;

echo $objStack->pop();
echo $ds_enter;

echo $objStack->pop();
echo $ds_enter;

echo $objStack->top();
echo $ds_enter;

echo $objStack->getTamanho();
echo $ds_enter;