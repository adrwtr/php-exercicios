<?php
# 5 - funcoes de string
# php exercicio_5.php

$ds_enter = "\n";

// imprimir na tela
echo('apenas imprime');
echo $ds_enter;

// exporta o valor da variavel para o tipo string
echo var_export('valor do tipo');
echo $ds_enter;

// converte para string
echo var_export(array(1, 2));
echo $ds_enter;

// explode - converte em array, dividindo pelo operador
echo var_export(
    explode('-', 'divide-a string-em-array')
);
echo $ds_enter;

// inverso de explode
echo implode(array('valor 1-', 'valor 2'));
echo $ds_enter;

// ord — Retorna o valor ASCII do caractere
echo ord('A');
echo $ds_enter;

// str_pad — Preenche uma string para um certo tamanho com outra string
echo str_pad("123", 15, 0);
echo $ds_enter;

// str_replace — Substitui todas as ocorrências da string de procura com a string de substituição
echo str_replace("a", "A", "adriano");
echo $ds_enter;

// strlen — Retorna o tamanho de uma string
echo strlen('12345');
echo $ds_enter;

// strpos — Encontra a posição da primeira ocorrência de uma string
echo strpos("onde esta o * nesta frase", "*");
echo $ds_enter;

// strtolower — Converte uma string para minúsculas
// strtoupper — Converte uma string para maiúsculas
echo strtolower('PARA BAIXO') . ' ' . strtolower('para cima');
echo $ds_enter;

// trim — Retira espaço no ínicio e final de uma string
echo trim('   sem espacos  ');
echo $ds_enter;

// pega uma parte da string
echo substr('abcdef', 1, 3);  // bcd
echo $ds_enter;