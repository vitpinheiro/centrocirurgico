<?php

// Conexão com o banco de dados
$dbhost = 'localhost';
$dbname = 'registros';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit();
}

// Verifica se o filtro foi recebido via POST
if (isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];
    $resultado = [];

    // Define a consulta SQL com base no filtro
    switch ($filtro) {
        case 'Genero':
            $sql = "SELECT genero, COUNT(*) AS quantidade FROM pacientes GROUP BY genero";
            break;
        case 'ESTADO':
            $sql = "SELECT estado, COUNT(*) AS quantidade FROM pacientes GROUP BY estado";
            break;
        default:
            // Se nenhum filtro válido for enviado, retorne uma resposta de erro
            echo json_encode(['error' => 'Filtro inválido']);
            exit();
    }

    // Execute a consulta SQL e obtenha os resultados
    $stmt = $pdo->query($sql);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os resultados em formato JSON
    echo json_encode($resultados);
} else {
    // Se o filtro não foi enviado, retorne uma resposta de erro
    echo json_encode(['error' => 'Filtro não especificado']);
}
?>