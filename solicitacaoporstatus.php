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
$mostrarstatus = $puxar->pegarnomestatus();
$nomepaciente =array_column($mostrarstatus, 'nome');
$nomepaciente_json = json_encode($nomepaciente);
$statuspaciente = array_column($mostrarstatus, 'status');
$statuspaciente_json = json_encode($statuspaciente);



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

body{
  margin-left: 150px;
 
}

</style>


</head>
<body>

<header>
<!-- Example single danger button -->

<div class="btn-group ">
  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    MENU
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Home</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="solicitacaoporstatus.php">Solicitações por status</a>
    <a class="dropdown-item" href="cirurgiasportipo.php">Cirurgias por tipo</a>
    <a class="dropdown-item" href="cirurgioes.php">Cirurgiões</a>
    <a class="dropdown-item" href="#">Solicitações por período de tempo</a>
    <a class="dropdown-item" href="tabelageral.php">Tabela geral</a>
  </div>
</div>
</header>


  <main>
  <div class="content">
    <h2 id="solicitacao" >Solicitações por status</h2>
    <div class="row">
    <div class="col-xl-3 col-md-12 col-lg-3 mb-4">
                            <div class="card border-left-success shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Concluídos</div>
                                            <div class="display-4 h4 mb-0 font-weight-bold text-gray-1000"><?php echo $quantidadeConcluidos; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
  
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Em andamento</div>
                                            <div class="display-4 h4 mb-0 font-weight-bold text-gray-800"><?php echo $quantidadeEmAndamento; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pendentes</div>
                                            <div class="display-4 h4 mb-0 font-weight-bold text-gray-800"><?php echo $quantidadePendentes; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <img src="img/pendente.svg" alt=""><i class="<i class="fa-solid fa-hourglass-end fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<!--  -->



    <br>
    <div class="row">
        <div class=" col-lg-5 col-md-10 col-sm-12  accordion" id="accordionPanelsStayOpenExample1">
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
        <div class=" col-lg-5 col-md-6 col-sm-12 order-lg-2 accordion" id="accordionPanelsStayOpenExample2">
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

  
    <div class="col-12 col-md-6 col-lg-5 mt-4 mt-md-0 ">
        <div class="accordion" id="accordionPanelsStayOpenExample3">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                        Gráfico
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

<div class="row mt-5">
    <div class="col-12 col-md-6 col-lg-10">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Nome</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nomepaciente as $index => $nome): ?>
                    <tr class="table">
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $statuspaciente[$index]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


    <!-- <div class="col-lg-6 col-xs-12">
        <h5 class="text-center">Gráfico</h5>
        <canvas class="charts" id="myChart" ></canvas>
    </div> -->

    <!-- <div class="col-lg-6 col-xs-12">
        <h4 class="text-center">Gráfico de linhas</h4>
          <canvas class="charts" id="myChart3"></canvas>
        </div>
   </div>
 
    <br>
    <div class="row justify-content-center">        
        <div class="col-lg-3 col-xs-12">
          <h5 class="text-center">Gráfico de pizza</h5>
          <canvas  class="charts" id="myChart2"></canvas>
        </div>
    </div>
 
</div>
  </div>
</div> -->


<script src="chart.js"></script>

<script>
  //Gráfico de barras
  // const nova_barra_data = php echo json_encode($nova_barra); ?>;
  // const nova_barra2_data = php echo json_encode($nova_barra2); ?>;
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo $status_json; ?>,
      datasets: [{
        label: 'quantidade',
        data: <?php echo $quantidades_json; ?>,

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
  
  //Gráfico de pizza
  const ctx2 = document.getElementById('myChart2');
  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: <?php echo $status_json; ?>,
      datasets: [{
        label: 'quantidade',
        data: <?php echo $quantidades_json; ?>,
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

  //Gráfico de linha
  // const nova_linha_data = php echo json_encode($nova_linha); ?>;
  // const nova_linha2_data = php echo json_encode($nova_linha2); ?>;

  const ctx3 = document.getElementById('myChart3');
  
  new Chart(ctx3, {
    type: 'line',
    data: {
      labels: <?php echo $status_json;?>,
      datasets: [
        {
        label: ' quantidade',
        data: <?php echo $quantidades_json;?>,
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



</script>
<br>
<br>
</main>





<!-- Outros elementos HTML -->

<footer>
  <p></p>
</footer>



<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="chart.js"></script>

<script>
  // Seus scripts JavaScript
</script>

<script>
  // Script para o menu hamburguer
  document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.hamburger-menu');
    const sidebar = document.querySelector('.sidebar');

    hamburger.addEventListener('click', function () {
      sidebar.classList.toggle('active');
    });
  });
</script>

<!-- <script>
  // Script para o acordeão
  document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', () => {
      const target = button.getAttribute('data-bs-target');
      const collapseElements = document.querySelectorAll('.accordion-collapse');
      collapseElements.forEach(collapse => {
        if (collapse.id !== target) {
          collapse.classList.remove('collapse');
        }
      });
    });
  });
</script> -->

</body>
</html>
