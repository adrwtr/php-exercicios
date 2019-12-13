<?php
// php exercicio_4.php
// funcoes

$ds_enter = "\n";

// fun?o simples
function somar($a, $b) {
   return $a + $b;
}

echo somar(10, 20);
echo $ds_enter;

// fun?o simples
function concatenar($valor) {
   return 'concatena string ' . $valor;
}

echo concatenar('teste');
echo $ds_enter;


// fun?o pode chamar outras funcoes
function composta() {
   return concatenar(somar(10, 30));
}

echo composta('teste');
echo $ds_enter;


// fun?o podem chamar a si mesma
function recursivo($valor) {
   if ($valor < 10) {
      echo $valor . ' ';
      $valor++;

      return recursivo($valor);
   }

   return null;
}

recursivo(1);
echo $ds_enter;


// fun?o fibonacci
function fibonacci($n) {
   if ($n == 1 || $n == 0) {
      return 1;
   } else {
      return fibonacci($n - 1) + fibonacci($n - 2);//recurs?
   }
}

echo fibonacci(5);
echo $ds_enter;


function power($valor, $exp) {
    $original = $valor;

    for ($i = 1; $i < $exp; $i++) {
        $valor = $valor * $original;
    }

    return $valor;
}

echo power(3, 2);
echo $ds_enter;
