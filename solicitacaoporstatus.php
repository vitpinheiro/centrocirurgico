<?php

namespace teste;

include_once("pegarregistro.php");            


$puxar = new PuxarFuncoes;

// mostrar quantidade nos cards
$quantidadeConcluidos = $puxar->pegarQuantidadeConcluidos();
$quantidadeEmAndamento = $puxar->pegarQuantidadeEmAndamento();
$quantidadePendentes = $puxar->pegarQuantidadePendentes();


// gráficos

$concluidos = $puxar->pegarConcluidos();
$tiposciru = array_column($concluidos, 'nome_cirurgia');
$quant = array_column($concluidos, 'quantidade_concluida');
$tiposciru_json = json_encode($tiposciru);
$quant_json = json_encode($quant);

$Emandamento = $puxar->pegarEmandamento();
$tiposciru2 = array_column($Emandamento, 'nome_cirurgia');
$quant2 = array_column($Emandamento, 'quantidade_Em_andamento');
$tiposciru2_json = json_encode($tiposciru2);
$quant2_json = json_encode($quant2);

$Pendente = $puxar->pegarPendente();
$tiposciru3 = array_column($Pendente, 'nome_cirurgia');
$quant3 = array_column($Pendente, 'quantidade_Pendente');
$tiposciru3_json = json_encode($tiposciru3);
$quant3_json = json_encode($quant3);


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    

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
                        <a class="dropdown-item" href="tabelageral.php">Tabela geral</a>
                        <a class="dropdown-item" href="teste.php">Filtro Cirurgia</a>
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
    
    <h2 id="solicitacao"><i class="fa-regular fa-calendar-check"></i>Solicitações por status</h2>
    <div class="btn-group d-flex justify-content-center flex-wrap mt-4" role="group" aria-label="Basic example" id="monthButtons">
    <!-- Seu conteúdo aqui -->
</div>
<div class="row mt-4 ">
    <div class="col-xl-4 col-md-12 col-lg-12 mb-4 mb-0">
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
        <div class=" col-lg-6 col-md-10 col-sm-12 mb-4 accordion" id="accordionPanelsStayOpenExample1" >
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"><i class="fa-regular fa-circle-check"></i>
                    Concluídos
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
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo"><i class="fa-solid fa-spinner"></i>
                    Em andamento   
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
    <div class="col-lg-6 col-md-10 col-sm-12 order-lg-2 mb-4 accordion " id="accordionPanelsStayOpenExample3">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree"><i class="fa-solid fa-hourglass-end"></i>
                    Pendente    
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
<div class="col-md-12 col-10 col-lg-10 mx-auto">
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
      labels: <?php echo $tiposciru_json ;?>,
      datasets: [{
        label: 'quantidade',
        data: <?php echo $quant_json; ?>,
        backgroundColor: [ 
          'green',  
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
    type: 'bar',
    data: {
      labels: <?php echo $tiposciru3_json; ?>,
      datasets: [{
        label: 'quantidade',
        data: <?php echo $quant3_json; ?>,
        backgroundColor: [ 
          'red', 
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
    type: 'bar',
    data: {
      labels: <?php echo $tiposciru2_json;?>,
      datasets: [
        {
        label: ' quantidade',
        data: <?php echo $quant2_json;?>,
        borderWidth: 1,
    
          backgroundColor: [ 
            'yellow',      
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

const monthButtonsContainer = document.getElementById("monthButtons");

// Loop para obter os nomes dos meses de janeiro até dezembro
for (let i = 0; i < 12; i++) {
    const monthName = getMonthName(i);

    const button = document.createElement("button");
    button.type = "button";
    button.classList.add("btn", "btn-primary");
    button.textContent = monthName;
    button.id = monthName;

    // Adicione um evento de clique ao botão
    button.addEventListener("click", function () {
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
    });

    monthButtonsContainer.appendChild(button);
}
</script>




</body>
</html>
