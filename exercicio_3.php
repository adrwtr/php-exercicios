<?php
// php exercicio_3.php
// controle de fluxo

$ds_enter = "\n";

$nr_valor1 = 10;
$nr_valor2 = 20;

$arrString = [
   "adriano",
   "waltrick",
   "testar",
   "chaves"
];


// if
if ($nr_valor1 < $nr_valor2) {
   echo $nr_valor1 . " eh menor que " . $nr_valor2 . $ds_enter;
}
echo $ds_enter;


// if else
if ($nr_valor1 > $nr_valor2) {
   echo $nr_valor1 . " eh maior que " .$nr_valor2 . $ds_enter;
} else {
   echo $nr_valor1 . " eh menor que " .$nr_valor2 . $ds_enter;
}
echo $ds_enter;

// if ternario
echo ($nr_valor1 > $nr_valor2) ? 'Maior' : 'Menor';
echo $ds_enter;

// switch
switch ($nr_valor1) {
   case 0:
      echo $nr_valor1 . " eh zero";
      echo $ds_enter;
   break;

   case 5:
      echo $nr_valor1 . " eh cinco";
      echo $ds_enter;
   break;

   case 10:
      echo $nr_valor1 . " eh dez";
      echo $ds_enter;
   break;

   default:
      echo $nr_valor1 . " eh qualquer coisa";
      echo $ds_enter;
   break;
}


// for
for ($nr_valor1; $nr_valor1<=$nr_valor2; $nr_valor1++) {
   echo $nr_valor1;
   echo $ds_enter;
}

for ($i = 0; $i <= 10; $i++) {
   echo $i;
   echo $ds_enter;
}

echo $ds_enter;
echo "contar ate 5: ";
echo $ds_enter;

for ($i = 0; $i <= 10; $i++) {
   echo $i;
   echo $ds_enter;

   if ($i == 5) {
      break;
   }
}

// while
while ($nr_valor1 > 10) {
   echo $nr_valor1;
   echo $ds_enter;
   $nr_valor1 = $nr_valor1 - 1;
}

// foreach
foreach($arrString as $nr_key => $ds_valor) {
   echo "Chave: " . $nr_key;
   echo " valor: " . $ds_valor;
   echo $ds_enter;
}

// Escreva um programa que imprime na tela os numeros
// de 1 a 30 exceto os numeros
// múltiplos de 3.
for ($i = 1; $i <= 100; $i++) {
   if ($i % 3 != 0) {
      echo $i;
      echo " ";
   }
}
echo $ds_enter;


// Escreva um programa que imprime a tabuada
// dos numeros de 3 a 5 de acordo com o padrao
for ($i = 3; $i <= 5; $i++) {
   echo "tabuada de " . $i;
   echo $ds_enter;

   for ($a = 0; $a <= 10; $a++) {
      echo $i . " * " . $a . " = " . $i * $a;
      echo $ds_enter;
   }
}


// Escreva um programa que desenhe uma
// piraide de asteriscos (*). A saida do seu programa
// deve seguir o padrao abaixo:
//   *
//  ***
// *****
//*******

$nr_tamanho = 4;
$nr_espacos = $nr_tamanho;
$nr_estrelas = 0;

while ($nr_tamanho > 0) {
   $nr_espacos = $nr_espacos - 1;
   $nr_estrelas = $nr_estrelas + 1;

   for ($i = 0; $i < $nr_espacos; $i++) {
      echo " ";
   }

   for ($i = 0; $i < $nr_estrelas; $i++) {
      echo "*";
   }

   if ($nr_estrelas > 1) {
      for ($i = 1; $i < $nr_estrelas; $i++) {
         echo "*";
      }
   }

   echo "\n";

   $nr_tamanho = $nr_tamanho - 1;
}