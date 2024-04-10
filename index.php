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
}




</style>


</head>
<body>
<header>
<h1>LOUCURA BOE</h1>
<!-- 
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid d-flex justify-content-center align-items-center">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="home"class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->




<!--  -->

<!--  -->
</header>

<!-- <div class="sidebar-heading">Categorias</div> -->
<div class="sidebar shadow">
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
  </div>


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
  <div class="container align-items-center justify-content-center shadow">
    <div class="row">

    <div class="row">
    <div class="col-md-12 text-center">
    </div>
</div>
 <br>
  
    <div class="col-6 ">
        <h5 class="text-center">Gráfico</h5>
        <canvas class="charts" id="myChart" ></canvas>
    </div>

    <div class="col-6">
        <h4 class="text-center">Gráfico de linhas</h4>
          <canvas class="charts" id="myChart3"></canvas>
        </div>
   </div>
 
    <br>
    <div class="row justify-content-center">        
        <div class="col-3">
          <h5 class="text-center">Gráfico de pizza</h5>
          <canvas  class="charts" id="myChart2"></canvas>
        </div>
    </div>
 
</div>
  </div>
</div>


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

<footer>
  <p></p>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>