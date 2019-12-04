<?php
// php exercicio_1.php
// tipos de dados

$nr_numero = 10;
$vl_float = 12.2;
$ds_string = "minha variavel";
$sn_boolean = false;
$ds_concatenar = $ds_string . " " . $nr_numero;
$ds_enter = "\n";
$ds_interpolacao = "meu valor {$vl_float}";

$arrNumeros = [
   10, 20, 50
];

$arrString = [
   "adriano",
   "waltrick"
];

echo $nr_numero;
echo $ds_enter;

echo $vl_float;
echo $ds_enter;

echo $ds_string;
echo $ds_enter;

// forma de mostrar boolean na tela
echo var_export($sn_boolean);
echo $ds_enter;

echo $ds_concatenar;
echo $ds_enter;

echo $ds_interpolacao;
echo $ds_enter;

// arrays
echo var_export($arrNumeros);
echo $ds_enter;

echo var_export($arrString);
echo $ds_enter;
