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
    <h2>Centro cirúrgico</h2><br>
    <ul class="menu">
        <li><a href="solicitacaoporstatus.php">Solicitações por Status</a></li>
        <li><a href="#">Cirurgias por Tipo</a></li>
        <li><a href="#">Cirurgiões</a></li>
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