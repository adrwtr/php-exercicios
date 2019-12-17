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
        'idade' => 'idade da pessoa A'
    ],

    'pessoa_2' => [
        'nome' => 'nome da pessoa B',
        'idade' => 'idade da pessoa B'
    ],

    'pessoa_3' => [
        'nome' => 'nome da pessoa C',
        'idade' => 'idade da pessoa C'
    ],
];


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


/*
Exercício 4: Crie um método que recebe um array de inteiros e retorna a quantidade de elementos
do array que são números negativos.


Exercício 5: Crie um método que recebe um array de inteiros a e um valor inteiro x e retorna a
quantidade de vezes que x aparece no array a.


Exercício 6: Escreva um método que recebe um array de inteiros a e devolve um array de boolean
onde, cada posição indique true se o elemento da posição correspondente de a é positivo e false
caso seja negativo ou zero.

Elabore um subprograma C que tenha como
entrada um número inteiro e forneça como saída
um valor inteiro indicando se o número é primo.
*/