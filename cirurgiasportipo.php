<?php

namespace teste;

include_once("pegarregistro.php");

$funcoes = new PuxarFuncoes;
$contarciru= $funcoes->contarCirurgias();
print_r($contarciru);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cirurgias por tipo</title>
    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">


<style>

h4{
  color: grey ;
  font-family: Arial, Helvetica, sans-serif;
}
  
h5{
  text-align: right;
  color: grey;
}

h1{
  text-align: center;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
/* 
h2 a{
  text-decoration: none;
  color:white;
}

.charts {
width: 50px;
height: 50px;
background-color: white;
}

#myChart{
width: 10em;
height: 90em;
/*  */



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
<div class="btn-group ">
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
</header>

<main>
  <div class="content">
    <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Cirurgia Cardíaca</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $contarciru;?></div>
                                        </div>
                                        <div class="col-auto">
                                          
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Ortopedia</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cirurgia Geral</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Neurocirurgia</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                          
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cirurgia Plástica</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cirurgia Vascular</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cirurgia Oncológica</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                          
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cirurgia Plástica Estética</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cirurgia Pediátrica</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cirurgia Torácica</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
  
                     
                    <h2>Cirurgias por tipo</h2>
<!--  -->


<div class="container">
    <br>
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12 accordion " id="accordionPanelsStayOpenExample1">
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
        <div class="col-lg-5 col-md-6 col-sm-12 accordion " id="accordionPanelsStayOpenExample2">
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

    <div class="row mt-4">
        <div class="col-12 col-md-6 col-lg-5  accordion " id="accordionPanelsStayOpenExample3">
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





<script src="chart.js"></script>

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
      labels: <?php echo $labels_json;?>,
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

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>