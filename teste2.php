<?php
//definindo os arrays
$nomeconvenio = array("Unimed", "Humana", "Hapvida");
$quant = array(5, 6, 7);



array_push($nomeconvenio, "Amil");
array_push($quant, 8);

foreach ($quant as &$valor){
    $valor = $valor * 2 ;
}


// Verificando se os arrays têm o mesmo comprimento
if(count($nomeconvenio) == count($quant)){
    $arraycompl=array();
// Combinação dos arrays
    for($i=0; $i < count($nomeconvenio); $i++){
        $arraycompl[] = array($nomeconvenio[$i], $quant[$i]);
}

//  Exibindo o array resultante
 print_r($arraycompl);
}else{
    echo "Os arrays não tem o mesmo comprimento";
 }

?>