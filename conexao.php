
<?php
//ARRUMAR UM JEITO DE DIMINUIR ISSO
$host = 'localhost';
$db = 'registros';
$user = 'root';
$pass = '';

$mysqli= new mysqli($host, $user, $pass, $db);
if($mysqli->connect_error){
    die("falha na conexão");
}

