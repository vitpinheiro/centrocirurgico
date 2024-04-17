<?php

namespace teste;

include_once("pegarregistro.php");

$puxardados = new PuxarDados;
$mostrarbanco = $puxardados->pegarregistro();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">


<style>


</style>

</head>
<body>
<header>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<figure class="logo"><a href="index.php"><img src="img/Logobordab.png" alt=""></a></figure>
  <div class="container-fluid">
 
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://10.1.1.31/centralservicos/login">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Contato</a>
        </li>
      </ul>
      
      
    </div>
  </div>
</nav>
</header>




<main>
<h1 class="ola">OLÁ, ADMIN!</h1>
    <div class="pesquisar container">
        <form class="d-flex justify-content-center" role="search">
            <div class="col-sm-8 col-md-8">
                <input class="form-control me-2" type="search" id="searchInput" placeholder="Buscar" aria-label="Search">
            </div>
            <div class="col-sm-4 col-md-2">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </div>
        </form>
    </div>
    <div id="card1" class="row justify-content-center">
        <div class="col-md-4" id="solicitacoesDiv">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="solicitacaoporstatus.php">
                            <img src="img/projeto.png" class="img-fluid rounded-start" alt="Descrição da imagem">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="solicitacaoporstatus.php">Solicitações por status</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="cirurgioesDiv">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="cirurgioes.php">
                            <img src="img/medico.png" class="img-fluid rounded-start" alt="...">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="cirurgioes.php">Cirurgiões</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="cirurgiasDiv">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="cirurgiasportipo.php">
                            <img src="img/cirurgia.png" class="img-fluid rounded-start" alt="...">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="cirurgiasportipo.php">Cirurgias</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
<script src="node_modules\jquery\dist\jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script>
    // Função para exibir as divs correspondentes ao texto digitado
    document.getElementById('searchInput').addEventListener('input', function() {
        // Texto digitado, convertido para minúsculas e sem acentos
        var searchText = this.value.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        // Divs a serem exibidas
        var divs = document.querySelectorAll('.card');
        // Iterar sobre as divs
        divs.forEach(function(div) {
            // Texto dentro da div, convertido para minúsculas e sem acentos
            var textInsideDiv = div.textContent.trim().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
            // Verificar se o texto digitado está presente na div
            if (textInsideDiv.includes(searchText)) {
                // Exibir a div
                div.style.display = 'block';
            } else {
                // Ocultar a div
                div.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>