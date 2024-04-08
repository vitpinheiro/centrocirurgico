<?php
$quant = array(5, 6, 7);

foreach ($quant as &$valor){
    $valor = $valor * 2;
}

print_r($quant);

?>