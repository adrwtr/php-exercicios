<?php
$nr_numero = 10;
$vl_float = 12.2;
$ds_string = "minha variavel";
$sn_boolean = false;
$ds_concatenar = $ds_string . " " . $nr_numero;
$ds_enter = "\n";
$ds_interpolacao = "meu valor {$vl_float}";

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
