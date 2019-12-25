<?php
# 7 - arquivos
# php exercicio_7.php

$ds_enter = "\n";

$ds_file_name = 'arquivo.txt';


// salvar no arquivo
$objHandle = fopen($ds_file_name, 'w');
fwrite($objHandle, 'salvar texto no arquivo - linha 1' . "\n");
fwrite($objHandle, 'salvar texto no arquivo - linha 2');
fclose($objHandle);



// le informacoes do arquivo
$objHandle = fopen($ds_file_name, 'r');
$ds_content = '';
while (!feof($objHandle)) {
    $ds_content .= fread($objHandle, filesize($ds_file_name));
}
fclose ($objHandle);

echo $ds_content;
echo $ds_enter;





// salvando dados estruturados
$arrValor = array(
   'nome' => 'Joaquin',
   'idade' => 34
);

$arrValor2 = array(
   'nome' => 'Jeremias',
   'idade' => 14
);

// salvar no arquivo
$objHandle = fopen($ds_file_name, 'w');
fwrite($objHandle, serialize($arrValor) . '##end##' . "\n");
fwrite($objHandle, serialize($arrValor2) . '##end##');
fclose($objHandle);




// le informacoes do arquivo
$objHandle = fopen($ds_file_name, 'r');
$ds_content = '';

while (!feof($objHandle)) {
    $ds_content .= fread($objHandle, filesize($ds_file_name));
}
fclose ($objHandle);

echo ($ds_content);

$arrValores = explode("##end##", $ds_content);


foreach ($arrValores as $value) {
   if ($value != '') {
      echo var_export(
         unserialize(trim($value))
      );
      echo $ds_enter;
   }
}