<?php

namespace teste;
include("conexao.php");

include_once("pegarregistro.php");

// $puxardados = new PuxarDados;
// $mostrarbanco = $puxardados->pegarcirurgioes();

// // Extraia as informações do banco de dados para uso no gráfico
// $labels = array_column($mostrarbanco, 'nome');
// $quantidade = array_column($mostrarbanco, 'quantidade');

// $labels_json = json_encode($labels);
// $quantidade_json = json_encode($quantidade);

$funcoes = new PuxarFuncoes;
$sql = "SELECT  
ciru.id_setores as idsetor,
ciru.nome as nomeciru,
seto.nome_setor as setor
FROM cirurgioes as ciru 
INNER JOIN setores as seto
ON seto.id = ciru.id_setores
ORDER BY id_setores ASC";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $cirurgioes_por_setor = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $setor = $row['setor'];
        $nome_cirurgiao = $row['nomeciru'];
        $cirurgioes_por_setor[$setor][] = $nome_cirurgiao;

    }


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

    <script src="chart.js"></script>

    
    
    
<style>
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
 

  
    <h2>Cirurgiões</h2>
    
    <?php foreach ($cirurgioes_por_setor as $setor => $cirurgioes) { ?>
    <div class="row">
        <div class="col-lg-5 col-md-10 col-sm-12 accordion" id="accordionPanelsStayOpenExample<?php echo $setor; ?>">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $setor; ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $setor; ?>">Setor de
                        <?php echo $setor; ?>
                    </button>
                </h2>
                
                <div id="panelsStayOpen-collapse<?php echo $setor; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne">
                    <div class="accordion-body">
                      <ul>

                <?php // Itera sobre os cirurgiões do setor
                      foreach ($cirurgioes as $cirurgiao) { ?>
                        <li><?php echo $cirurgiao; ?></li> <?php }
                        ?>
                      </ul>
                    </div>
                </div>
            </div>
        </div>

</div>



<?php
    }
}
?>
<div class="row align-items-start">
    <div class="col-xl-9 col-md-6 mb-4">
        <!-- Colunas existentes -->
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-80 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pendentes
                        </div>
                        <div class="display-4 h4 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                        <!-- Conteúdo da coluna direita -->
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