<?php

namespace teste;

include_once("pegarregistro.php");

$puxardados = new PuxarDados;
$mostrarestado = $puxardados->pegarestado();


$labels = array_column($mostrarestado, 'estado');
$data = array_column($mostrarestado, 'quantidade');

// $labels = array_column($mostrarmulheres, 'genero');
// // Defina os dados para o gráfico
// $data = array_fill(0, count($labels), 0);
// foreach ($mostrarmulheres as $mulher) {
//     $index = array_search($mulher['genero'], $labels);
//     $data[$index]++;
// }
// $data = array_column($mostrarbanco, 'plano_saude');
// Converta os dados para JSON para uso no JavaScript
$labels_json = json_encode($labels);
$data_json = json_encode($data);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<style>
    h2{
        text-align: center;
        padding: 1em;
    }
</style>

</head>
<body>

<h2>QUANTIDADE POR ESTADO</h2>
<div>
  <div class="container">
    <div class="row">
  
   
    <div class="col-sm-12 col-md-6 ">
        <canvas id="myChart" width="400" height="440" ></canvas>
    </div>
   
   
    <div  class="col-sm-12  col-md-6 ">
      <canvas id="myChart2" width="400" height="380"></canvas>
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
        label: 'Quantidade',
        data: <?php echo $data_json;?>,
        backgroundColor: ['#003f5c', '#2f4b7c', '#665191', '#a05195', '#d45087'],
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
        label: 'quantidade',
        data: <?php echo $data_json;?>,
        backgroundColor: ['#003f5c', '#2f4b7c', '#665191', '#a05195', '#d45087'],
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





</script>



</body>
</html>