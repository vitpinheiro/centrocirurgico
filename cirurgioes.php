<?php

namespace teste;
include("conexao.php");

include_once("pegarregistro.php");

$funcoes = new PuxarFuncoes;
$cirurgioes_por_hora = $funcoes->cirurgioesPorHora();

// Agrupa os cirurgiões por setor
$cirurgioes_por_setor = [];
foreach ($cirurgioes_por_hora as $cirurgiao) {
    $setor = $cirurgiao['setor'];
    $nome_cirurgiao = $cirurgiao['nome_cirurgiao'];
    $cirurgioes_por_setor[$setor][] = $nome_cirurgiao;
}

$dataHoraAtual= "2024-05-16 14:21:00";
$sql2 = "SELECT seto.nome_setor as setor, COUNT(ciru.id) as num_medicos
    FROM horarios_cirurgioes as horarios
    INNER JOIN setores as seto ON seto.id = horarios.id_setores
    INNER JOIN cirurgioes as ciru ON ciru.id = horarios.id_cirurgiao
    WHERE 
        horarios.hora_termino > '$dataHoraAtual'
        AND horarios.hora_inicio <= '$dataHoraAtual'
    GROUP BY seto.nome_setor
";

$result2 = $conn->query($sql2);
if ($result2 && mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $nomesetor_array[] = $row2['setor'];
        $nummedicos_array[] = $row2['num_medicos'];
    }
}

$nomesetor_json = json_encode($nomesetor_array);
$nummedicos_json = json_encode($nummedicos_array);




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img\Logobordab.png" type="image/x-icon">

    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">  
    
    <style>
        * {
            padding: 5px;
        }
        
        /* Centralizar o conteúdo horizontalmente */
        /* Diminuir o conteúdo e centralizá-lo */
        .content {
            margin-top: 20px; /* Espaçamento superior */
        }

        /* Estilizar o dropdown */
        /* Estilizar o dropdown */
        .dropdown-menu {
            /* Adicionando sombra e borda arredondada */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            /* Adicionando uma cor de fundo */
            background-color: #ffffff;
            /* Definindo a largura do dropdown */
            min-width: 200px;
            /* Ajustando o espaçamento interno */
            padding: 10px;
            /* Definindo a posição como relativa para garantir que o dropdown esteja acima do conteúdo */
            position: relative;
        }

  
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MENU
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php">Home</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="solicitacaoporstatus.php">Solicitações por status</a>
                        <a class="dropdown-item" href="cirurgiasportipo.php">Cirurgias por tipo</a>
                        <a class="dropdown-item" href="cirurgioes.php">Cirurgiões</a>
                        <a class="dropdown-item" href="#">Solicitações por período de tempo</a>
                        <a class="dropdown-item" href="tabelageral.php">Tabela geral</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <!-- Adicione aqui quaisquer outros elementos que você deseje alinhar -->
            </div>
        </div>
    </div>
</header>

    <main>
    <div class="container">
    <h2>Cirurgiões</h2>
    <div class="row">
        <div class="col-lg-6 mr-5">
            <h6 class="mt-4 mb-0">Médicos por setor:</h6>
            <?php foreach ($cirurgioes_por_setor as $setor => $cirurgioes) { ?>
                <div class="accordion mb-4" id="accordionPanelsStayOpenExample<?php echo $setor; ?>">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $setor; ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $setor; ?>">Setor de
                                <?php echo $setor; ?>
                            </button>
                        </h2>
                        
                        <div id="panelsStayOpen-collapse<?php echo $setor; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne">
                            <div class="accordion-body ">
                                <ul>
                                    <?php // Itera sobre os cirurgiões do setor
                                    foreach ($cirurgioes as $cirurgiao) { ?>
                                    
                                        <li><?php echo $cirurgiao; ?>
                                            <ul>
                                                <?php 
                                                // Array associativo para armazenar os horários já exibidos para cada cirurgião
                                                $horarios_exibidos = [];
                                                // Itera sobre os horários do cirurgião no setor atual
                                                foreach ($cirurgioes_por_hora as $horario) {
                                                    if ($horario['nome_cirurgiao'] === $cirurgiao && $horario['setor'] === $setor && !isset($horarios_exibidos[$horario['hora_inicio']])) { ?>
                                        
                                            
                                                        <li>
                                                           Horário:  <?php echo $horario['hora_inicio']; ?> -  <?php echo $horario['hora_termino']; ?>
                                                        </li>
                                                        <?php
                                                        // Marca o horário como exibido
                                                        $horarios_exibidos[$horario['hora_inicio']] = true;
                                                    }
                                                } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>



               



                <div class="col-lg-5  mt-5">
                    <div class="accordion mt-2 mb-4" id="accordionPanelsStayOpenExample3">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                Quantidade por setor
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <canvas class="charts" id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion " id="accordionPanelsStayOpenExample4">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                                    
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <canvas class="charts" id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('myChart');
const data = {
    labels: <?php echo $nomesetor_json;?>,
    datasets: [{
        label: 'Quantidade',
        data: <?php echo $nummedicos_json;?>,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
    }]
};

new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});



        const ctx2 = document.getElementById('myChart2');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: <?php echo $nomesetor_json;?>,
                datasets: [{
                    label: 'Quantidade',
                    data: <?php echo $nummedicos_json;?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // function filtrarSetor() {
        //     var setorSelecionado = document.getElementById("setorSelect").value;
        //     var accordions = document.querySelectorAll('.accordion');

        //     // Oculta todos os accordions e exibe apenas o do setor selecionado
        //     accordions.forEach(function(accordion) {
        //         if (accordion.id === 'accordionPanelsStayOpenExample' + setorSelecionado) {
        //             accordion.style.display = 'block';
        //         } else {
        //             accordion.style.display = 'none';
        //         }
        //     });
        // }
    </script>

    <script src="node_modules\@popperjs\core\dist\umd\popper.min.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
</body>
</html>
