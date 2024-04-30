<?php

namespace teste;
include("conexao.php");
include_once("pegarregistro.php");

$funcoes = new PuxarFuncoes;
$sql ="SELECT 
        -- proc.id as idprocedimento,
        -- proc.id_cirugia,
        -- ciru.id as idcirurgia,

        ciru.cirurgia as ciru1,
        COUNT(id_cirugia) AS quantidade_total
            FROM procedimentos as proc
            INNER JOIN cirurgias as ciru ON ciru.id = proc.id_cirugia
            GROUP BY proc.id_cirugia";
                    
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);

            if ($result && mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result))
                {
                    $cirurgias_array[] = $row['ciru1'];
                    $quantcirurgias_array[] = $row['quantidade_total'];
                }
            }
            $cirurgias_json = json_encode($cirurgias_array);
            $quantcirurgias_json = json_encode($quantcirurgias_array);

            $sql2 = "SELECT 
                        ciru.cirurgia as ciru1,
                        COUNT(id_cirugia) AS quantidade_total
                    FROM procedimentos as proc
                    INNER JOIN cirurgias as ciru ON ciru.id = proc.id_cirugia
                    GROUP BY proc.id_cirugia
                    ORDER BY quantidade_total DESC
                    LIMIT 5";        
            
            $result2 = mysqli_query($conn, $sql2);
            
            $cirurgias2_array = array();
            $quantcirurgias2_array = array();
            
            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $cirurgias2_array[] = $row2['ciru1'];
                    $quantcirurgias2_array[] = $row2['quantidade_total'];
                }
            }
            
            $cirurgias2_json = json_encode($cirurgias2_array);
            $quantcirurgias2_json = json_encode($quantcirurgias2_array);
           
            



   $cirurgiasporsetor = $funcoes->cirurgiasporsetor();
   $nomesetor = array_column($cirurgiasporsetor, 'setor');
   $nomesetor_json = json_encode($nomesetor);        
   $totalciru = array_column($cirurgiasporsetor, 'total_cirurgias');
   $totalciru_json = json_encode($totalciru);        

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

 
}
.carousel-control-prev-icon{
  background-color: black;
}
.carousel-control-next-icon{
   background-color: black;
}

