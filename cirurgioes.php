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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

h4{
  color: grey ;
  font-weight: 411;
}
  
h5{
  text-align: right;
  color: grey;
  font-weight: 411;

}

h1{
  text-align: center;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-weight: 411;

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

footer{
  padding: 2em;
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
  <div class="wrapper"></div>
    <ul class = "navbar-nav bg-gradiente-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <div class="sidebar">
        <h2><a href="index.php" style="font-weight: 700;">Centro cirúrgico</a></h2><br>
        <ul class="menu text-start">
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
    </ul>
  </div>
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
  <div class="container align-items-center justify-content-center shadow">
    <div class="row">

    <div class="row">
    <div class="col-md-12 text-center">
    </div>
</div>
 <br>
  
    <div class="col-lg-6 col-xs-12">
        <canvas class="charts" id="myChart" ></canvas>
    </div>

    <div class="col-lg-6 col-xs-12">
          <canvas class="charts" id="myChart3"></canvas>
        </div>
   </div>
 
    <br>
    <div class="row justify-content-center">        
        <div class="col-lg-3 col-xs-12">
          <canvas  class="charts" id="myChart2"></canvas>
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>