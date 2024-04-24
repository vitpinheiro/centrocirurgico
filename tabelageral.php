<?php
namespace teste;

require_once("conexao.php");

$pesquisa = isset($_GET['busca']) ? $mysqli->real_escape_string($_GET['busca']) : '';


$sql_code = "SELECT * FROM pacientes WHERE plano_saude LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' OR  idade LIKE '%$pesquisa%' OR  genero LIKE '%$pesquisa%' OR  estado LIKE '%$pesquisa%' OR  status LIKE '%$pesquisa%'";
$sql_query = $mysqli->query($sql_code) or die("erro ao consultar".$mysqli->error);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de busca</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

<style>



*{
    padding: 5px;
    font-family: sans-serif;
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



.table-bordered{
    width: 60em;
    justify-content: center;
    
}

.tabela button{
  background-color: transparent;
  border-radius: 5%;
}

.tabela h1{
  font-size: 38px;

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
    <a class="dropdown-item" href="#">Home</a>
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
<div class="tabela">
<h1 >Planos de saúde</h1>
    <form class="form" action="">
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
            <th>Nome</th>
            <th>Idade</th>
            <th>Gênero</th>
            <th>Estado</th>
            <th>Status</th>
        </tr>
   
        <?php

        ?>
        <tr>
        </tr>
        <?php
      
          $sql_code = "SELECT * FROM pacientes WHERE plano_saude LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' OR  idade LIKE '%$pesquisa%' OR  genero LIKE '%$pesquisa%' OR  estado LIKE '%$pesquisa%'  OR status LIKE '%$pesquisa%'";
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
                  <td><?php echo $dados['nome']; ?></td>
                  <td><?php echo $dados['idade']; ?></td>
                  <td><?php echo $dados['genero']; ?></td>
                  <td><?php echo $dados['estado']; ?></td>
                  <td><?php echo $dados['status']; ?></td>
                </tr>
                <?php
            }
          }
        ?>
    </table>
    </div>
  
<main>
</body>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</html>