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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  


<style>

*{
  margin: 0em;
}

.logo img{
 width: 5em;
 margin: 1em;
}

.d-flex{
  width: 50em;
  margin: 8em;
  text-align: center;
}

.pesquisar{
  margin: 12em;

}

h1{
  padding: 0.2em;
  text-align: center;
  font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
  margin-top: 1.2em; /* Reduza a margem superior do h1 */
}

div#card1{
  margin: 8em;
  
}

.card-title a{
  text-decoration: none;
  color: black;
}


</style>

</head>
<body>
<header>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<figure class="logo"><img src="img/Logobordab.png" alt=""></figure>
  <div class="container-fluid">
 
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
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

<h1 class="ola">OLÁ, ADMIN!</h1>

</header>

<main>


<div class="pesquisar container">
  <form class="d-flex justify-content-center" role="search">
  <div class="col-sm-8 col-md-8">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  </div>
  <div class="col-sm-4 col-md-2">
    <button class="btn btn-outline-success" type="submit">Search</button>
    </div>
  </form>
</div>


<div id="card1" class="row justify-content-center">
  <div class="col-md-4">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
        <a href="solicitacaoporstatus.php">
  <img src="img/projeto.png" class="img-fluid rounded-start" alt="Descrição da imagem"></a>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><a href="solicitacaoporstatus.php">Solicitações por status</a></h5>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-4">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <a href="cirurgioes.php">
      <img src="img/medico.png" class="img-fluid rounded-start" alt="..."></a>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><a href="cirurgioes.php">Cirurgiões</a></h5>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-4">
    <div class="card mb-3" >
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/cirurgia.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Cirurgias</h5>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</main>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>