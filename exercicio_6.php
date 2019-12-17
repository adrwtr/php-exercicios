<?php
# 6 - array e funções de array
# php exercicio_6.php

$ds_enter = "\n";

$arrNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$arrTexto = [
    'Nome 1',
    'Nome 2',
    'Nome 3',
    'Nome 4',
    'Nome 5',
];

$arrChaveValor = [
    'chave 1' => 'valor 1',
    'chave 2' => 'valor 2',
    'chave 3' => 'valor 3',
    'chave 4' => 'valor 4',
    'chave 5' => 'valor 5',
    'chave 6' => 'valor 6',
    'chave 7' => 'valor 7',
    'chave 8' => 'valor 8'
];

$arrMulti = [
    'pessoa_1' => [
        'nome' => 'nome da pessoa A',
        'idade' => 10
    ],

    'pessoa_2' => [
        'nome' => 'nome da pessoa B',
        'idade' => 12
    ],

    'pessoa_3' => [
        'nome' => 'nome da pessoa C',
        'idade' => 16
    ],
];

// adicionar novo elemento no array
$arrNumeros[] = 11;
echo var_export($arrNumeros);
echo $ds_enter;

// array_chunk - Divide um array em pedaços
echo var_export(
    array_chunk($arrNumeros, 3)
);
echo $ds_enter;

// array_column - Retorna os valores de uma coluna do array informado
echo var_export(
    array_column($arrMulti, 'nome')
);
echo $ds_enter;

// array_flip - Permuta todas as chaves e seus valores associados em um array
echo var_export(
    array_flip($arrChaveValor)
);
echo $ds_enter;

// array_keys - Retorna todas as chaves ou uma parte das chaves de um array
echo var_export(
    array_keys($arrChaveValor)
);
echo $ds_enter;


// array_merge - Combina um ou mais arrays
echo var_export(
    array_merge($arrNumeros, $arrTexto)
);
echo $ds_enter;


// array_search — Procura por um valor em um array e retorna sua chave correspondente caso seja encontrado
echo var_export(
    array_search(6, $arrNumeros)
);
echo $ds_enter;

// in_array — Checa se um valor existe em um array
echo in_array(6, $arrNumeros) == true ? 'Sim' : 'Nao';
echo $ds_enter;

// count — Conta o número de elementos de uma variável, ou propriedades de um objeto
echo count($arrNumeros);
echo $ds_enter;





// exercicio 1
// somar todos os valores
$nr_soma = 0;

for ($i = 0; $i < count($arrNumeros); $i++ ) {
    $nr_soma = $nr_soma + $arrNumeros[$i];
}

echo $nr_soma;
echo $ds_enter;

$nr_soma = 0;

forEach($arrNumeros as $nr_chave => $nr_valor) {
    $nr_soma = $nr_soma + $nr_valor;
}

echo $nr_soma;
echo $ds_enter;


// Crie um método que recebe um array de inteiros e retorna a quantidade de elementos
// do array que são números negativos.
$arrNumeros2 = array(1, -1, 2, -3, 10, 8, -8, 2, 3, -3, 2);

function verificarNegativos($array) {
    $nr_soma = 0;

    forEach($array as $nr_valor) {
        if ($nr_valor < 0) {
            $nr_soma = $nr_soma + 1;
        }
    }

    return $nr_soma;
}

echo verificarNegativos($arrNumeros2);
echo $ds_enter;





// Crie um método que recebe um array de inteiros a e um valor inteiro x e retorna a
// quantidade de vezes que x aparece no array a.
function verificarQuantasVezesEncontra($array, $nr_encontrar) {
    $nr_soma = 0;

    forEach($array as $nr_valor) {
        if ($nr_valor == $nr_encontrar) {
            $nr_soma = $nr_soma + 1;
        }
    }

    return $nr_soma;
}

echo verificarQuantasVezesEncontra($arrNumeros2, 2);
echo $ds_enter;



// leitura do array $arrMulti e verificar a média de idade
function getMediaIdade($array) {
    $nr_soma = 0;
    $nr_media = 0;

    forEach($array as $arrPessoa) {
        $nr_soma = $nr_soma + $arrPessoa['idade'];
    }

    $nr_media = $nr_soma / count($array);

    return $nr_media;
}

echo getMediaIdade($arrMulti);
echo $ds_enter;


// Escreva um método que recebe um array de inteiros a
// e devolve um array de boolean onde,
// cada posição indique true se o elemento da posição correspondente de a é positivo e false
// caso seja negativo ou zero.


function verificarNegativosEPositivos($array) {
    $novoArray = [];

    forEach($array as $nr_valor) {
        if ($nr_valor < 0) {
            $novoArray[] = false;
        } else {
            $novoArray[] = true;
        }
    }

    return $novoArray;
}

echo var_export(
    verificarNegativosEPositivos($arrNumeros2)
);
echo $ds_enter;




/*
criar um array novo de 1 a 50
e criar uma funcao para indicar quais dos elementos sao primos
Números primos são os números naturais que têm apenas dois divisores diferentes: o 1 e ele mesmo
*/
$arrNovo = [];

for ($i = 2; $i <= 50; $i++) {
    $arrNovo[] = $i;
}

function getNumerosPrimos($array) {
    $arrPrimos = [];

    foreach ($array as $valor) {
        $sn_divisivel = false;

        for ($i = 2; $i < $valor; $i++) {
            if ($valor % $i == 0) {
                $sn_divisivel = true;
            }
        }

        if ($sn_divisivel == false) {
            $arrPrimos[] = $valor;
        }
    }

    return $arrPrimos;
}
echo var_export(
    getNumerosPrimos($arrNovo)
);
echo $ds_enter;