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


// exercicios

// conte qnatas vezes aparece Jesus na frase
$ds_frase = 'Os evangelhos apresentam o ministério de João Batista enquanto precursor do ministério de Jesus. Iniciado com o seu batismo, Jesus dá início ao seu ministério nas áreas rurais da Judeia, perto do rio Jordão, com cerca de trinta anos de idade (Lucas 3:23). Jesus viaja, prega e realiza milagres, completando o ministério durante a Última Ceia com os seus discípulos em Jerusalém.';

$ds_palavra = 'Jesus';
$nr_pos = strpos($ds_frase, $ds_palavra);
$nr_contador = 0;

while ($nr_pos > 0) {
    $ds_frase = substr(
        $ds_frase,
        $nr_pos + 5,
        strlen($ds_frase)
    );

    $nr_pos = strpos($ds_frase, $ds_palavra);
    $nr_contador++;
}

echo $nr_contador;
echo $ds_enter;



// Faca um programa que encontre o conjunto de digitos iguais na string abaixo.
// Qual é a maior sequencia?

$ds_string = '
73167176531330624919225119674426574742355349194934
96983520312774506326239578318016984801869478851843
85861560789112949495459501737958331952853208805511
12540698747158523863050715693290963295227443043557
66896648950445244523161731856403098711121722383113
62229893423380308135336276614282806444486645238749
30358907296290491560440772390713810515859307960866
70172427121883998797908792274921901699720888093776
65727333001053367881220235421809751254540594752243
52584907711670556013604839586446706324415722155397
53697817977846174064955149290862569321978468622482
83972241375657056057490261407972968652414544444474
82166370484403199890008895243450658541227588666881
16427171479924442928230863465674813919123162824586
17866458359124566529476545682848912883142607690042
24219022671055626321111109370544217506941658960408
07198403850962455444362981230987879927244284909188
84580156166097919133875499200524063689912560717606
05886116467109405077541002256983155200055935729725
71636269561882670428252483600823257530420752963450
';

$nr_posicao = 2;
$ds_letra = '';
$ds_letra_teste = '';
$nr_contador = 0;
$ds_maior_letra = '';
$nr_maior_contador = 0;

while($nr_posicao < strlen($ds_string)) {
   $ds_letra = substr($ds_string, $nr_posicao, 1);

   if ($ds_letra != $ds_letra_teste) {
      $ds_letra_teste = $ds_letra;
      $nr_contador = 1;
   } else {
      $nr_contador++;

      if ($nr_maior_contador < $nr_contador) {
         $ds_maior_letra = $ds_letra;
         $nr_maior_contador = $nr_contador;
      }
   }

   $nr_posicao = $nr_posicao + 1;
}

echo $ds_maior_letra;
echo $ds_enter;
echo $nr_maior_contador;
echo $ds_enter;
echo str_pad($ds_maior_letra, $nr_maior_contador, $ds_maior_letra);
echo $ds_enter;