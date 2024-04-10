<?php
namespace teste;

require_once("conexao.php");
$pesquisa = isset($_GET['busca']) ? $mysqli->real_escape_string($_GET['busca']) : '';


$sql_code = "SELECT * FROM registros_hospital WHERE plano_saude LIKE '%$pesquisa%' OR quantidade_jan LIKE '%$pesquisa%' OR  quantidade_fev LIKE '%$pesquisa%' OR  quantidade_mar LIKE '%$pesquisa%'";
$sql_query = $mysqli->query($sql_code) or die("erro ao consultar".$mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de busca</title>
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

h2 a{
 text-decoration: none;
 color: white;
}

.charts {
width: 50px;
height: 50px;
background-color: white;
}

#navbarNav{
justify-content: right;

}

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

.tabela{
    text-align: center;


}


.table-bordered{
    width: 50em;
    justify-content: center;
    display: inline-table;
}


</style>


</head>
<body>
<header>
  
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
    <h2><a href="index.php">Centro cirúrgico</a></h2><br>
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
<br>
 <div class="tabela">
<h1 >Planos de saúde</h1>
    <form action="">
    <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <br>
    <br>
    <br>

    <table class="table table-bordered" class="formulario" width="600px " border="2">
        <tr>
            <th>Plano de saude</th>
            <th>Quant janeiro</th>
            <th>Quant fevereiro</th>
            <th>Quant março</th>
        </tr>
        
        <?php
        if(!isset($_GET['busca'])){
          
        ?>
        
        <?php
        }else{
          $pesquisa = $mysqli->real_escape_string($_GET['busca']);
          $sql_code = "SELECT * FROM registros_hospital WHERE plano_saude LIKE '%$pesquisa%' OR quantidade_jan LIKE '%$pesquisa%' OR  quantidade_fev LIKE '%$pesquisa%' OR  quantidade_mar LIKE '%$pesquisa%'";
          $sql_query = $mysqli->query($sql_code) or die("erro ao consultar".$mysqli->error);


          if($sql_query->num_rows ==0 ){
        ?>
        <tr>
        <td>Nenhum resultado encontrado</td>
        </tr>
        <?php 
        }else{
            while($dados = $sql_query->fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $dados['plano_saude']; ?></td>
                  <td><?php echo $dados['quantidade_jan']; ?></td>
                  <td><?php echo $dados['quantidade_fev']; ?></td>
                  <td><?php echo $dados['quantidade_mar']; ?></td>
                  
                </tr>
                <?php
            }
        }
        ?>

        <?php 
        } ?>
    </table>
    </div>
  









<footer>
  <p></p>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>