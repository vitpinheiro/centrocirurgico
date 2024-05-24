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
DATE_FORMAT(proc.data, '%d/%m/%Y') AS data_formatada,
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
        .content {
            margin-top: 20px; 
            
        }
.dropdown-menu {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    background-color: #ffffff;
    min-width: 200px;
    padding: 10px;
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

.custom-table {
        border-collapse: collapse;
    }

    

    .custom-table th:first-child,
    .custom-table td:first-child {
        border-left: none; 
        
    }

    .custom-table th:last-child,
    .custom-table td:last-child {
        border-right: none; 
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
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" href="index.php">Home</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="solicitacaoporstatus.php">Solicitações por status</a>
                        <a class="dropdown-item" href="cirurgiasportipo.php">Cirurgias por tipo</a>
                        <a class="dropdown-item" href="cirurgioes.php">Cirurgiões</a>
                        <a class="dropdown-item" href="tabelageral.php">Tabela geral</a>
                        <a class="dropdown-item" href="teste.php">Filtro Cirurgia</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
              
            </div>
        </div>
    </div>
</header>

<main>
<div class="container">
<div class="accordion" id="accordionPanelsStayOpenExample" class="text-center">
                                    <div class="accordion-item text-center">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button shadow-sm text-white text-center" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background-color: #00a24d !important;">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <i class="fa-solid fa-circle-info"></i>
                                                <h5>Tabela geral</h5>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" class="text-center">
                                            <div class="accordion-body">
                                                <div class="col">
                                                    <br>
                                                    <input id="tabela" class="form-control" type="text" onkeyup="filtrarTabela()" placeholder="Filtrar registros..." />
                                                </div>
                                                <br>
                                                
                                                <div class="row">
                                                    <div class="col-6 col-lg-2 mb-5" style="text-align: left;">
                                                        <b>Status</b>
                                                        <select class="form-control" id="statusSelect" onchange="filtrarRegistros(event)">
                                                            <option value="">Selecione o status</option>
                                                            <option value="Pendente">Pendente</option>
                                                            <option value="Em andamento">Em andamento</option>
                                                            <option value="Concluído">Concluído</option>
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="col-4" style="text-align: left;">
                                                        <b>Data do Procedimento</b>
                                                        <input class="form-control" type="date" id="solicitacaoInput" onchange="filtrarRegistros(event)">
                                                    </div>
                                                  
        
        <div class="table-responsive custom-scrollbar">
            <table class="table table-bordered custom-table"  id="dataTable">
    <thead>
      <tr>
        
        <th scope="col" class="col">id</th>
        <th scope="col" class="col">Paciente</th>
        <th scope="col" class="col">Cirurgião</th>
        <th scope="col" class="col">Anestesista</th>
        <th scope="col" class="col">Opme</th>
        <th scope="col" class="col" nowrap>Pend Doc</th>
        <th scope="col" class="col" nowrap>Pend Financ</th>
        <th scope="col" class="col">data</th>
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
        echo "<td><a href='informacoes.php?id=". $row["id"]. "'>". $row["data_formatada"] . "</a></td>";
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 function filtrarTabela() {
            var input, filtro, tabela, linhas, celula, texto;
            input = document.getElementById("tabela");
            filtro = input.value.toUpperCase();
            tabela = document.getElementById("dataTable");
            linhas = tabela.getElementsByTagName("tr");

            for (var i = 0; i < linhas.length; i++) {
                var encontrou = false; 
                celula = linhas[i].getElementsByTagName("td");
                for (var j = 0; j < celula.length; j++) {
                    if (celula[j]) {
                        texto = celula[j].innerText.toUpperCase() || celula[j].textContent.toUpperCase();
                        if (texto.indexOf(filtro) > -1) {
                            encontrou = true;
                            break;
                        }
                    }
                }
                if (encontrou) {
                    linhas[i].style.display = "";
                } else {
                    linhas[i].style.display = "none";
                }
            }
        }

        function filtrarRegistros(event) {
    var tabela = document.getElementById("dataTable");
    var linhas = tabela.getElementsByTagName("tr");
    var selectedStatus = document.getElementById("statusSelect").value.toLowerCase(); // Obtendo o status selecionado em letras minúsculas para uma comparação sem distinção entre maiúsculas e minúsculas

    for (var i = 1; i < linhas.length; i++) { // Começamos em 1 para pular a linha de cabeçalho
        var celulas = linhas[i].getElementsByTagName("td");
        var status = celulas[8].innerText.toLowerCase(); // A coluna de status é a oitava coluna (índice 7)

        if (selectedStatus === "" || status === selectedStatus) { // Se nenhum status estiver selecionado ou se o status da linha corresponder ao status selecionado
            linhas[i].style.display = ""; // Exibe a linha
        } else {
          linhas[i].style.display = "none"; // Exibe a linha
    }
  }}

 
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