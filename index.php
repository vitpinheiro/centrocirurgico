<?php


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Cirurgico</title>
    <link rel="icon" href="img\Logobordab.png" type="image/x-icon">


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
      </ul>
    </div>
  </div>
</nav>
</header>

<main>
<div class="container text-center mt-5">
    
<h1 class="pt-2 pb-5">OLÁ, ADMIN!</h1>

    <div id="pesquisar" class="">
        <form class="d-flex justify-content-center mt-5 pt-4 pb-2 " role="search">
            <div class=" col-md-8 mb-3 mb-4 ">
                <input class="form-control me-2 " type="search" id="searchInput" placeholder="Buscar" aria-label="Search">
            </div>
            <div class="col-sm-4 col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Buscar</button>
            </div>
        </form>
    </div>
</div>

    <div class="container mt-5">
        <div class="row" id="infoBoxContainer">
            <div class="col-md-4 ">
                <div class="info-box" id="solicitacoes">
                    <span class="info-box-icon bg-success"><a href="solicitacaoporstatus.php"><img src="img/medico.svg" alt=""><i class="fa-solid fa-user-doctor"></a></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="solicitacaoporstatus.php">Solicitações por status</a></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box" id="cirurgioes">
                    <span class="info-box-icon bg-success"><a href="cirurgioes.php"><img src="img/medico.svg" alt=""><i class="fa-solid fa-user-doctor"></a></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="cirurgioes.php">Cirurgiões</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box" id="cirurgias">
                    <span class="info-box-icon bg-success"><a href="cirurgiasportipo.php"><img class="cirurgia" src="img/cirurgia.svg" alt=""></a><i class="fa-solid fa-user-doctor"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="cirurgiasportipo.php">Cirurgias</a></span>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol

6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script>
    // Função para exibir as divs correspondentes ao texto digitado
    document.getElementById('searchInput').addEventListener('input', function() {
        // Texto digitado, convertido para minúsculas e sem acentos
        var searchText = this.value.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        // Divs a serem exibidas
        var divs = document.querySelectorAll('.info-box');
        // Iterar sobre as divs
        divs.forEach(function(div) {
            // Texto dentro da div, convertido para minúsculas e sem acentos
            var textInsideDiv = div.textContent.trim().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
            // Verificar se o texto digitado está presente na div
            if (textInsideDiv.includes(searchText)) {
                // Mostrar a div
                div.classList.remove('d-none');
            } else {
                // Ocultar a div
                div.classList.add('d-none');
                
            }
        });
    });
</script>

</body>
</html>
