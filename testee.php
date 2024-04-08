<?php




?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Gráfico com AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Adicione aqui os links para os scripts do Chart.js e outros recursos necessários -->

    <script>
        // Função para enviar a solicitação AJAX e atualizar o gráfico
        function atualizarGrafico(filtro) {
            // Crie um objeto XMLHttpRequest para fazer a solicitação AJAX
            var xhr = new XMLHttpRequest();

            // Configurar a solicitação
            xhr.open('POST', 'processa_dados.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Definir o callback quando a resposta da solicitação for recebida
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Analisar a resposta JSON recebida
                    var data = JSON.parse(xhr.responseText);

                    // Aqui você pode usar os dados recebidos para atualizar o gráfico usando Chart.js
                    // Exemplo:
                    // atualizarGraficoComDados(data);
                } else {
                    console.error('Erro ao receber dados:', xhr.statusText);
                }
            };

            // Definir o callback para lidar com erros de rede
            xhr.onerror = function () {
                console.error('Erro de rede ao tentar enviar a solicitação AJAX');
            };

            // Enviar a solicitação com o filtro
            xhr.send('filtro=' + encodeURIComponent(filtro));
        }

        // Exemplo de chamada da função para atualizar o gráfico com filtro 'QUANTIDADE'
        atualizarGrafico('GENERO');
    </script>
</head>
<body>

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
            backgroundColor: ['red', 'blue'],
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
            backgroundColor: ['red', 'blue'],
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
    
    
    
    
    

</body>
</html>
