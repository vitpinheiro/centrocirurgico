<?php

namespace teste;

include_once("pegarregistro.php");

$puxardados = new PuxarDados;
$mostrarbanco = $puxardados->pegarregistro();


// Extraia as informações do banco de dados para uso no gráfico
$labels = array_column($mostrarbanco, 'plano_saude');
$datajan = array_column($mostrarbanco, 'quantidade_jan');
$datafev = array_column($mostrarbanco, 'quantidade_fev');
$datamar = array_column($mostrarbanco, 'quantidade_mar');
// $data = array_column($mostrarbanco, 'plano_saude');
// Converta os dados para JSON para uso no JavaScript
$labels_json = json_encode($labels);
$datajan_json = json_encode($datajan);
$datafev_json = json_encode($datafev);
$datamar_json = json_encode($datamar);
// $data_json = json_encode($data);
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
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  


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

}
#navbarNav{
justify-content: right;

}


/*  */
    body {
  margin: 0;
  font-family: Arial, sans-serif;
 
}

footer{
  padding: 2em;
}

.sidebar {
  height: 100%;
  width: 240px;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #111B42;
  padding-top: 20px;
}

.sidebar h2 {
  color: white;
  text-align: center;
  
  
}

.sidebar ul {
  list-style-type: none;
  padding: 0;
}

.sidebar ul li {
  padding: 8px;
  text-align: center; 
 }

.sidebar ul li a {
  color: white;
  text-decoration: none;
  
}

.sidebar ul li a:hover {
  background-color: #555;
}

.content {
  margin-left: 250px;
  padding: 20px;
  height: 20em;
} */
/*  */
.line {
  width: 25px;
  height: 3px;
  background-color: black;
  margin: 5px 0;
}
/* Ajustes gerais */
body, html {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.wrapper {
  display: flex;
}

/* Estilos do sidebar */
.sidebar {
  width: 240px;
  background-color: #111B42;
  padding-top: 20px;
  transition: transform 0.3s ease;
  z-index: 2; /* Para garantir que o sidebar esteja acima do conteúdo */
}

/* Estilos do conteúdo principal */
.content {
  /* flex-grow: 1; /* O conteúdo principal ocupará o espaço restante */
  /* padding: 20px;
  height: 100vh; Ocupa a altura total da tela */
  /* overflow-y: auto; Adiciona rolagem vertical se o conteúdo ultrapassar a altura da tela */ */
}

/* Estilos para o menu de hambúrguer */
.hamburger-menu {
  display: none;
  cursor: pointer;
  position: absolute;
  top: 20px;
  right: 20px;
  z-index: 3; /* Para garantir que o menu de hambúrguer esteja acima do conteúdo */
}



/* Estilos para telas menores */
@media only screen and (max-width: 768px) {
  .sidebar {
    transform: translateX(-100%);
    position: fixed; /* Corrigir posição do sidebar em telas menores */
    top: 0;
    bottom: 0;
    left: 0;
  }

  .content {
    margin-left: 0; /* Remove a margem do conteúdo principal quando o sidebar estiver oculto */
  }

  .hamburger-menu {
    display: block;
  }
}

</style>


</head>
<body>
<header>



<!-- <div class="sidebar shadow">
    <h2>Centro cirúrgico</h2><br>
    <ul>
    <div class="nav-item">
      <li><a href="#">Solicitações por Status</a></li>
      <li><a href="#"> Cirurgias por Tipo</a></li>
      <li><a href="#">Cirurgiões</a></li>
      <li><a href="#">Solicitações por Periodo de Tempo</a></li>
      <li><a href="tabelageral.php">Tabela Geral</a></li>
    </ul>
</div>
  </div>  -->
  <!--  -->
  <div class="wrapper"></div>
  <div class="sidebar shadow">
    <h2><a href="index.php">Centro cirúrgico</a></h2><br>
    <ul class="menu">
        <li><a href="solicitacaoporstatus.php">Solicitações por Status</a></li>
        <li><a href="cirurgiasportipo.php">Cirurgias por Tipo</a></li>
        <li><a href="cirurgioes.php">Cirurgiões</a></li>
        <li><a href="#">Solicitações por Período de Tempo</a></li>
        <li><a href="tabelageral.php">Tabela Geral</a></li>
    </ul>
    <div class="hamburger-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</div>
  <!--  -->

  <div class="content">
    <h2>Olá, TI Admin!</h2>
    <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Concluídos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">*Incluir dados*</div>
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
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Agendados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">*Incluir dados*</div>
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
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
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
<div class="container">
    <br>
    <div class="row">
        <div class="col-6 accordion" id="accordionPanelsStayOpenExample1">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <canvas class="charts" id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 accordion" id="accordionPanelsStayOpenExample2">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                        Accordion Item #2
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
        <div class="col-5 position-absolute end-0 accordion mt-4" id="accordionPanelsStayOpenExample3">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                        Tabela 1
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
      labels: <?php echo $labels_json;?>,
      datasets: [{
        label: 'quant janeiro',
        data: <?php echo $datajan_json;?>,
        borderWidth: 1
      },
      {
        label: 'quant fevereiro ',
        data: <?php echo $datafev_json;?>,
        borderWidth: 1
      
      },
      {
        label: 'quant março ',
        data: <?php echo $datamar_json;?>,
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
      labels: <?php echo $labels_json;?>,
      datasets: [{
        label: 'quant janeiro',
        data: <?php echo $datajan_json;?>,
        borderWidth: 1
      },
      {
        label: 'quant fevereiro ',
        data: <?php echo $datafev_json;?>,
        borderWidth: 1
      
      },
      {
        label: 'quant março ',
        data: <?php echo $datamar_json;?>,
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
        data: <?php echo $datajan_json;?>,
        borderWidth: 1
     
      },
      {
        label: ' quant fevereiro',
        data: <?php echo $datafev_json;?>,
        borderWidth: 1
     
      },
      {
        label: ' quant março',
        data:  <?php echo $datamar_json;?>,
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
