<?php
namespace teste;
include("conexao.php");
include_once("pegarregistro.php");            
$puxar = new PuxarFuncoes;
$teste = $puxar->pegarciruteste();


$sql ="SELECT ciru.cirurgia as nome_cirugia,
COUNT(id_cirugia) AS quantidade_total,
proc.data AS mes,
 proc.prioridade as prioridade
FROM procedimentos as proc
INNER JOIN cirurgias as ciru ON ciru.id = proc.id_cirugia
GROUP BY proc.id_cirugia
ORDER BY DATE(proc.data)";
                    
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    

        if ($result && mysqli_num_rows($result) > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $cirurgias_array[] = $row['nome_cirugia'];
                $quantcirurgias_array[] = $row['quantidade_total'];
                $data_array[] = $row['mes'];
                $prioridade_array[] = $row['prioridade'];
            }
                }

                $tiposciru = json_encode($cirurgias_array);
                $quant_json = json_encode($quantcirurgias_array);
                $data_json = json_encode($data_array);
                $prioridade_json = json_encode($prioridade_array);
                
        
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
        
        
        .content {
            margin-top: 20px; 
        }

        
        .dropdown-menu {
            /* Adicionando sombra e borda arredondada */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background-color: #ffffff;
            min-width: 200px;
            padding: 10px;
            position: relative;
        }

  
    </style>
</head>
<body>
<header id="resultados">
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
                        <a class="dropdown-item" href="tabelageral.php">Tabela geral</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
             
            </div>
        </div>
    </div>
</header>

    <main>

    <div class="container ">            
    <div class="row align-items-center">
        <div class="col-12 col-lg-2 mb-5 mr-4" style="text-align: left;">
            <b>Selecione o tipo</b>
            <select class="form-control" id="chartTypeSelect">
                <option value="bar">Barra</option>
                <option value="pie">Pizza</option>
                <option value="line">Linha</option>
            </select>
        </div>

        <div class="col-lg-2 col-8 d-flex align-items-center ml-2" style="text-align: left;">
            <input class="form-control  mb-lg-4" type="date" id="startDate" value="">
            <p class="mb-0 mr-2  mb-lg-4">até</p>
            <input class="form-control  mb-lg-4" type="date" id="endDate" value="">
        </div>
    </div>


    
    <div class="col-12 col-lg-2  " style="text-align: left;">
            <b>Selecione a prioridade</b>
            <select class="form-control" id="prioritySelect">
                <option value="Urgência">Urgência</option>
                <option value="Eletiva">Eletiva</option>
            </select>
    </div>
        <br>
        <br>
        <div class="col-lg-12 col-md-6 col-sm-12 accordion " id="accordionPanelsStayOpenExample2">
            <div class="accordion-item ">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                      Quantidade de cirurgias
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <canvas class="charts" id="chartCanvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
              
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

    var tiposCirurgia = <?php echo $tiposciru; ?>;
    var quantidades = <?php echo $quant_json; ?>;
    var data = <?php echo $data_json; ?>;
    var prioridade = <?php echo $prioridade_json; ?>;
    var chartTypeSelect = document.getElementById('chartTypeSelect');
    var startDateInput = document.getElementById('startDate');
    var endDateInput = document.getElementById('endDate');
    var prioritySelect = document.getElementById('prioritySelect');
    var chartCanvas = document.getElementById('chartCanvas');
    var myChart;


    function updateChart() {
    var selectedChartType = chartTypeSelect.value;
    var startDate = startDateInput.value;
    var datas = data;
    var endDate = endDateInput.value;
    var selectedPriority = prioritySelect.value;

    // Filtrar os tipos de cirurgia e quantidades com base nas datas selecionadas e na prioridade
    var tiposCirurgiaFiltrados = [];
    var quantidadesFiltradas = [];
    for (var i = 0; i < datas.length; i++) {
        // Verifica se selectedPriority está presente no array prioridade[i]
        if (datas[i] >= startDate && datas[i] <= endDate && prioridade[i].includes(selectedPriority)) {
            tiposCirurgiaFiltrados.push(tiposCirurgia[i]);
            quantidadesFiltradas.push(quantidades[i]);
        }
    }

    console.log(prioridade);
    console.log(selectedPriority);

    var ctx = chartCanvas.getContext('2d');

    if (myChart instanceof Chart) {
        myChart.destroy();
    }

    if (tiposCirurgiaFiltrados.length > 0 && quantidadesFiltradas.length > 0 ) {
        if (selectedChartType === 'pie') {
            myChart = new Chart(ctx, {
                type: selectedChartType,
                data: {
                    labels: tiposCirurgiaFiltrados,
                    datasets: [{
                        label: 'Quantidade de Cirurgias',
                        data: quantidadesFiltradas,
                        backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)', 'rgba(255, 159, 64, 0.5)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {}
                }
            });
        } else if (selectedChartType === 'bar' || selectedChartType === 'line') {
            myChart = new Chart(ctx, {
                type: selectedChartType,
                data: {
                    labels: tiposCirurgiaFiltrados,
                    datasets: [{
                        label: 'Quantidade de Cirurgias',
                        data: quantidadesFiltradas,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    } else {
        console.log("Datas inválidas ou não selecionadas");
    }
}
function formatDateToYMD(date) {
    var year = date.getFullYear();
    var month = String(date.getMonth() + 1).padStart(2, '0'); // Adiciona zero à esquerda se necessário
    var day = String(date.getDate()).padStart(2, '0'); // Adiciona zero à esquerda se necessário
    return year + '-' + month + '-' + day;
}

// Atualize o gráfico quando os filtros forem alterados
chartTypeSelect.addEventListener('change', updateChart);
prioritySelect.addEventListener('change', updateChart);
startDateInput.addEventListener('change', function() {
    // Formata a data selecionada para o formato "YYYY-MM-DD"
    this.value = formatDateToYMD(new Date(this.value));
    // Atualiza o gráfico após a formatação da data
    updateChart();
});


endDateInput.addEventListener('change', function() {
    // Formata a data selecionada para o formato "YYYY-MM-DD"
    this.value = formatDateToYMD(new Date(this.value));
    // Atualiza o gráfico após a formatação da data
    updateChart();
});






// Inicialize o gráfico
updateChart();



    </script>

    <script src="node_modules\@popperjs\core\dist\umd\popper.min.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
</body>
</html>
