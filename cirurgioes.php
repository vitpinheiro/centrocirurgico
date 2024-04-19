<?php

namespace teste;

include_once("pegarregistro.php");

$puxardados = new PuxarDados;
$mostrarbanco = $puxardados->pegarcirurgioes();

// Extraia as informações do banco de dados para uso no gráfico
$labels = array_column($mostrarbanco, 'nome');
$quantidade = array_column($mostrarbanco, 'quantidade');

$labels_json = json_encode($labels);
$quantidade_json = json_encode($quantidade);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img\Logobordab.png" type="image/x-icon">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">

    <script src="chart.js"></script>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,411;1,411&display=swap" rel="stylesheet">

<style>

*{
  font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-weight: 411;
  font-style: normal;
}

.sidebar {
  height: 100%;
  width: 240px;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #000000;
  background-image: linear-gradient(180deg, #000000 10%, #464343 100%);
  background-size: cover;
  padding-top: 20px;
}

.sidebar ul li {
  margin: 10px;
  text-align: left; 
 }

</style>


</head>
<body>
<header>
  <div class="wrapper"></div>
    <ul class = "navbar-nav bg-gradiente-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <div class="sidebar">

        <h2>
          <a class="nav-item" href="index.php" style="font-weight: 700;">Centro cirúrgico</a>
        </h2>

        <ul class="text-start">

            <li class="nav-item">
              <a  class="nav-link" href="solicitacaoporstatus.php">Solicitações por Status
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="cirurgiasportipo.php">
                <i></I>
                Cirurgias por Tipo
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="cirurgioes.php">
              <i></I>
              Cirurgiões
              </a>
            </li>

            <li><a href="#">Solicitações por Período de Tempo</a></li>
            <li><a href="tabelageral.php">Tabela Geral</a></li>
        </ul>

        <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

      </div>
    </ul>
  </div>
</header>
<!--  -->

  <div class="content">
    <div class="row">

    <br> <br> <br>
    <h2 style="font-weight: 900;">Cirurgiões</h2>
    <br> <br> <br>

    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="font-weight: 900;" class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Concluídos</div>
                                            <div class="fs-7 mb-0 font-weight-bold text-gray-800">*Incluir dados*</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
  
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="font-weight: 900;" class="text-xs  font-weight-bold text-warning text-uppercase mb-1">
                                                Agendados</div>
                                            <div class="mb-0 fs-7 font-weight-bold text-gray-800">*Incluir dados*</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="font-weight: 900;" class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pendentes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">*Incluir dados*</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--  -->
<main>
<div class="row">
    <div class="col-6 accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item shadow">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOn1e" aria-expanded="true" aria-controls="panelsStayOp1en-collapseOne">
            Tabela2
            </button>
          </h2>

          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
                  <canvas class="charts" id="myChart" ></canvas>
            </div>
          </div>     
      </div>
    </div>


    <div class="col-6 accordion" id="accordionPanelsStayOpenExample">
        <div class=" accordion-item shadow">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            Tabela2
            </button>
          </h2>

          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <canvas class="charts" id="myChart3"></canvas>
            </div>
          </div>     
      </div>
    </div>
</div>  


<div class="row">
  <div class="col-4 position-absolute end-0 accordion mt-4" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOp1en-collapseOne">
                Tabela1
            </button>
            </h2>

            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
              <div class="accordion-body">
                  <canvas  class="charts" id="myChart2"></canvas>
              </div>
            </div>     
        </div>
</div>

<div class="col-3">

<div class="info-box mb-3 bg-warning">

<span class="info-box-icon"><i class="fas fa-tag"></i></span>
<div class="info-box-content">
<span class="info-box-text">Inventory</span>
<span class="info-box-number">5,200</span>

</div>

</div>

<div class="info-box mb-3 bg-success">
<span class="info-box-icon"><i class="far fa-heart"></i></span>
<div class="info-box-content">
<span class="info-box-text">Mentions</span>
<span class="info-box-number">92,050</span>
</div>

</div>

<div class="info-box mb-3 bg-danger">
<span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
<div class="info-box-content">
<span class="info-box-text">Downloads</span>
<span class="info-box-number">114,381</span>
</div>

</div>

<div class="info-box mb-3 bg-info">
<span class="info-box-icon">
  <i class="far fa-comment"></i></span>

  <div class="info-box-content">
    <span class="info-box-text">Direct Messages</span>
</div>

</div>


<script>
   const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo $labels_json;?>,
      datasets: [{
        label: 'Quantidade',
        data: <?php echo $quantidade_json;?>,
        borderWidth: 1
      },
    
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
      datasets: [{
        label: 'quant janeiro',
        data: <?php echo $quantidade_json;?>,
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

  //Gráfico de linha
  // const nova_linha_data = php echo json_encode($nova_linha); ?>;
  // const nova_linha2_data = php echo json_encode($nova_linha2); ?>;

  const ctx3 = document.getElementById('myChart3');
  new Chart(ctx3, {
    type: 'line',
    data: {
      labels: <?php echo $labels_json;?>,
      datasets: [
        {
        label: ' quant janeiro',
        data: <?php echo $quantidade_json;?>,
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








</script>
<br>
<br>
</main>

<footer>
  <p></p>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburger = document.querySelector('.hamburger-menu');
        const sidebar = document.querySelector('.sidebar');

        hamburger.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });
    });
</script>

</body>

<script src="node_modules\@popperjs\core\dist\umd\popper.min.js"></script>
<script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

</html>