<?php
namespace teste;

require_once("conexao.php");

$sql = "SELECT 
proc.id as id,
pac.nome as paciente,
cirur.nome as cirurgiao,
anes.Nome as nome_anestesista,
opme.opme as opme,
proc.pend_documento,
proc.pend_financ,
proc.status,
proc.leito,
seto.nome_setor as setor






FROM centrocirurgico.procedimentos as proc
	INNER JOIN centrocirurgico.cirurgioes as cirur
    ON cirur.id = proc.id_cirurgiao
    iNNER JOIN centrocirurgico.pacientes as pac
		ON pac.id_procedimentos = proc.id
    INNER JOIN centrocirurgico.opme as opme
    ON opme.id = proc.opme
    INNER JOIN setores as seto
ON proc.id_setores = seto.id
    INNER JOIN  anestesista as anes
    ON anes.id = proc.anestesia;
";

$result = $conn->query($sql);


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

a{
  color: black;
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

  <div class="container">
        <h2>Tabela Geral</h2>
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Pesquisar...">
        <div class="table-responsive">
            <table class="table"  id="dataTable">
    <thead>
      <tr>
        
        <th scope="col" class="col">id</th>
        <th scope="col" class="col">Paciente</th>
        <th scope="col" class="col">Cirurgião</th>
        <th scope="col" class="col">Anestesista</th>
        <th scope="col" class="col">Opme</th>
        <th scope="col" class="col">Pend Documento</th>
        <th scope="col" class="col">Pend Financ</th>
        <th scope="col" class="col">Status</th>
        <th scope="col" class="col">Leito</th>
        <th scope="col" class="col">Setor</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if ($result->num_rows > 0) {
      // Saída de dados de cada linha
      while($row = $result->fetch_assoc()) {
        echo "<tr>";

        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>" . $row["id"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>" . $row["paciente"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>".$row["cirurgiao"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>". $row["nome_anestesista"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>". $row["opme"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>". $row["pend_documento"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>". $row["pend_financ"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>". $row["status"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>". $row["leito"] . "</a></td>";
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>".$row["setor"] . "</a></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='9'>Nenhum resultado encontrado</td></tr>";
    }
    ?>
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
                $("#dataTable tbody tr").filter(function() {
                    var found = false;
                    $(this).find('td').each(function(){
                        var text = $(this).text().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
                        if (text.indexOf(value) > -1) {
                            found = true;
                            return false; // Exit the loop early if a match is found
                        }
                    });
                    $(this).toggle(found);
                });
            });
        });
</script>



<main>
</body>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</html>