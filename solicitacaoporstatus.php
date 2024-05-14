<?php

namespace teste;

include_once("pegarregistro.php");            


$puxar = new PuxarFuncoes;

// mostrar quantidade nos cards
$quantidadeConcluidos = $puxar->pegarQuantidadeConcluidos();
$quantidadeEmAndamento = $puxar->pegarQuantidadeEmAndamento();
$quantidadePendentes = $puxar->pegarQuantidadePendentes();


// gráficos
$mostrarstatus2 = $puxar->pegarstatus();
$status = array_column($mostrarstatus2, 'status');
$quantidades = array_column($mostrarstatus2, 'quantidade');
$status_json = json_encode($status);
$quantidades_json = json_encode($quantidades);



// tabela
$mostrarstatus = $puxar->pegarinfo();
$idprocedimento = array_column($mostrarstatus, 'id');
$nomepaciente = array_column($mostrarstatus, 'paciente');
$statuspaciente = array_column($mostrarstatus, 'status');
$setor = array_column($mostrarstatus, 'setor');
$leito = array_column($mostrarstatus, 'leito');
$nomepaciente_json = json_encode($nomepaciente);
$statuspaciente_json = json_encode($statuspaciente);
$setor_json = json_encode($setor);
$leito_json = json_encode($leito);


// Extraia as informações do banco de dados para uso no gráfico
// 
//  $labels = array_column($mostrarbanco, 'plano_saude');
// $datajan = array_column($mostrarbanco, 'quantidade_jan');
//  $datafev = array_column($mostrarbanco, 'quantidade_fev');
// $datamar = array_column($mostrarbanco, 'quantidade_mar');
// $data = array_column($mostrarbanco, 'plano_saude');
// 
// Converta os dados para JSON para uso no JavaScript
// 
//  $labels_json = json_encode($labels);
//  $datajan_json = json_encode($datajan);
//  $datafev_json = json_encode($datafev);
//  $datamar_json = json_encode($datamar);
//  $data_json = json_encode($data);
//  
// echo ($mostrarbanco);

// // Juntando os arrays
// $arrayjunto = array_merge($nomeconvenio, $quant);
// $nova_linha = [3, 5, 4, 6, 8, 9, 10, 12];
// $nova_barra = [3, 5, 4, 6, 8, 9, 10, 12];
// $nova_barra2 = [4, 6, 5, 7, 9, 11, 13,14];
// $nova_linha2 = [6, 8, 6, 8, 9, 12, 14,15];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitações por status</title>
    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    
    

<style>
 


/* Estilos do sidebar
.sidebar {
  width: 240px;
  background-color: #111B42;
  padding-top: 20px;
  transition: transform 0.3s ease;
  z-index: 2; /* Para garantir que o sidebar esteja acima do conteúdo */

  *{
    padding: 5px;
  }
 

