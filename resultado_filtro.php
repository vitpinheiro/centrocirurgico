<?php
// Conectar ao banco de dados
$host = 'localhost';
$db = 'registros';
$user = 'root';
$pass = '';
$mysqli= new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Processar o filtro
if(isset($_GET['filtro'])) {
    $filtro = $mysqli->real_escape_string($_GET['filtro']);

    // Consulta SQL com o filtro
    $sql = "SELECT * FROM pacientes WHERE nome LIKE '%$filtro%' 
            AND  idade LIKE '%$filtro%' 
            AND  plano_saude 
            LIKE '%$filtro%' 
            AND  genero LIKE '%$filtro%' 
            AND  estado LIKE '%$filtro%' 
            AND  status LIKE '%$filtro%' ";
    
    // Executar consulta
    $result = $mysqli->query($sql);

    // Exibir resultados
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Campo1: " . $row["campo1"]. " - Campo2: " . $row["campo2"]. "<br>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

// Fechar conexão
$mysqli->close();
?>