.hr {
        border: 1px solid black; /* Define a largura e a cor da borda */
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
                <!-- Adicione aqui quaisquer outros elementos que você deseje alinhar -->
            </div>
        </div>
    </div>
</header>

<main>
  

<div class="container">
<h2>Cirurgias por tipo:</h2>
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-inner">
        <?php 
        $total_items = count($cirurgias_array);
        $items_per_slide = 3;
        $total_slides = ceil($total_items / $items_per_slide);

        for ($i = 0; $i < $total_slides; $i++) {
            echo '<div class="carousel-item';
            if ($i === 0) echo ' active'; // Adiciona a classe 'active' ao primeiro item
            echo '"><div class="row">';
            
            // Itera sobre os itens a serem exibidos neste slide
            for ($j = $i * $items_per_slide; $j < min(($i + 1) * $items_per_slide, $total_items); $j++) {
                echo '<div class="col-4">';
                echo '<div class="card border-left-success shadow h-80 py-1">';
                echo '<div class="card-body">';
                echo '<div class="row  ">';
                echo '<div class="col mr-2">';
                echo '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">' . $cirurgias_array[$j] . '</div>';
                echo '<div class="display-4 h4 font-weight-bold text-gray-800">' . $quantcirurgias_array[$j] . '</div>';
                echo '</div></div></div></div></div>';
            }
            
            echo '</div></div>';
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="margin-left:-80px;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="margin-right: -80px;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    <br>
    <div class="row">
      
        <div class="col-lg-6 col-md-6 col-sm-12 accordion " id="accordionPanelsStayOpenExample1">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <canvas class="charts" id="myChart3"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 accordion " id="accordionPanelsStayOpenExample2">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                      
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <canvas class="charts" id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row mt-4">
        <div class="col-lg-6">
            <!-- Seu código do gráfico de pizza aqui -->
            <div class="row mt-4 ">
                <div class="col-12 col-md-6 col-lg-10  accordion " id="accordionPanelsStayOpenExample3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                              
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <canvas class="charts" id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Sua tabela dos top 5 cirurgias aqui -->
            <h3 class="ml-2">TOP 5 Cirurgias</h3>   
            <table class="table table-bordered">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Cirurgia</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verifique se há resultados antes de exibir na tabela
                    if (!empty($cirurgias2_array)) {
                        // Itere sobre os resultados e exiba cada linha na tabela
                        for ($i = 0; $i < count($cirurgias2_array); $i++) {
                            echo '<tr>';
                            echo '<th scope="row">' . ($i + 1) . '</th>'; // +1 para exibir números começando em 1
                            echo '<td>' . $cirurgias2_array[$i] . '</td>';
                            echo '<td>' . $quantcirurgias2_array[$i] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        // Caso não haja resultados, exiba uma linha na tabela informando ao usuário
                        echo '<tr><td colspan="3">Nenhum resultado encontrado</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


   <br>
   <br>
   <br>
   <br>
   <div class="row">
   <div class="border-top my-4">
    <div class="border-bottom my-4">
        <h3>Cirurgias por setor:</h3>
        <div class="row mt-4 ">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="accordion" id="accordionPanelsStayOpenExample3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                               
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <canvas class="charts" id="myChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-12 col-md-6 col-lg-6 mt-1">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Setor</th>
                            <th scope="col">Total de Cirurgias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($nomesetor) && !empty($totalciru)) {
                            // Iterar sobre os arrays para exibir os dados na tabela
                            for ($i = 0; $i < count($nomesetor); $i++) {
                                echo '<tr>';
                                echo '<td>' . $nomesetor[$i] . '</td>';
                                echo '<td >' . $totalciru[$i] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="2">Nenhum resultado encontrado</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

   
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo $cirurgias_json ?>,
        datasets: [{
            label: 'Quantidade',
            data: <?php echo $quantcirurgias_json ?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'bottom', // Posição da legenda (pode ser 'top', 'bottom', 'left', 'right')
                labels: {
                    font: {
                        size: 10 // Tamanho da fonte da legenda
                    },
                    // Altere a legenda aqui
                    text: 'Sua nova legenda' // Texto personalizado da legenda
                }
            }
        }
    }
});
   const ctx2 = document.getElementById('myChart3');
new Chart(ctx2, {
    type: 'line',
    data: {
        labels: <?php echo $cirurgias_json ?>,
        datasets: [{
            label: 'Quantidade',
            data: <?php echo $quantcirurgias_json ?>,
            borderWidth: 1,
            borderColor: 'rgba(255, 99, 132, 2)', // Cor da linha
            backgroundColor: 'rgba(255, 99, 132, 2)', // Cor de preenchimento da área sob a linha
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'bottom', // Posição da legenda (pode ser 'top', 'bottom', 'left', 'right')
                labels: {
                    font: {
                        size: 10 // Tamanho da fonte da legenda
                    },
                    // Altere a legenda aqui
                    text: 'Sua nova legenda' // Texto personalizado da legenda
                }
            }
        }
    }
});
   const ctx3 = document.getElementById('myChart2');
new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: <?php echo $cirurgias_json ?>,
        datasets: [{
            label: 'Quantidade',
            data: <?php echo $quantcirurgias_json ?>,
            backgroundColor: [
            'rgba(255, 99, 132, 2)',   // Vermelho
            'rgba(54, 162, 235, 2)',   // Azul
            'rgba(255, 206, 86, 2)',   // Amarelo
            'rgba(75, 192, 192, 2)',   // Verde
            'rgba(153, 102, 255, 2)',  // Roxo
            'rgba(255, 159, 64, 2)',   // Laranja
            'rgba(255, 0, 255, 2)',    // Magenta
            'rgba(0, 255, 255, 2)',    // Ciano
            'rgba(255, 255, 0, 2)',    // Amarelo claro
            'rgba(0, 255, 0, 2)',      // Verde claro
],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'bottom', // Posição da legenda (pode ser 'top', 'bottom', 'left', 'right')
                labels: {
                    font: {
                        size: 10 // Tamanho da fonte da legenda
                    },
                    // Altere a legenda aqui
                    text: 'Sua nova legenda' // Texto personalizado da legenda
                }
            }
        }
    }
});

const ctx4 = document.getElementById('myChart4');
new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: <?php echo $nomesetor_json?>,
        datasets: [{
            label: 'Quantidade',
            data: <?php echo $totalciru_json ?>,
            backgroundColor: [
            'rgba(255, 99, 132, 2)',   // Vermelho
            'rgba(54, 162, 235, 2)',   // Azul
            'rgba(255, 206, 86, 2)',   // Amarelo
            'rgba(75, 192, 192, 2)',   // Verde
            'rgba(153, 102, 255, 2)',  // Roxo
            'rgba(255, 159, 64, 2)',   // Laranja
            'rgba(255, 0, 255, 2)',    // Magenta
            'rgba(0, 255, 255, 2)',    // Ciano
            'rgba(255, 255, 0, 2)',    // Amarelo claro
            'rgba(0, 255, 0, 2)',      // Verde claro
],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'bottom', // Posição da legenda (pode ser 'top', 'bottom', 'left', 'right')
                labels: {
                    font: {
                        size: 10 // Tamanho da fonte da legenda
                    },
                    // Altere a legenda aqui
                    text: 'Sua nova legenda' // Texto personalizado da legenda
                }
            }
        }
    }
});

</script>

</main>

<footer>

</footer>


<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>