.badge {
        width: 90px; /* Definindo uma largura fixa para todas as badges */

        display: inline-block; /* Garantindo que as badges fiquem em linha uma ao lado da outra */
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
            </div>
        </div>
    </div>
</header>


  <main>

  <div class="container">
    
    <h2 id="solicitacao" >Solicitações por status</h2>
    <div class="btn-group d-flex justify-content-center mt-4" role="group" aria-label="Basic example" id="monthButtons">

</div>
<div class="row mt-4 ">
    <div class="col-xl-4 col-md-12 col-lg-3 mb-4 mb-0">
        <div class="card border-left-success shadow h-80 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Concluídos
                        </div>
                        <div class="display-4 h4 mb-0 font-weight-bold text-gray-1000"><?php echo $quantidadeConcluidos; ?></div>
                    </div>
                    <div class="col-auto">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4 mb-0">
        <div class="card border-left-warning shadow h-80 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Em andamento
                        </div>
                        <div class="display-4 h4 mb-0 font-weight-bold text-gray-800"><?php echo $quantidadeEmAndamento; ?></div>
                    </div>
                    <div class="col-auto">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4 mb-0">
        <div class="card border-left-danger shadow h-80 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pendentes
                        </div>
                        <div class="display-4 h4 mb-0 font-weight-bold text-gray-800"><?php echo $quantidadePendentes; ?></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


    <br>
    <div class="row justify-content-center">
        <div class=" col-lg-6 col-md-10 col-sm-12 mb-4 accordion" id="accordionPanelsStayOpenExample1">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <canvas class="charts" id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-10 col-sm-12 order-lg-2 mb-4 accordion" id="accordionPanelsStayOpenExample2">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                        
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <canvas class="charts" id="myChart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="row">
    <div class="col-12 col-md-8 col-lg-6 mt-4 mt-md-0  ">
        <div class="accordion" id="accordionPanelsStayOpenExample3">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                        
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <canvas class="charts" id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5 ">
<div class="col-md-12 col-lg-12 mx-auto">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th >id</th>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th>Leito</th>
                    <th >Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nomepaciente as $index => $nome): ?>
                    <tr class="table">
                        <td><?php echo $idprocedimento[$index]; ?></td>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $setor[$index]; ?></td>
                        <td><?php echo $leito[$index]; ?></td>
                        <td>
                            <?php 
                            // Determina a classe da pill badge com base no status do paciente
                            $badge_class = '';
                            switch ($statuspaciente[$index]) {
                                case 'Concluído':
                                    $badge_class = 'bg-success'; 
                                    break;
                                case 'Em andamento':
                                    $badge_class = 'bg-warning'; 
                                    break;
                                case 'Pendente':
                                    $badge_class = 'bg-danger'; 
                                    break;
                            }
                            ?>
                        
                            <span class="badge rounded-pill <?php echo $badge_class; ?>">
                                <?php echo $statuspaciente[$index]; ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<script src="chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo $status_json; ?>,
      datasets: [{
        label: 'quantidade',
        data: <?php echo $quantidades_json; ?>,
        backgroundColor: [ 
          'green',   
          'yellow',  
          'red'     
        ],
        
        borderWidth: 1
      }
    
    
    ]
    },
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
      labels: <?php echo $status_json; ?>,
      datasets: [{
        label: 'quantidade',
        data: <?php echo $quantidades_json; ?>,
        backgroundColor: [ 
          'green',   
          'yellow',  
          'red'     
        ],
        borderWidth: 1
      }
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


  const ctx3 = document.getElementById('myChart3');
  
  new Chart(ctx3, {
    type: 'line',
    data: {
      labels: <?php echo $status_json;?>,
      datasets: [
        {
        label: ' quantidade',
        data: <?php echo $quantidades_json;?>,
        borderWidth: 1,
        borderColor: [ 
            'green',  
            'yellow',  
            'red'      
          ],
          backgroundColor: [ 
            'rgba(0, 255, 0, 2)',   
            'rgba(255, 255, 0, 2)',
            'rgba(255, 0, 0, 2)',   
          ]
      }
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });



</script>
<br>
<br>
</main>




<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="chart.js"></script>

<script>

// Função para obter o nome do mês
function getMonthName(monthIndex) {
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    return months[monthIndex];
}

// Pegar a data atual
const currentDate = new Date();
const lastFiveMonths = [];

// Loop para obter os nomes dos últimos cinco meses
for (let i = 0; i < 5; i++) {
    const monthIndex = (currentDate.getMonth() - i + 12) % 12; // Para tratar o ano novo
    lastFiveMonths.unshift(getMonthName(monthIndex)); // Adiciona no início do array
}

const monthButtonsContainer = document.getElementById("monthButtons");

lastFiveMonths.forEach((monthName, index) => {
    const button = document.createElement("button");
    button.type = "button";
    button.classList.add("btn", "btn-primary");
    button.textContent = monthName;
    button.id = monthName; 

     // Adicione um evento de clique ao botão
button.addEventListener("click", function() {
    const monthClicked = this.id;
    const currentURL = window.location.href;

    // Verifica se já existe um parâmetro 'mes' na URL
    if (currentURL.indexOf("?mes=") !== -1) {
        // Se já existe, substitui o valor do parâmetro 'mes'
        const updatedURL = currentURL.replace(/(mes=)[^\&]+/, '$1' + monthClicked);
        // Redireciona para a nova URL
        window.location.href = updatedURL;
    } else {
        // Se não existe, adiciona o parâmetro 'mes' à URL
        const updatedURL = `${currentURL}?mes=${monthClicked}`;
        // Redireciona para a nova URL
        window.location.href = updatedURL;
    }
    
    // // Atualiza o gráfico após a URL ser atualizada
    // atualizarGrafico(monthClicked);
});

// // Função para atualizar o gráfico com os dados incorporados na página HTML
// var dadosGrafico = 
// function atualizarGrafico(mes) {
//     myChart5.data.labels = Object.keys(dadosGrafico);
//     myChart5.data.datasets[0].data = Object.values(dadosGrafico).map(eletivas);
//     myChart5.data.datasets[1].data = Object.values(dadosGrafico).map(urgencias);
//     myChart5.update();
// }

    monthButtonsContainer.appendChild(button);
});
</script>




</body>
</html>
